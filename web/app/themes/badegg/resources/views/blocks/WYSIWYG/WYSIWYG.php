<?php

namespace Blocks\WYSIWYG;
use App\Utilities;
use App\ACF;

class WYSIWYG
{
  public function __construct()
  {
    add_action('acf/init', [$this, 'init']);
  }

  public function init()
  {
    acf_register_block_type([
        'name'              => 'badegg/wysiwyg',
        'title'             => __('Basic Content'),
        'description'       => __('Basic text editor '),
        'render_callback'   => [ $this, 'render'],
        'category'          => 'badegg',
        'icon'              => 'editor-paragraph',
        'supports'          => [
            'align' => false,
        ],
        'example' => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                  'inserter' => true,
                ],
            ],
        ],
    ]);
  }

  public function render($block, $content = '', $is_preview = false)
  {
    $name = basename(__FILE__, '.php');
    $themeURL = get_template_directory_uri();

    if($is_preview && @$block['data']['inserter']):
      echo '<img style="display: block; width: 100%" src="' . $themeURL . '/resources/views/blocks/' . $name . '/' . $name . '.jpg" />';
      return;
    endif;

    $CssClasses = new Utilities\CssClasses;
    $Colour     = new Utilities\Colour;
    $CloneGroup = new ACF\CloneGroup;

    $data = [];

    $fields = [
      'wysiwyg',
    ];
    $fields = array_merge($fields, $CloneGroup->block_all());

    foreach($fields as $field):
      $data[$field] = get_field($field);
    endforeach;

    unset($block['data']);
    $block['name'] = str_replace('acf/', '', $block['name']);

    $data = array_merge($data, $block);
    $data['section_classes'] = $CssClasses->section($data);
    $data['block'] = $block;

    echo \Roots\view("blocks.$name.$name", [
      'data' => $data,
      'block' => $block,
    ])->render();
  }
}
