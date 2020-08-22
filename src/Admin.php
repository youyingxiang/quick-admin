<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/19
 * Time: 2:26 PM
 */

namespace quick\admin;

use quick\admin\traits\HasAssets;

/**
 * Class Admin
 * @package Quick\Admin
 */
class Admin
{
    use HasAssets;
    /**
     * Quick admin 版本号.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * @var string
     */
    protected static $metaTitle;

    /**
     * @var string
     */
    protected static $favicon;

    /**
     * 版本.
     *
     * @return string
     */
    public static function longVersion()
    {
        return sprintf('Quick Admin <comment>version</comment> <info>%s</info>', static::VERSION);
    }

    /**
     * @param null|string $title
     * @return mixed
     */
    public static function title(?string $title)
    {
        if (!$title) {
            return static::$metaTitle ?: config('admin.title');
        }

        static::$metaTitle = $title;
    }

    /**
     * @param null|string $favicon
     * @return mixed
     */
    public static function favicon(?string $favicon)
    {
        if (is_null($favicon)) {
            return static::$favicon;
        }

        static::$favicon = $favicon;
    }

}
