<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
Use Redirect;

class CheckAdmin
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
        if (Auth::user()->role == 1) {
            return Redirect::back()->with('failed','Anda Tidak Dapat Akses');
        }
        return $next($request);
    }
}
