<?php

namespace App\Http\Middleware;

use Closure;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //  ...$levels
    public function handle($request, Closure $next,...$levels)
    {
        //  $user = \App\User::where('email', $request->email)->first();
        // if ($user['level'] == 'admin') {
        //     return redirect('/home');
        // } elseif ($user['level'] == 'campaign') {
        //     return redirect('/home');
        // } elseif ($user['level'] == 'keuangan'){
        //     return redirect('home');
        // }
        // return redirect('/');
        if(in_array($request->user()->level,$levels)){
            return $next($request);
        }
        return redirect('/');
    }
}
