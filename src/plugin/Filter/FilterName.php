<?php

namespace Drupal\filter_name\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * Replaces "[name:FIRSTNAME:LASTNAME"] with "Name:LASTNAME FIRSTNAME".
 */
class FilterName extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    // Detects pattern using Regular Expression.
    $reg = '/\[name\:(\w+)\:(\w+)\]/';
    $replace = "Name: " . '$2 $1';
    // Replaces the text using RegEx and returns the new text formed.
    $new = preg_replace($reg, $replace, $text);
    return new FilterProcessResult($new);
  }

}
