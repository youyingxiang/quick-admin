<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/19
 * Time: 11:43 AM
 */

namespace quick\admin;

use think\Service;

class AdminService extends Service
{
    /**
     * 注册服务
     */
    public function register(): void
    {

    }

    /**
     * 启动服务
     */
    public function boot(): void
    {
//        dd(Admin::VERSION);
        $this->ensureHttps();
    }

    /**
     * 如果启用了https，则强制设置https方案。
     *
     * @return void
     */
    protected function ensureHttps(): void
    {
        if (config('admin.https') || config('admin.secure')) {

        }
    }
}
