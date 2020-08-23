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

namespace quick\admin\traits;

trait HasAssets
{
    /**
     * @var array
     */
    public static $script = [];

    /**
     * @var array
     */
    public static $deferredScript = [];

    /**
     * @var array
     */
    public static $style = [];

    /**
     * @var array
     */
    public static $css = [];

    /**
     * @var array
     */
    public static $js = [];

    /**
     * @var array
     */
    public static $html = [];

    /**
     * @var array
     */
    public static $headerJs = [];

    /**
     * @var string
     */
    public static $manifest = 'vendor/quick-admin/minify-manifest.json';

    /**
     * @var array
     */
    public static $manifestData = [];

    /**
     * @var array
     */
    public static $min = [
        'js' => 'vendor/laravel-admin/quick-admin.min.js',
        'css' => 'vendor/laravel-admin/quick-admin.min.css',
    ];

    /**
     * @var array
     */
    public static $baseCss = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'vendor/quick-admin/plugins/fontawesome-free/css/all.min.css',
        'vendor/quick-admin/dist/css/adminlte.min.css',
        //        'vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css',
        //        'vendor/laravel-admin/font-awesome/css/font-awesome.min.css',
        //        'vendor/laravel-admin/laravel-admin/laravel-admin.css',
        //        'vendor/laravel-admin/nprogress/nprogress.css',
        //        'vendor/laravel-admin/sweetalert2/dist/sweetalert2.css',
        //        'vendor/laravel-admin/nestable/nestable.css',
        //        'vendor/laravel-admin/toastr/build/toastr.min.css',
        //        'vendor/laravel-admin/bootstrap3-editable/css/bootstrap-editable.css',
        //        'vendor/laravel-admin/google-fonts/fonts.css',
    ];

    /**
     * @var array
     */
    public static $baseJs = [
        'vendor/quick-admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/quick-admin/dist/js/adminlte.min.js',
        'vendor/quick-admin/dist/js/adminlte.min.js',
        'vendor/quick-admin/dist/js/demo.js',
    ];

    /**
     * @var string
     */
    public static $jQuery = 'vendor/quick-admin/plugins/jQuery/jQuery.min.js';

    /**
     * @var array
     */
    public static $minifyIgnores = [];

    /**
     * @param null $css
     * @param bool $minify
     */
    public static function css($css = null, $minify = true): string
    {
        static::ignoreMinify($css, $minify);

        if (null !== $css) {
            return self::$css = array_merge(self::$css, (array) $css);
        }

        if (! $css = static::getMinifiedCss()) {
            $css = array_merge(static::$css, static::baseCss());
        }

        $css = array_filter(array_unique($css));

        return admin_view('partials:css', compact('css'))->getContent();
    }

    /**
     * @param null $css
     * @param bool $minify
     *
     * @return array|null
     */
    public static function baseCss($css = null, $minify = true)
    {
        static::ignoreMinify($css, $minify);

        if (null !== $css) {
            return static::$baseCss = $css;
        }

//        $skin = config('admin.skin', 'skin-blue-light');

        //  array_unshift(static::$baseCss, "vendor/laravel-admin/AdminLTE/dist/css/skins/{$skin}.min.css");

        return static::$baseCss;
    }

    /**
     * @param null $js
     * @param bool $minify
     */
    public static function js($js = null, $minify = true): string
    {
        static::ignoreMinify($js, $minify);

        if (null !== $js) {
            return self::$js = array_merge(self::$js, (array) $js);
        }

        if (! $js = static::getMinifiedJs()) {
            $js = array_merge(static::baseJs(), static::$js);
        }

        $js = array_filter(array_unique($js));

        return admin_view('partials:js', compact('js'))->getContent();
    }

    /**
     * @param null $js
     */
    public static function headerJs($js = null): string
    {
        if (null !== $js) {
            return self::$headerJs = array_merge(self::$headerJs, (array) $js);
        }

        return admin_view('partials:js', ['js' => array_unique(static::$headerJs)])->getContent();
    }

    /**
     * @param null $js
     * @param bool $minify
     *
     * @return array|null
     */
    public static function baseJs($js = null, $minify = true)
    {
        static::ignoreMinify($js, $minify);

        if (null !== $js) {
            return static::$baseJs = $js;
        }

        return static::$baseJs;
    }

    /**
     * @param string $assets
     * @param bool   $ignore
     */
    public static function ignoreMinify($assets, $ignore = true)
    {
        if (! $ignore) {
            static::$minifyIgnores[] = $assets;
        }
    }

    /**
     * @param string $script
     * @param bool   $deferred
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function script($script = '', $deferred = false)
    {
        if (! empty($script)) {
            if ($deferred) {
                return self::$deferredScript = array_merge(self::$deferredScript, (array) $script);
            }

            return self::$script = array_merge(self::$script, (array) $script);
        }

        $script = array_unique(array_merge(static::$script, static::$deferredScript));

        return view('admin::partials.script', compact('script'));
    }

    /**
     * @param string $style
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function style($style = '')
    {
        if (! empty($style)) {
            return self::$style = array_merge(self::$style, (array) $style);
        }

        return admin_view('admin::partials.style', ['style' => array_unique(self::$style)]);
    }

    /**
     * @param string $html
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function html($html = '')
    {
        if (! empty($html)) {
            return self::$html = array_merge(self::$html, (array) $html);
        }

        return admin_view('admin::partials.html', ['html' => array_unique(self::$html)]);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    protected static function getManifestData($key)
    {
        if (! empty(static::$manifestData)) {
            return static::$manifestData[$key];
        }

        static::$manifestData = json_decode(
            file_get_contents(public_path(static::$manifest)),
            true
        );

        return static::$manifestData[$key];
    }

    /**
     * @return bool|mixed
     */
    protected static function getMinifiedCss()
    {
        if (! config('admin.minify_assets') || ! file_exists(public_path(static::$manifest))) {
            return false;
        }

        return static::getManifestData('css');
    }

    /**
     * @return bool|mixed
     */
    protected static function getMinifiedJs()
    {
        if (! config('admin.minify_assets') || ! file_exists(public_path(static::$manifest))) {
            return false;
        }

        return static::getManifestData('js');
    }

    /**
     * @return string
     */
    public static function jQuery()
    {
        return admin_asset(static::$jQuery);
    }
}
