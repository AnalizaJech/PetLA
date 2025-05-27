<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirigirSegunRol
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            switch ($user->role) {
                case 'admin':
                    return redirect('/admin/dashboard');
                case 'veterinario':
                    return redirect('/veterinario/dashboard');
                case 'cliente':
                    return redirect('/cliente/dashboard');
            }
        }

        return $next($request);
    }
}