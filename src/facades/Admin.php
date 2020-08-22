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

namespace quick\admin\facades;

use think\Facade;

class Admin extends Facade
{
    /**
     * Class Admin.
     *
     * @method static \quick\admin\Admin    routes()
     */
    protected static function getFacadeClass(): string
    {
        return \quick\admin\Admin::class;
    }
}
