<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    // Only the reverse proxies in front of this app (Traefik/Caddy on the
    // Docker networks + RFC1918). Never '*': with '*' any direct caller can
    // spoof X-Forwarded-For and defeat IP-based throttling (see form save()).
    protected $proxies = ['172.16.0.0/12', '10.0.0.0/8', '192.168.0.0/16'];
    protected $headers = Request::HEADER_X_FORWARDED_FOR
                     | Request::HEADER_X_FORWARDED_HOST
                     | Request::HEADER_X_FORWARDED_PROTO;
}
