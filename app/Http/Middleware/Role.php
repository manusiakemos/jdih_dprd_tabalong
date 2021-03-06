<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Role
{

    public function handle($request, Closure $next, $routeRoles)
    {
        if (!Auth::guard('api')->check()) {
            if ($request->expectsJson()) {
                return response(["message" => "Unauthenticated"]);
            }
            abort(403, 'NO PERMISSION');
        }else{
            $roleName = "*";
            $data = Auth::guard("api")->user();
            if($data->role){
                $roleName = $data->role;
            }

            $nameArray = explode('|', $routeRoles);

            if (!in_array($roleName, $nameArray)) {
                if ($request->expectsJson()) {
                    return response(["message" => "Unauthenticated"]);
                }
                abort(403, 'NO PERMISSION');
            }
            return $next($request);
        }
    }
}
