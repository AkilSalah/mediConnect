<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Accès non autorisé');
        }

        return $next($request);
    }
}
