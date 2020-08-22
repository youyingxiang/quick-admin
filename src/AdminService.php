<?php

/*
 * // +----------------------------------------------------------------------
 * // | Quick-Admin
 * // +----------------------------------------------------------------------
 * // | Copyright (c) 2006~2019 quick-admin All rights reserved.
 * // +----------------------------------------------------------------------
 * // | Licensed ( LICENSE-1.0.0 )
 * // +----------------------------------------------------------------------
 * // | Author: yxx <1365831278@qq.com>
 * // +----------------------------------------------------------------------
 */

namespace quick\admin;

use quick\admin\console\AdminCommand;
use quick\admin\console\InstallCommand;
use quick\admin\controllers\AuthController;
use think\Route;
use think\Service;

class AdminService extends Service
{
    /**
     * 应发布的路径.
     *
     * @var array
     */
    public static $publishes = [];

    /**
     * 应发布的路径组.
     *
     * @var array
     */
    public static $publishGroups = [];
    /**
     * @var array
     */
    protected $commands = [
        AdminCommand::class,
        InstallCommand::class,
    ];

    /**
     * 注册服务
     */
    public function register(): void
    {
        $this->commands($this->commands);
    }

    /**
     * 启动服务
     */
    public function boot(): void
    {
        $this->routes();
        $this->ensureHttps();
        $this->registerPublishing();
    }

    /**
     * 注册quick-admin管理内置路由.
     */
    public function routes(): void
    {
        $this->registerRoutes(function (Route $route) {
            $route->group(config('admin.route.prefix'), function (Route $router) {
                $authController = config('admin.auth.controller', AuthController::class);
                $router->get('auth/login', $authController.'@getLogin')->name('admin.login');
            });
        });
    }

    /**
     * 如果启用了https，则强制设置https方案。
     */
    protected function ensureHttps(): void
    {
        if (config('admin.https') || config('admin.secure')) {
        }
    }

    /**
     * 发布静态资源.
     */
    protected function registerPublishing(): void
    {
        $this->publishes([__DIR__.'/../resources/assets' => public_path('vendor/quick-admin')], 'laravel-admin-assets');
//        if ($this->app->runningInConsole()) {
//            $this->publishes([__DIR__ . '/../resources/assets' => public_path('vendor/laravel-admin')], 'laravel-admin-assets');
//        }
    }

    /**
     * @根据路径发布资源
     *
     * @param null $groups
     */
    protected function publishes(array $paths, $groups = null): void
    {
        $this->ensurePublishArrayInitialized($class = static::class);

        static::$publishes[$class] = array_merge(static::$publishes[$class], $paths);

        foreach ((array) $groups as $group) {
            $this->addPublishGroup($group, $paths);
        }
    }

    /**
     * Add a publish group / tag to the service provider.
     *
     * @param string $group
     * @param array  $paths
     */
    protected function addPublishGroup($group, $paths)
    {
        if (! \array_key_exists($group, static::$publishGroups)) {
            static::$publishGroups[$group] = [];
        }

        static::$publishGroups[$group] = array_merge(
            static::$publishGroups[$group],
            $paths
        );
    }

    /**
     * 请确保服务提供程序的发布数组已初始化.
     *
     * @param string $class
     */
    protected function ensurePublishArrayInitialized($class)
    {
        if (! \array_key_exists($class, static::$publishes)) {
            static::$publishes[$class] = [];
        }
    }
}
