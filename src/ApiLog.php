<?php

namespace Nosun\ApiLog;

use Closure;
use Log;

class ApiLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $response = $next($request);

        if (config('api-log.enable')) {
            // 需要提前建立 api-debug channel
            Log::channel('api')->info(json_encode($response));
        }

        return $response;
    }
}