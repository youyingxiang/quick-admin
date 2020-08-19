<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/19
 * Time: 5:56 PM
 */

namespace quick\admin\console;

use quick\admin\Admin;
use think\console\Command;

class AdminCommand extends Command
{
    /**
     * @var string
     */
    public static $logo = <<<LOGO
    

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
