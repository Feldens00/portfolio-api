<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AclMiddleware
{
    public function handle(Request $request, Closure $next, string $permissionName, string $type)
    {
        $user = $request->user();
        $type = PermissionType::from(constant(PermissionType::class . "::" . strtoupper($type)));

        if (!$use || !$user->hasPermissionFor($permissionName, $type)) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        return $next($request);
    }