<?php

namespace App\Http\Middleware;

use App\Page;
use Closure;
use Illuminate\Support\Facades\Route;

class CheckProfile
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
        //$page = Route::getCurrentRoute()->getName();
        //if (Page::findPage($page)) {
        //    return $next($request);
        //}
        ////abort(403);
        return $next($request);
    }
}
