<?php

namespace Nosun\Middleware;

use Closure;
use Log;

class ApiLog
{

    protected $startTime;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->header('accept', 'application/json');

        $response = $next($request);

        if (config('apilog.enable') == true) {

            $delimiter = config('apilog.delimiter');

            $data[] = $request->getClientIp();

            if (config('apilog.execute_time') == true) {
                $data[] = floor(1000 * (microtime(true) - LARAVEL_START));
            }

            $data[] = $request->url();

            if (config('apilog.request_header') == true) {
                $data[] = json_encode($request->header());
            }

            if ($request->method() == 'POST' && config('apilog.request_body') == true) {
                $data[] = json_encode($request->post());
            }

            if (config('apilog.response') == true) {
                $data[] = json_encode($response);
            }

            $message = implode($delimiter, $data);

            Log::channel('api')->info($message);
        }

        return $response;

    }
}