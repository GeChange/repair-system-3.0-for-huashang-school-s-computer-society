<?php

namespace App\Http\Middleware;

use Closure;

class Checkstate
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
        if(config('web.webstate')==0)
        {
            return redirect('showstate');

        }
        return $next($request);
    }
}
