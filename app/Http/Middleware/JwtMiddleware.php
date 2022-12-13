<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
//                return response()->json(['status' => '0', 'msg' => 'Token is Invalid', 'data' => []], 200);
                return failureResponse('Token is Invalid', []);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
//                return response()->json(['status' => '0', 'msg' => 'Token is Expired', 'data' => []], 200);
                return failureResponse('Token is Expired', []);
            } else {
//                return response()->json(['status' => '0', 'msg' => 'Authorization Token not found', 'data' => []], 200);
                return failureResponse('Authorization Token not found', []);
            }
        }
        return $next($request);
    }
}
