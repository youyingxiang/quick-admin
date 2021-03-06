<?php

/*
 * // +----------------------------------------------------------------------
 * // | Quick-Admin
 * // +----------------------------------------------------------------------
 * // | Copyright (c) 2006~2020 quick-admin All rights reserved.
 * // +----------------------------------------------------------------------
 * // | Licensed ( LICENSE-1.0.0 )
 * // +----------------------------------------------------------------------
 * // | Author: yxx <1365831278@qq.com>
 * // +----------------------------------------------------------------------
 */

return [
    /*
   |--------------------------------------------------------------------------
   | quick-admin html title
   |--------------------------------------------------------------------------
   |
   | Html title for all pages.
   |
   */
    'title' => 'Admin',
    /*
    |--------------------------------------------------------------------------
    | Quick-admin logo
    |--------------------------------------------------------------------------
    |
    | The logo of all admin pages. You can also set it as an image by using a
    | `img` tag, eg '<img src="http://logo-url" alt="Admin logo">'.
    |
    */
    'logo' => '<b>Quick</b> admin',
    /*
    |--------------------------------------------------------------------------
    | Laravel-admin mini logo
    |--------------------------------------------------------------------------
    |
    | The logo of all admin pages when the sidebar menu is collapsed. You can
    | also set it as an image by using a `img` tag, eg
    | '<img src="http://logo-url" alt="Admin logo">'.
    |
    */
    'logo-mini' => '<b>Quick</b>',
    /*
    |--------------------------------------------------------------------------
    | Quick-admin name
    |--------------------------------------------------------------------------
    |
    | This value is the name of laravel-admin, This setting is displayed on the
    | login page.
    |
    */
    'name' => 'Quick-admin',

    /*
    |--------------------------------------------------------------------------
    | quick-admin install 目录
    |--------------------------------------------------------------------------
    |
    */
    'directory' => app_path('Admin'),
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
