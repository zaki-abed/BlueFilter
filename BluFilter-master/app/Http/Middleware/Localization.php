<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->guard('api')->user();

        if($user){
            app()->setLocale($user->locale);
        }
        else {
            app()->setLocale('ar');
        }
        return $next($request);
    }
}
