<?php
/**
 * Check where post type `product` are used in DB
 */

namespace Lambry\BatchPress;

use WP_Query;

if (!defined('ABSPATH')) exit;

class FindProductPosts {
  public $batch = 10; // Number of items to process per batch
  public $label = 'Find all Product Posts'; // Name of the job

  // Prepare an array of items for processing
  public function items() : array {
    // Fetch all post ids of post type 'product'
    $args = array(
      'post_type' => 'product',
      'post_status' => 'any',
      'fields' => 'ids',
      'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    $posts = $query->posts;

    // Return array of post IDs
    return $posts;
  }

  // Process each item (post) and optionally return log info
  public function process($item) {
    // It's simply returning the info for this example
    // In real scenario, you can perform another task here depending on your requirements
    // For example, modifying the product data
    return 'Post with ID ' . $item . ' is a product post';
  }
}
