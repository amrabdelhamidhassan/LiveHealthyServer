<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $role
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {
        $userRole=User::find($request->user()->id)->role->name;
        if ($userRole===$role ||$userRole==='admin' ) {
            error_log('here2');
            return $next($request);
        }
        else{
            $response = [
                'status' => 2,
                'message' => 'Unauthorized',
            ];
            return response()->json($response, 413);

        }
    }
}
