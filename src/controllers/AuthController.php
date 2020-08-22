<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/19
 * Time: 2:49 PM
 */

namespace quick\admin\controllers;


use think\response\View;

class AuthController extends AdminController
{
    /**
     * @var string
     */
    protected $view = 'test:index';


    public function getLogin():View
    {
        return admin_view($this->view);
    }

    public function postLogin()
    {

    }

}
