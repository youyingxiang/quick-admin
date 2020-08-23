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

namespace quick\admin;

use quick\admin\layout\Menu;
use quick\admin\traits\HasAssets;

/**
 * Class Admin.
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
     * @var array
     */
    protected $menu = [];

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
     * @return mixed
     */
    public static function title(?string $title)
    {
        if (! $title) {
            return static::$metaTitle ?: config('admin.title');
        }

        static::$metaTitle = $title;
    }

    /**
     * @return mixed
     */
    public static function favicon(?string $favicon)
    {
        if (null === $favicon) {
            return static::$favicon;
        }

        static::$favicon = $favicon;
    }

    /**
     * @return Menu
     */
    public function menu()
    {
        return new Menu();
    }
}
