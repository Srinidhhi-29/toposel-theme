<?php

function toposel_styles() {
    wp_enqueue_style('toposel-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'toposel_styles');

add_theme_support('woocommerce');
add_theme_support('post-thumbnails');