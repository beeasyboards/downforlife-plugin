<?php namespace BeEasy\DownForLife;

use Backend;
use System\Classes\PluginBase;

/**
 * DownForLife Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Down For Life',
            'description' => 'Awesome homies who are down for life.',
            'author'      => 'Be Easy',
            'icon'        => 'icon-users'
        ];
    }

    /**
     * Registers the backend navigation items
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'downforlife' => [
                'label'       => 'Down For Life',
                'url'         => Backend::url('beeasy/downforlife/homies'),
                'icon'        => 'icon-users',
                'permissions' => ['BeEasy.DownForLife.*'],
                'order'       => 700,

                'sideMenu' => [
                    'homies' => [
                        'label'         => 'Down For Life',
                        'icon'          => 'icon-users',
                        'url'           => Backend::url('beeasy/downforlife/homies'),
                        'permissions'   => ['BeEasy.DownForLife.access_homies'],
                    ],
                ],
            ],
        ];
    }
}
