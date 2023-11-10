<?php

namespace App\Http\Middleware;

use Closure;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {//dd(Auth::user()->isAdmin());
        try {
            $usuario = Auth::user();
            $route   = Route::current();
            $name    = Route::currentRouteName();
            $action  = Route::currentRouteAction();
            $prefix  = Route::currentRouteAction();

            //dd($usuario->isAdmin());

            if($usuario->isAdmin()){
                return $next($request);
            }


            return abort(404);

        } catch (Exception $e) {
            return abort(404);
        }
    }
}
