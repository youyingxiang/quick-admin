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

namespace quick\admin\console;

use think\console\Command;

class InstallCommand extends Command
{
    protected function configure()
    {
        $this->setName('admin:install')
            ->setDescription('安装quick-admin');
    }
}
