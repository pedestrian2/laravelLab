<?php

namespace App\Http\Middleware;

use Closure;

class Test2Middleware
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
        echo 5 . '<br/>';
        
        $response = $next($request);
        
        echo 6 . '<br/>';
        
        return $response;
    }
}
