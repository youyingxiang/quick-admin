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

namespace quick\admin\console;

use quick\admin\Admin;
use think\console\Command;

class AdminCommand extends Command
{
    /**
     * @var string
     */
    public static $logo = <<<'LOGO'
    

   ____  __  ______________ __      ___    ____  __  ________   __
  / __ \/ / / /  _/ ____/ //_/     /   |  / __ \/  |/  /  _/ | / /
 / / / / / / // // /   / ,< ______/ /| | / / / / /|_/ // //  |/ / 
/ /_/ / /_/ // // /___/ /| /_____/ ___ |/ /_/ / /  / // // /|  /  
\___\_\____/___/\____/_/ |_|    /_/  |_/_____/_/  /_/___/_/ |_/   
                                                                  
                                                                  
                                                                          
LOGO;

    public function configure(): void
    {
        $this->setName('admin')
            ->setDescription('quick-admin 的所有命令')
            ->setHelp('非常不错');
    }

    public function handle(): void
    {
        $this->output->info(static::$logo);
        $this->output->writeln(Admin::longVersion());
        $this->output->comment('');
        $this->output->comment('Available commands:');
    }
}
