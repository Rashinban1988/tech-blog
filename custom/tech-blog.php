<?php

function create_tech_blog() {

    // 投稿タイプの定義
    register_post_type(
        'tech-blog',
        array(
            'label' => '技術ブログ',
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'menu_position' => 7,
            'menu_icon' => 'dashicons-welcome-write-blog',
            'supports' => array(
                'title', // タイトル
                'thumbnail', // アイキャッチ画像
                'editor',
            ),
            'rewrite' => array('slug' => 'tech-blog', 'with_front' => false), // リライトルールを追加
        )
    );

    // カテゴリーの定義
    register_taxonomy(
        'tech-blog-category',
        'tech-blog',
        array(
            'label' => 'カテゴリー',
            'labels' => array(
                'popular_items' => 'よく使うカテゴリー',
                'edit_item' => 'カテゴリーの編集',
                'add_new_item' => 'カテゴリーの追加',
                'search_items' => 'カテゴリーの検索',
            ),
            'public' => true,
            'description' => '技術ブログのカテゴリー', // カテゴリーの説明
            'hierarchical' => true, // 階層を持たせるかどうか
            'show_in_rest' => true,
            'show_admin_column' => true, // 投稿リストに列として表示
        )
    );

    // タグの定義
    register_taxonomy(
        'tech-blog-tag',
        'tech-blog',
        array(
            'label' => 'タグ',
            'labels' => array(
                'popular_items' => 'よく使うタグ',
                'edit_item' => 'タグの編集',
                'add_new_item' => 'タグの追加',
                'search_items' => 'タグの検索',
            ),
            'public' => true,
            'description' => '技術ブログのタグ', // カテゴリーの説明
            'hierarchical' => false, // 階層を持たせるかどうか
            'show_in_rest' => true,
            'show_admin_column' => true, // 投稿リストに列として表示
        )
    );

    // // 固定カスタムフィールドボックス
    // function add_tech_blog_fields() {
    //     //add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
    //     //第4引数のpostをpageに変更すれば固定ページにオリジナルカスタムフィールドが表示されます(custom_post_typeのslugを指定することも可能)。
    //     //第5引数はnormalの他にsideとadvancedがあります。
    //     add_meta_box( 'tech_blog_setting', 'カスタムフィールド', 'insert_tech_blog_fields', 'tech-blog', 'normal');
    // }
    // add_action('admin_menu', 'add_tech_blog_fields');

    // // カスタムフィールドの入力エリア
    // function insert_tech_blog_fields() {
    //     global $post;

    //     if( get_post_meta($post->ID,'attention_flag',true) == "is-on" ) {
    //         $attention_flag_check = "checked";
    //     }
    //     echo 'おすすめフラグ： <input type="checkbox" name="attention_flag" value="is-on" '.$attention_flag_check.' ><br>';
    // }

    // // カスタムフィールドの値を保存
    // function save_tech_blog_fields( $post_id ) {
    //     if(!empty($_POST['attention_flag'])){
    //         update_post_meta($post_id, 'attention_flag', $_POST['attention_flag'] );
    //     }else{
    //         delete_post_meta($post_id, 'attention_flag');
    //     }
    // }
    // add_action('save_post', 'save_tech_blog_fields');

}
add_action('init', 'create_tech_blog');