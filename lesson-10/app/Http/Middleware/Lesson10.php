<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Lesson10
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $uri = $request->getRequestUri();
        if ($uri =="/fourRoad"){
            return redirect("/threeRoad/RedirectFromFourRoad");
        }
        return $next($request);

    }
}
