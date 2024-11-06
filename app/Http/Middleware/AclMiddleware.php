<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AclMiddleware
{
    public function handle(Request $request, Closure $next, $modelClass, $permissionKey)
    {
        $user = $request->user();
        $model = $modelClass::findOrFail($request->route('id'));
        
        $permissionName = $modelClass::PERMISSIONS[$permissionKey] ?? null;

        if (!$permissionName || !$user->hasPermissionFor($permissionName, $model)) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        return $next($request);
    }