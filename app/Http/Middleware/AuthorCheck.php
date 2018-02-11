<?php

namespace App\Http\Middleware;

use Closure;

class AuthorCheck
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
        if ($request->user()->hasRole('admin') || $request->user()->hasRole('author')){
            return $next($request);
        }
        return abort(403);
    }
}
