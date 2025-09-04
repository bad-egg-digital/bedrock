<?php

namespace App\Utilities;

class CssClasses {
    public function section($props = [])
    {
        $Colour = new Colour;
        $hex = $Colour->name2hex(@$props['bg_colour'], @$props['bg_tint']);

        $pattern = @$props['pattern'];
        $pattern_top = @$props['pattern_top'];
        $pattern_bottom = @$props['pattern_bottom'];

        $classes = [
            'section',
            'section-' . str_replace('acf/', '', $props['name']),
            'bg-' . $this->colourTint([
                'colour' => @$props['bg_colour'],
                'tint' => @$props['bg_tint'],
            ]),
        ];

        if(@$props['angle_status'])
            $classes[] = 'section-has-angle';

        if(@$props['angle_position'])
            $classes[] = 'section-has-angle-' . $props['angle_position'];

        if(@$props['padding_top'])
            $classes[] = 'section-zero-top';

        if(@$props['padding_bottom'])
            $classes[] = 'section-zero-bottom';

        if(@$props['bg_image'])
            $classes[] = "bg-watermarked";

        if($Colour->is_dark($hex) && $this->is_knockout_block($props['name']))
            $classes[] = 'knockout';

        if(@$props['className']) $args = array_merge($classes, explode(' ', $props['className']));

        return $classes;
    }

    public function button($args = [])
    {
        $default_args = [
            'colour' => null,
            'style' => null,
        ];

        $args = wp_parse_args($args, $default_args);

        $classes = [
            'button',
        ];

        if($args['colour']) $classes[] = $args['colour'];
        if($args['style']) $classes[] = $args['style'];

        return $classes;
    }

    public function colourTint($props = [])
    {
        if(@$props['colour']):
            $colour = $props['colour'];

            if($props['colour'] != 'black' && @$props['tint']):
                $colour .= '-' . $props['tint'];
            endif;
        else:
            $colour = 'white';
        endif;

        return $colour;
    }

    public function is_knockout_block($name = null)
    {
        $blacklist = [
            'cards-alternating',
        ];

        if(in_array($name, $blacklist)):
            return false;
        else:
            return true;
        endif;
    }
}
