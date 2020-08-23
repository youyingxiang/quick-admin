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

namespace quick\admin\layout;

use quick\admin\support\Helper;

class Menu
{
    /**
     * @var array
     */
    protected static $helperNodes = [
        [
            'id'        => 1,
            'title'     => 'Helpers',
            'icon'      => 'fa fa-keyboard-o',
            'uri'       => '',
            'parent_id' => 0,
        ],
        [
            'id'        => 2,
            'title'     => 'Extensions',
            'icon'      => '',
            'uri'       => 'helpers/extensions',
            'parent_id' => 1,
        ],
        [
            'id'        => 3,
            'title'     => 'Scaffold',
            'icon'      => '',
            'uri'       => 'helpers/scaffold',
            'parent_id' => 1,
        ],
        [
            'id'        => 4,
            'title'     => 'Icons',
            'icon'      => '',
            'uri'       => 'helpers/icons',
            'parent_id' => 1,
        ],
    ];
    /**
     * @var string
     */
    protected $view = 'partials:menu';
    /**
     * @var array
     */
    protected $nodes = [];

    public function __construct()
    {
        $this->nodes = static::$helperNodes;
    }

    /**
     * @param string $view
     *
     * @return $this
     */
    public function view(string $view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @param array $item
     *
     * @return string
     */
    public function getContent(array $item)
    {
        return admin_view($this->view, ['item' => &$item, 'builder' => $this])->getContent();
    }

    /**
     * @param array       $item
     * @param null|string $path
     *
     * @return bool
     */
    public function isActive(array $item, ?string $path = null)
    {
        if (empty($path)) {
            $path = request()->pathinfo();
        }

        if (empty($item['children'])) {
            if (empty($item['uri'])) {
                return false;
            }

            return trim($this->getPath($item['uri']), '/') == $path;
        }

        foreach ($item['children'] as $v) {
            if ($path == trim($this->getPath($v['uri']), '/')) {
                return true;
            }
            if (! empty($v['children'])) {
                if ($this->isActive($v, $path)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param string $uri
     *
     * @return string
     */
    public function getPath($uri)
    {
        return $uri
            ? (Helper::isValidUrl($uri) ? $uri : admin_base_path($uri))
            : $uri;
    }

    /**
     * @param string $uri
     *
     * @return string
     */
    public function getUrl($uri)
    {
        return $uri ? admin_url($uri) : $uri;
    }

    /**
     * @param array $nodes
     * @return string
     */
    public function toHtml()
    {
        $html = '';
        foreach (Helper::buildNestedArray($this->nodes) as $item) {
            $html .= $this->getContent($item);
        }

        return $html;
    }
}
