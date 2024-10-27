<?php

error_reporting(0);
ini_set('display_errors', 1);

// カスタム設定の読み込み
require_once get_template_directory() . '/custom/custom-register.php';

function origin_theme_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form'));
  // servicesディレクトリ内の全てのファイルを読み込む
  foreach (glob(get_template_directory() . '/services/*.php') as $file) {
    require_once $file;
  }
}
add_action('after_setup_theme', 'origin_theme_setup');

function origin_theme_enqueue_scripts()
{
  // jQueryの読み込み
  wp_enqueue_script(
    'jquery',
    'https://code.jquery.com/jquery-3.3.1.js',
    array(),
    '1.0.0'
  );

  // Slick読み込み
  wp_enqueue_script(
    'Slick',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
    array('jquery'), // jQueryに依存
    '1.0.0'
  );

  // Slick CSS読み込み
  wp_enqueue_style(
    'Slick-css',
    "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css",
    array(),
    '1.0.0'
  );

  // Slick Theme CSS読み込み
  wp_enqueue_style(
    'Slick-theme-css',
    "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css",
    array(),
    '1.0.0'
  );

  $timestamp = date('YmdHis', filemtime(get_stylesheet_directory() . '/js/common.js'));
  wp_enqueue_script('add-script', get_stylesheet_directory_uri() . '/js/common.js', [], $timestamp, true);

  $timestamp = date('YmdHis', filemtime(get_stylesheet_directory() . '/styles/css/styles.css'));
  wp_enqueue_style('add-common-style', get_stylesheet_directory_uri() . '/styles/css/styles.css', array('wp-block-library'), $timestamp);
}
add_action('wp_enqueue_scripts', 'origin_theme_enqueue_scripts');

// Contact Form 7の自動pタグ無効化
add_filter('wpcf7_autop_or_not', '__return_false');

?>