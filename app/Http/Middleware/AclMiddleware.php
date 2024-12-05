<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AclMiddleware
{
    public function handle(Request $request, Closure $next, string $requiredAbility)
    {
        $user = $request->user();

        if (!$user || !$user->abilities()->contains('name', $requiredAbility)) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}