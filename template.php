<?php
/**
 * @file
 * Template stuff.
 */

include 'inc/block.inc';
include 'inc/field.inc';
include 'inc/form.inc';
include 'inc/menu.inc';
include 'inc/node.inc';

function prototype_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {

    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' <span class="breadcrumb-separator">/</span> ', $breadcrumb) . '</div>';
    return $output;
  }
}
