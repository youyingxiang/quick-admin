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

namespace quick\admin\controllers;

use think\response\View;

class AuthController extends AdminController
{
    /**
     * @var string
     */
    protected $view = 'test:index';

    public function getLogin(): View
    {
        return admin_view($this->view);
    }

    public function postLogin()
    {
    }
}
