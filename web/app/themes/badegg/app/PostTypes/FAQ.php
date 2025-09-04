<?php

namespace App\PostTypes;

class FAQ
{
    public function __construct()
    {
        add_action('init', [$this, 'register']);
    }

    public function register()
    {
        $td = 'sage';
        $postType = 'faq';

        register_extended_post_type(
            $postType,
            [
                'menu_position' => 40,
                'supports' => [
                    'title',
                    'editor',
                ],
                'menu_icon' => 'dashicons-admin-comments',
                'rewrite' => false,
                'has_archive' => false,
                'publicly_queryable' => false,
                'exclude_from_search' => true,
                'capability_type' => 'page',
                'show_in_nav_menus' => false,
                'admin_cols' => [
                    'faq_category' => [
                        'title' => __('Category', $td),
                        'taxonomy' => 'faq_category',
                    ],
                ],
            ],
        );

        register_extended_taxonomy(
            'faq_category',
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
