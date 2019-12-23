<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentPath = Route::getFacadeRoot()->current()->uri();
        $count = DB::table('menu_by_rols')
            ->join('menus', 'menus.id', 'menu_by_rols.menu_id')
            ->join('roles', 'roles.id', 'menu_by_rols.role_id')
            ->select('menus.*')
            ->where("menus.slug", 'like', "%" . $currentPath . "%")
            ->where('roles.id', '=', Auth::user()->role_id)
            ->count();
        if ($count) {
            return $next($request);
        } else {
            return redirect('403');
        }
    }
}
