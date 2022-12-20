<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
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
        $student = Auth::guard('student')->user();
        if(Auth::guard('student')->check() && $student -> active == 0){
            Auth::guard('student')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('home')->with('msg', 'Essa conta foi desativada!');
        }
        return $next($request);

    }
}
