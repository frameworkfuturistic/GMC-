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
        $reqLog = $request->all();
        $log = "{$ip}: {$method}@{$url} - {$duration}ms \n" .
            "Request : {[$request->all()]} \n";
        // $log = "{$ip}: {$method}@{$url} - {$duration}ms \n" .
        //     "Request : {$reqLog} \n";
        Log::info($log);
    }
}
