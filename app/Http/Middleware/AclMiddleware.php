<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AclMiddleware
{
    public function handle(Request $request, Closure $next, string $requiredAbility)
    {
        $user = $request->user();

        if (!$user || !$user->hasAbility($requiredAbility)) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}