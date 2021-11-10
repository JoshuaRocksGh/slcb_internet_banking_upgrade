<?php

namespace App\Http\Middleware;

use App\Http\classes\WEB\UserAuth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticationMiddleware
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

        // $value = $request->session()->get('key');
        if (!$request->session()->get('userId')) {
            session()->flush();
            return redirect('login');
        }
        return $next($request);
    }
}
