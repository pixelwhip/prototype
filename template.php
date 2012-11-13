<?php

/**
 * MENUS
 */

/**
 * Overrides theme_menu_tree() for the main menu.
 */

function prototype_menu_tree__main_menu($variables) {
  return '<ul class="nav nav-inline">' . $variables['tree'] . '</ul>';
}

/**
 * Implements hook_preprocess_menu_link()
 */

function prototype_preprocess_menu_link(&$vars) {
  /* Set shortcut variables. Hooray for less typing! */
  $menu = $vars['element']['#original_link']['menu_name'];
  $mlid = $vars['element']['#original_link']['mlid'];
  $item_classes = &$vars['element']['#attributes']['class'];
  $link_classes = &$vars['element']['#localized_options']['attributes']['class'];

  /* Add global classes to all menu links */
  $item_classes[] = 'nav-item';
  $link_classes[] = 'nav-link';
}

/**
 * FIELDS
 */

/**
 * Implements hook_preprocess_field()
 */

function prototype_preprocess_field(&$vars) {
  /* Set shortcut variables. Hooray for less typing! */
  $field = $vars['element']['#field_name'];
  $bundle = $vars['element']['#bundle'];
  $mode = $vars['element']['#view_mode'];
  $classes = &$vars['classes_array'];
  $title_classes = &$vars['title_attributes_array']['class'];
  $content_classes = &$vars['content_attributes_array']['class'];
  $item_classes = array();

  /* Global field styles */
  $classes[] = 'field-wrapper';
  $title_classes[] = 'field-label';
  $content_classes[] = 'field-items';
  $item_classes[] = 'field-item';

  /* Uncomment the lines below to see variables you can use to target a field */
  // print '<strong>Field:</strong> ' . $field . '<br/>';
  // print '<strong>Bundle:</strong> ' . $bundle  . '<br/>';
  // print '<strong>Mode:</strong> ' . $mode .'<br/>';

  /* Example: Using an alternative theme function */
  // if($field == 'field_tags') {
  //   $vars['theme_hook_suggestions'][] = 'field__custom_separated';
  // }

  // Apply odd or even classes along with our custom classes to each item */
  foreach ($vars['items'] as $delta => $item) {
    $vars['item_attributes_array'][$delta]['class'] = $item_classes;
    $striping = $delta % 2 ? 'odd' : 'even';
    $vars['item_attributes_array'][$delta]['class'][] = $striping;
  }
}

/**
 * NODES
 */

/**
 * Implements hook_preprocess_node()
 */

function prototype_preprocess_node(&$vars) {
  /* Set shortcut variables. Hooray for less typing! */
  $type = $vars['type'];
  $mode = $vars['view_mode'];
  $classes = &$vars['classes_array'];
  $title_classes = &$vars['title_attributes_array']['class'];
  $content_classes = &$vars['content_attributes_array']['class'];

  /* Example: Adding a classes base on View Mode */
  // switch ($mode) {
  //   case 'photo_teaser':
  //     $classes[] = 'bg-white gutters-half l-space-trailing';
  //     break;
  // }
}

/**
 * BLOCKS
 */

/**
 * Implements hook_preprocess_block()
 */

function prototype_preprocess_block(&$vars) {
  /* Set shortcut variables. Hooray for less typing! */
  $block_id = $vars['block']->module . '-' . $vars['block']->delta;
  $classes = &$vars['classes_array'];
  $title_classes = &$vars['title_attributes_array']['class'];
  $content_classes = &$vars['content_attributes_array']['class'];

  /* Add global classes to all blocks */
  $title_classes[] = 'block-title';
  $content_classes[] = 'block-content';

  /* Uncomment the line below to see variables you can use to target a block */
  #print $block_id . '<br/>';

  // /* Add classes based on the block delta. */
  // switch ($block_id) {
  //   /* System Navigation block */
  //   case 'system-navigation':
  //     $classes[] = 'block-rounded';
  //     $title_classes[] = 'block-fancy-title';
  //     $content_classes[] = 'block-fancy-content';
  //     break;
  // }
}

/**
 * FORMS
 */

/**
 * Implements hook_form_alter
 */

function prototype_form_alter(&$form, &$form_state, $form_id) {
  /* Add placeholder text to a form */
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#attributes']['placeholder'] = "Enter a term";
  }
}
