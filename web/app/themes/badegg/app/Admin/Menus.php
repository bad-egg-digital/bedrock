<?php

namespace App\Admin;

class Menus
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'cleanup_appearance']);

    }

    public function cleanup_appearance()
    {
        $customize_url = add_query_arg(
            'return',
            urlencode(
                remove_query_arg(
                    wp_removable_query_args(),
                    wp_unslash( $_SERVER['REQUEST_URI'] )
                )
            ),
            'customize.php'
        );

	    remove_submenu_page( 'themes.php', $customize_url );
	    remove_submenu_page( 'themes.php', 'widgets.php' );
	    remove_submenu_page( 'themes.php', 'site-editor.php' );
    }

}
