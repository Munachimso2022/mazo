<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            if(Auth::check()){
                $loggedUser = User::find(Auth::user()->id);
                // $notifications = User::find(Auth::user()->id)->notifications()->paginate(20);//auth()->user()->notifications->paginate(20);
                $view->with('loggedUser', $loggedUser);
            }
        });
    }
}
