<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/19
 * Time: 2:26 PM
 */
namespace quick\admin;

/**
 * Class Admin
 * @package Quick\Admin
 */
class Admin
{
    /**
     * Quick admin 版本号.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * 版本.
     *
     * @return string
     */
    public static function longVersion()
    {
        return sprintf('Quick Admin <comment>version</comment> <info>%s</info>', static::VERSION);
    }

}
