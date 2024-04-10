<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdministrationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (is_null($request->user())) {
            return  redirect()->route('admin.auth.show-login');
        }

        if($request->user()->role->value !== 'admin') {
            abort(403);
        }
        
        return $next($request);
    }
}
