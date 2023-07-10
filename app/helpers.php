<?php

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

if (!function_exists('encrypt_data')) {
    function encrypt_data($data)
    {
        return Crypt::encrypt($data);
    }
}


if (!function_exists('decrypt_data')) {
    function decrypt_data($data)
    {
        return Crypt::decrypt($data);
    }
}

if (!function_exists('password_generator')) {
    function password_generator($lenght = 8)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $lenght; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
}



if (!function_exists('activityLogger')) {
    function activityLogger(User $user, $text)
    {
        ActivityLog::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'activity' => $text,
        ]);
    }
}

if(!function_exists('dateDiff'))
{
    function dateDiff($start, $end)
    {
        // if(!$end){
        //     $end = now();
        // }

        $diff = abs(strtotime($start) - strtotime($end));
        
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        
        printf(" %d days\n", $days);
        // return "{$days} difference";

    }

}