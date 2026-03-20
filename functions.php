<?php

function toposel_enqueue_styles() {
    wp_enqueue_style(
        'toposel-style',
        get_stylesheet_uri()
    );
}
add_action('wp_enqueue_scripts', 'toposel_enqueue_styles');

add_theme_support('post-thumbnails');
add_theme_support('woocommerce');