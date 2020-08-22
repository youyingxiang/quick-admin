<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/8/20
 * Time: 9:35 AM
 */

namespace quick\admin\support;

class Helper
{
    /**
     * 验证是否url
     * @param string $path
     * @return bool
     */
    public static function isValidUrl(string $path): bool
    {
        if (!preg_match('~^(#|//|https?://|(mailto|tel|sms):)~', $path)) {
            return filter_var($path, FILTER_VALIDATE_URL) !== false;
        }

        return true;
    }
}
