<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class GoogleController extends Controller
{
    public function google(){
return Socialite::driver('google')->redirect();
    }

    public function callback(){
        if (Auth::check()) {
            return redirect('/home');
        }
 
        $oauthUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $oauthUser->id)->first();
        $user1 = User::where('email', $oauthUser->email)->first();
        // if (empty($user) || empty($user->google_id)){
        //     return redirect('/')->with('success', 'Email Sudah dipakai');
        // }
        // dd($user->['email']);
        if ($user) {
            Auth::loginUsingId($user->id);
            return redirect('/home');
        // } else if () {
        //     return redirect('/home');
        } else {
            // dd($user1['email']);
            if($user1['email'] == $oauthUser->email){
                return redirect('/')->with('success', 'Email Sudah dipakai');
            }
            
            // if($user['email'] != $oauthUser->email){
            $newUser = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'google_id'=> $oauthUser->id,
                // password tidak akan digunakan ;)
                'password' => md5($oauthUser->token),
                'email_verified_at'=> $oauthUser->email_verified_at = '2021-01-01 20:08:04',
                'level'=> $oauthUser->level = 'user',
                'nomorhp'=> $oauthUser->nomorhp = '088',
            ]);
            Auth::login($newUser);
            return redirect('/home');
            // }
        }
        
        
    }
    

}
