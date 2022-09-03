<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    public function handle($request, Closure $next)
    {
        $request->start = microtime(true);
        return $next($request);
    }
    public function terminate($request, $response)
    {
        $request->end = microtime(true);
        $this->log($request, $response);
    }
    protected function log($request, $response)
    {
        $duration = $request->end - $request->start;
        $url = $request->fullUrl();
        $method = $request->getMethod();
        $ip = $request->getClientIp();
        $allReq = $request->all();
        // $log = "{$ip}: {$method}@{$url} - {$duration}ms \n" .
        $log = [
            'duration' => $duration,
            'url' => $url,
            'method' => $method,
            'ip' => $ip,
            'request' => $allReq
        ];
        //     "Request : {$request->all()}";
        Log::info($log);
    }
}
