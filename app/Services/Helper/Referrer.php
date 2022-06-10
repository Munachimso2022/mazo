<?php
namespace App\Services\Helper;

use App\Models\User;
use Illuminate\Support\Str;

class Referrer{

    public function generatorAssignCode($user, $referrer = null){
        $string =  Str::random(4);
        $ref_string = $string.$user->name;
        $thisUser = User::find($user->id);
        $thisUser->my_code = $ref_string;
        $thisUser->	referrer = $referrer;
        $thisUser->save();
    }
}