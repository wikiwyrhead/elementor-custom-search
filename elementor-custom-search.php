<?php

/**
 * Plugin Name: Elementor Custom Search
 * Description: A custom search widget for Elementor.
 * Version: 1.0
 * Author: Arnel Go
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function ecs_include_custom_post_types_in_search($query)
{
    if ($query->is_search && !is_admin() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'page', 'your_custom_post_type'));
    }
    return $query;
}
add_filter('pre_get_posts', 'ecs_include_custom_post_types_in_search');

function ecs_register_custom_search_widget($widgets_manager)
{
    require_once plugin_dir_path(__FILE__) . 'widget-ecs-custom-search.php';
    $widgets_manager->register(new \ECS_Custom_Search_Widget());
}
add_action('elementor/widgets/widgets_registered', 'ecs_register_custom_search_widget');
