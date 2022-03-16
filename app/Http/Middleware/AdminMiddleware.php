<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::check() && Auth::user()->email_verified_at) {
            $user = User::query()->where('id', Auth::id())->first();
            if ($user->role->role === 'admin') {
                return $next($request);
            }
        }
        abort(404);
    }
}
