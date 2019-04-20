<h1 align="center"> nosun/laravel-api-log-middleware </h1>

<p align="center"> .</p>


## Installing

```shell
$ composer require nosun/laravel-api-log-middleware -vvv
```

## Usage
1. set middleware in your App/Http/kernel.php
```php
    $routeMiddleware = [
        ...
       'api_log' => Nosun\ApiLog::class,
    ]
```

2. set api log in your config/logging.php
```php
    'api' => [
        'driver' => 'single',
        'path' => storage_path('logs/api.log'),
        'level' => 'debug',
        'days' => 1,
    ]
```

3. create config file config/api-log.php
```php
    <?php
    
    return [
        'enable' => env('API_LOG_ENABLE','false'),
    ];
```
4. If you want get some api log, you can put middleware `api_log` for the route, then put `API_LOG_ENABLE=true` in your .env file

5. You can get api log at the file "storage/logs/api.log"

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/nosun/laravel-api-log-middleware/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/nosun/laravel-api-log-middleware/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT