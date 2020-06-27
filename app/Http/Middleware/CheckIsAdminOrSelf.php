<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Enums;

class CheckIsAdminOrSelf
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
        // return $next($request);
        $email = $request->route()->parameter('email');
        if (Auth::user()->role === Enums::ADMIN || Auth::user()->email == $email)
        {
            return $next($request);
        }
        else
        {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }

}
