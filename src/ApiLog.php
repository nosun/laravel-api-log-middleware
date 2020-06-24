<?php

namespace Nosun\ApiLog;

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

        if(!defined('LARAVEL_START')){
            define('LARAVEL_START',microtime(true));
        }

        $response = $next($request);

        $request->header('accept','application/json');

        if (config('api-log.enable') == true) {

            $delimiter = config('api-log.delimiter');

            $req = [
                'url' => $request->url(),
                'header' => $request->header(),
                'body' => $request->post(),
            ];

            $data = [
                'request' => $req,
                'response' => $response,
            ];

            $executionTime = 0;

            if (config('api-log.execute_time') == true) {
                $executionTime = floor(1000000 * (microtime(true) - LARAVEL_START));
            }

            $message = implode($delimiter, [
                $request->getClientIp(),
                $executionTime,
                json_encode($data)
            ]);

            Log::channel('api')->info($message);
        }

    }
}