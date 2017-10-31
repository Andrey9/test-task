<?php

namespace App\Http\Middleware;

use Closure;
use Agent;
use DB;

class SaveUserInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->has('verified') && session()->get('verified') != true){
            DB::table('users')->insert([
                [
                    'ip' => $request->ip(),
                    'browser' => Agent::browser()
                ]
            ]);

            session()->put('verified', true);
        }

        return $next($request);
    }
}
