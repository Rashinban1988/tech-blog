<?php

function create_news() {

    // 投稿タイプの定義
    register_post_type(
        'news',
        array(
            'label' => 'お知らせ',
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-rss',
            'supports' => array(
                'title', // タイトル
                'thumbnail', // アイキャッチ画像
                'editor'
            ),
            'rewrite' => array('slug' => 'news', 'with_front' => false), // リライトルールを追加
        )
    );
}
add_action('init', 'create_news');