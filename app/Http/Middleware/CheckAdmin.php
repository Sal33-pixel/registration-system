<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(empty(\Auth::user()->is_admin)){
            return redirect()->route('home');
        }

        if(\Auth::user()->is_admin == config('admin.ADMIN')){
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }
}
