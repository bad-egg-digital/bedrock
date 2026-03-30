<?php

/**
 * Plugin Name:  Bad Egg Digital Theme Activator
 * Description:  Automatically activate the Bad Egg Theme
 * Author:       Bad Egg Digital
 * Author URI:   https://www.badegg.digital/
 * License:      MIT License
 */

namespace badegg\activator;

if(is_blog_installed()) {
    $template = get_option('template');
    $stylesheet = get_option('stylesheet');

    if(!$template) {
        add_option('template', 'badegg');
    } elseif($template != 'badegg') {
        update_option('template', 'badegg');
    }

    if(!$stylesheet) {
        add_option('stylesheet', 'badegg');
    } elseif($stylesheet != 'badegg') {
        update_option('stylesheet', 'badegg');
    }
}
