<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/19
 * Time: 12:09 PM
 */
return [

    /*
   |--------------------------------------------------------------------------
   | quick-admin 路由设置
   |--------------------------------------------------------------------------
   |
   | 管理页的路由配置，包括路径前缀，
   | 控制器名称空间和默认中间件
   | 通过根路径访问，只需将前缀设置为空字符串。
   |
   */
    'route' => [

        'prefix' => env('ADMIN_ROUTE_PREFIX', 'admin'),

        'namespace' => 'App\\Admin\\Controllers',

        'middleware' => ['web', 'admin'],
    ],
    /*
    |--------------------------------------------------------------------------
    | 是否开启https
    |--------------------------------------------------------------------------
    */
    'https' => env('ADMIN_HTTPS', false),
];
