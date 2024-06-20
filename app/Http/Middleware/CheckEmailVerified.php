<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->email_verified_at) {
           $email=Auth::user()->email;
            // L'email n'est pas vérifié, vous pouvez rediriger ou envoyer une réponse appropriée.
            return redirect()->route('verification.code')->with('email',$email);
        }
        return $next($request);
    }
}
