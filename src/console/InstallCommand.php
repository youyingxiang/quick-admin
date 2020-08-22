<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/20
 * Time: 3:30 PM
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
