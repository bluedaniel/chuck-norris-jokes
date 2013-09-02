<?php
/**
 * Plugin Name: The Random Chuck Norris Jokes Plugin
 * Plugin URI: http://supercerebral.com/
 * Description: What it says on the tin.
 * Author: Daniel Levitt
 * Version: 1
 * Author URI: http://n0tice.org/wordpress
 */
add_filter('media_upload_tabs', 'chuck_add_media_tab');
add_action('media_upload_chuck_media', 'chuck_tab_iframe');

function chuck_add_media_tab($tabs) {
    $tabs['chuck_media'] = __('Insert Chuck Norris Joke', 'chuck_media');
    return $tabs;
}

function chuck_tab_iframe() {
    wp_register_style('chuck-media-css', plugins_url('css/media-tab.css?time='.time(), __FILE__));
    wp_enqueue_style('chuck-media-css');
    wp_enqueue_script('chuck-media-js', plugins_url('js/media-tab.js', __FILE__));
    wp_iframe('chuck_tab_content');
}

function chuck_tab_content() {
    echo "<div class=\"chuck-norris-container\">"; // He can't really be contained.
    echo "  <p class=\"joke\"></p>";
    echo "  <div style=\"display:block;width: 170px;margin:0 auto;\">";
    echo "      <a href=\"#\" class=\"button white refresh-joke\">Refresh</a>";
    echo "      <a href=\"#\" style=\"margin-left:30px;\" class=\"button blue insert-joke\">Insert</a>";
    echo "  </div>";
    echo "</div>";
}