<?php
/**
 * @file
 * Block hooks.
 */

/**
 * Implements hook_preprocess_block().
 */
function prototype_preprocess_block(&$vars) {

  // Set shortcut variables. Hooray for less typing!
  $block_id = $vars['block']->module . '-' . $vars['block']->delta;
  $classes = &$vars['classes_array'];
  $title_classes = &$vars['title_attributes_array']['class'];
  $content_classes = &$vars['content_attributes_array']['class'];

  // Add global classes to all blocks.
  $title_classes[] = 'block-title';
  $content_classes[] = 'block-content';

  // Uncomment the lines below to see variables you can use to target a block.
  // This requires http://drupal.org/project/devel to be installed.
  // dpm($block_id, 'Block ID:');

  // Add classes based on the block delta.
  switch ($block_id) {
    case 'system-navigation':
      $classes[] = 'block-rounded';
      $title_classes[] = 'block-fancy-title';
      $content_classes[] = 'block-fancy-content';
      break;
  }
}
