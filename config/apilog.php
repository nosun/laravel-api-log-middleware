<?php

return [
    'delimiter' => env('API_DELIMITER', ' '),
    'enable' => env('API_LOG_ENABLE', true),
    'execute_time' => env('API_EXECUTE_TIME', true),
    'request_header' => env('API_REQUEST_HEADER', false),
    'request_body' => env('API_REQUEST_BODY', false),
    'response' => env('API_RESPONSE', false)
];