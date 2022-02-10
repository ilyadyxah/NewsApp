<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPasswordProfile
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
        $errors = [];
        $user = Auth::user();
        if(\Hash::check($request->post('current_password'), $user->password)) {
            return $next($request);
        }
        else {
            $errors['current_password'][] = 'Пароль указан неверно';
            return redirect()->back()
                ->withErrors($errors);
        }
    }
}
