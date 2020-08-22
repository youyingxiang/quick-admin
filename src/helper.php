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

use quick\admin\Admin;
use quick\admin\support\Helper;
use think\facade\View;

if (! function_exists('admin_path')) {
    /**
     * Get admin path.
     */
    function admin_path(string $path = ''): string
    {
        return lcfirst(config('admin.directory')).($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (! function_exists('admin_view_path')) {
    /**
     * Get admin path.
     */
    function admin_view_path(string $path = ''): string
    {
        $viewsPath = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'views';

        return is_dir($viewsPath) ? $viewsPath.($path ? DIRECTORY_SEPARATOR.$path : $path) : '';
    }
}

if (! function_exists('admin_view')) {
    /**
     * 渲染模板输出.
     *
     * @param string   $template 模板文件
     * @param array    $vars     模板变量
     * @param int      $code     状态码
     * @param callable $filter   内容过滤
     *
     * @return \think\response\View
     */
    function admin_view(string $template, array $vars = [], int $code = 200, ?Closure $filter = null): think\response\View
    {
        $viewPath = admin_view_path().DIRECTORY_SEPARATOR;
        View::config([
            'view_path' => $viewPath,
            // 模板引擎普通标签开始标记
            'tpl_begin' => '{{',
            // 模板引擎普通标签结束标记
            'tpl_end' => '}}',
            // 标签库标签开始标记
            'taglib_begin' => '{',
            // 标签库标签结束标记
            'taglib_end' => '}',
        ]);

        return view($template, $vars, $code, $filter);
    }
}

if (! function_exists('admin_title')) {
    /**
     * @param string|null $title
     *
     * @return mixed
     */
    function admin_title(string $title = '')
    {
        return Admin::title($title);
    }
}

if (! function_exists('admin_favicon')) {
    /**
     * @return mixed
     */
    function admin_favicon(string $favicon = '')
    {
        return Admin::favicon($favicon);
    }
}

if (!function_exists('admin_asset')) {
    /**
     * @param $path
     */
    function admin_asset(string $path): string
    {
        if (Helper::isValidUrl($path)) {
            return $path;
        }

        return domain().DIRECTORY_SEPARATOR.$path;
    }
}

if (! function_exists('domain')) {
    function domain(): string
    {
        return request()->domain();
    }
}

if (! function_exists('windows_os')) {
    /**
     * Determine whether the current environment is Windows based.
     *
     * @return bool
     */
    function windows_os()
    {
        return PHP_OS_FAMILY === 'Windows';
    }
}
