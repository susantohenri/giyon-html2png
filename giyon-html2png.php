<?php

/**
 * Plugin Name: Giyon HTML2PNG
 * Plugin URI: https://github.com/susantohenri/giyon-html2png
 * Description: Turn Woocommerce Order into Printable PNG.
 * Version: 1.0.0
 * Author: Henrisusanto
 * Author URI: https://github.com/susantohenri/
 * Text Domain: giyon-giyon-html2png
 * Domain Path: /i18n/languages/
 * Requires at least: 6.5
 * Requires PHP: 7.4
 */

add_filter('manage_woocommerce_page_wc-orders_columns', 'giyon_html2png_column_header');
add_action('manage_woocommerce_page_wc-orders_custom_column', 'giyon_html2png_column_content', 10, 2);

function giyon_html2png_column_header($columns)
{
    return array_merge($columns, ['giyon-html2png' => __('Cetak', 'textdomain')]);
}

function giyon_html2png_column_content($column_key, $order)
{
    if ($column_key == 'giyon-html2png') {
        $href = plugin_dir_url(__FILE__) . 'invoice.php?order_id=' . $order->id;
        echo "<a target='_blank' href='{$href}'>Cetak</a>";
    }
}
