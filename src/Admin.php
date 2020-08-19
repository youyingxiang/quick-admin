<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/19
 * Time: 2:26 PM
 */

namespace quick\admin;

use think\Route;

/**
 * Class Admin
 * @package Quick\Admin
 */
class Admin
{
    /**
     * The Quick admin version.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * 注册quick-admin管理内置路由
     *
     * @return void
     */
    public function routes(): void
    {
        $attributes = [
            'prefix'     => config('admin.route.prefix'),
            'middleware' => config('admin.route.middleware'),
        ];
    }
}
