<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/19
 * Time: 3:11 PM
 */

namespace quick\admin\facades;

use think\Facade;

class Admin extends Facade
{
    /**
     * Class Admin.
     *
     * @method static void routes()
     *
     * @see \quick\admin\Admin
     */
    protected static function getFacadeClass(): string
    {
        return "quick\admin\Admin";
    }
}

