<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Pending;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\Invested;
use App\Notifications\WithdrawalApproved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

// use App\Models\Request as RequestModel;


class MiscController extends Controller
{
    public function topup(Request $request, $id){
        $wallet = Wallet::where('user_id', $id)->first();

        $wallet->balace = ($wallet->balace + (int)$request->amount);
        $wallet->save();
        Session::flash('success', 'Top up successful.');
        return redirect()->back();
    }

    public function requestPage(){
        $req = ModelsRequest::paginate(30);
        //print($req->user->id);die;
        return view('dashboard.requests.request')->with('requests', $req);
    }

    public function invest(Request $req, $offerId){
        //var_dump($req->all());var_dump($offerId);die;
        $date = date('Y-m-d h:i:s', time());
        $user = User::find(Auth::user()->id);
        $req->validate([
            'amount'=>'required'
        ]);
        // validating amount
        if((float)$user->wallet->balace <= (float)$req->amount){
            Session::flash('failed', 'Insufficient balance. Please fund your account.');
            return redirect()->back();
        }
        //
        $pending = new Pending();
        $pending->user_id = Auth::user()->id;
        $pending->amount = $req->amount;
        // $pending->recieved = 0;
        $offer = Offer::find($offerId);
        $pending->offer_id = $offerId;
        $pending->expiry = date('Y-m-d', strtotime($date. ' + '.$offer->dur_dig.' days'));
        $pending->save();
        
        
        $user->notify(new Invested($user, $pending));

        Session::flash('success', 'Your investiment is pending verifcation by admin.');
        return redirect()->back();
    }


    public function user_investments(){

        $pendings = Pending::paginate(50);
        return view('dashboard.userinvestments.index')->with('invests', $pendings);
    }


    public function blockuser($userid){
        $user = User::find($userid);
        $user->blocked = 0;
        $user->save();

        Session::flash('success', 'User has been blocked.');
        return redirect()->back();
    }

    public function un_blockuser($userid){
        $user = User::find($userid);
        $user->blocked = 1;
        $user->save();

        Session::flash('success', 'User has been ublocked.');
        return redirect()->back();
    }


    public function approveWithdraw($id, $amount){
        
        $request = ModelsRequest::find($id);

        $requestOwner = User::find($request->user_id);

        $userWallet = Wallet::where('user_id', $requestOwner->id)->first();
        // var_dump([$id, $amount, $userWallet->balace]);die;
        $balance = (float)$userWallet->balace;
        $amt = (float)$amount;
        if($balance < $amt){
            // print((float)$userWallet->balace .'  ' . (float)$amount);die;
            Session::flash('failed', 'This user dont have up this amount in the system.');
            return redirect()->back();
        }
        if($request->fullfilled ==1){
            // print((float)$userWallet->balace .'  ' . (float)$amount);die;
            Session::flash('failed', 'You have fullfilled this payment');
            return redirect()->back();
        }
        // $bal = (int)$userWallet->balance;
        $amount = (float)$amount;
        // var_dump($balance);die;
        $userWallet->balace = ($balance - $amount); 
        $userWallet->save();
        $request->fullfilled = 1;
        $request->save();

        Notification::sendNow($requestOwner, new WithdrawalApproved($requestOwner, $request));

        Session::flash('success', 'Amount have been substracted from users wallet.');
        return redirect()->back();
    }



}
