<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrustProxies extends Middleware
{
    protected $proxies = '*'; // Trust all proxies (use with caution)
    protected $headers = Request::HEADER_X_FORWARDED_FOR
                     | Request::HEADER_X_FORWARDED_HOST
                     | Request::HEADER_X_FORWARDED_PORT
                     | Request::HEADER_X_FORWARDED_PROTO
                     | Request::HEADER_X_FORWARDED_TRAEFIK;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
