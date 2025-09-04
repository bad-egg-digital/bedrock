<?php

namespace App\PostTypes;

class Driver
{
    public function __construct()
    {
        add_action('init', [$this, 'register']);
    }

    public function register()
    {
        $td = 'sage';
        $postType = 'driver';

        register_extended_post_type(
            $postType,
            [
                'labels' => [
                    'featured_image' => __('Portrait', $td),
                ],
                'menu_position' => 40,
                'supports' => [
                    'title',
                    'excerpt',
                    'thumbnail',
                    'page-attributes',
                ],
                'menu_icon' => 'dashicons-car',
                'rewrite' => false,
                'has_archive' => false,
                'publicly_queryable' => false,
                'exclude_from_search' => true,
                'capability_type' => 'page',
                'show_in_nav_menus' => false,
                'admin_cols' => [
                    'credentials' =>[
                        'title' => __('Credentials', $td),
                        'meta_key' => 'badegg_driver_credentials',
                    ],
                    'driver_category' => [
                        'title' => __('Category', $td),
                        'taxonomy' => 'driver_category',
                    ],
                    'portrait' => [
                        'title' => __('Portrait', $td),
                        'featured_image' => 'thumbnail',
                        'width' => 48,
                        // 'height' => 48,
                    ],
                ],
            ],
        );

        register_extended_taxonomy(
            'driver_category',
            $postType,
            [
                // 'meta_box' => 'radio',
                'rewrite' => false,
                'publicly_queryable' => false,
                'show_in_nav_menus' => false,
            ],
            [
                'singular' => __('Category', $td),
                'plural' => __('Categories', $td),
            ]
        );
    }
}
