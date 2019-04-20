<h1 align="center"> nosun/laravel-api-log-middleware </h1>

<p align="center">有一些时候，你需要在线查看 API 返回的数据，此时，可以使用这个中间件。</p>


## Installing

```shell
$ composer require nosun/laravel-api-log-middleware
```

## Usage

1. 引入中间件 App/Http/kernel.php
```php
    $routeMiddleware = [
        ...
       'api_log' => Nosun\ApiLog::class,
    ]
```

2. 设置单独的日志通道 config/logging.php
```php
    'api' => [
        'driver' => 'single',
        'path' => storage_path('logs/api.log'),
        'level' => 'debug',
        'days' => 1,
    ]
```

3. 创建配置文件 config/api-log.php
```php
    <?php
    
    return [
        'enable' => env('API_LOG_ENABLE','false'),
    ];
```
4. 将 `api_log` 加入路由, 将 `API_LOG_ENABLE=true` 加入 .env

5. 查看输出日志： "storage/logs/api.log"


## Todo

- 开发 console，使用 artisan 发布 config file。

## Contributing

File bug reports using the [issue tracker](https://github.com/nosun/laravel-api-log-middleware/issues).

## License

MIT