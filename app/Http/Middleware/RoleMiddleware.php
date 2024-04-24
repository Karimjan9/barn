<?php

namespace App\Http\Middleware;

use auth;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    
    public function handle(Request $request, Closure $next, $role)
    {
        if(!auth()->user()->hasRole($role)) {
            abort(404);
        }
        
        return $next($request);
    }
}
