<?php

// 記事のPVを取得
function getPostViews($postID)
{
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if ($count == '') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
}
return $count . ' Views';
}

// 管理人とボット以外のアクセス数をカウントし、各投稿データに保存
function set_post_views() {

    if(!is_user_logged_in() && !is_bot()) {

        if(is_single()) {

        $post_id = get_the_ID();

        $count_key = 'post_views_count';
        $count = get_post_meta($post_id, $count_key, true);

        if(empty($count)) {

            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, 1);

        } else {

            $count = $count + 1;

            update_post_meta($post_id, $count_key, $count);

        }

        }

    }

}
add_action('wp_head', 'set_post_views');

// ボット判定
function is_bot() {
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $bots = array(
        'googlebot',
        'msnbot',
        'yahoo'
    );
    foreach($bots as $bot) {
        if(stripos($ua, $bot) !== false) {
            return true;
        }
    }
    return false;
}

// 投稿のアクセス数を取得
function get_post_views($post_id) {

    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);

    if($count == '') {

        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');

        return '0 View';

    }

    return $count . ' Views';

}

// 管理画面にview数を出力する、対象の投稿タイプを配列で定義
function get_target_post_types_of_display_view_count() {
    return array(
        'tech-blog',
    );
}

// 管理画面のカラムを追加
function manage_posts_columns($columns, $post_type) {
    $target_post_types = get_target_post_types_of_display_view_count();

    // 特定の投稿タイプに絞る
    if (in_array($post_type, $target_post_types)) {
        $columns['post_views_count'] = 'view数';
    }
    return $columns;
}
// 第2引数に投稿タイプを指定
add_filter('manage_posts_columns', 'manage_posts_columns', 10, 2);

// アクセス数を出力
function add_column($column_name, $post_id) {
    $target_post_types = get_target_post_types_of_display_view_count();
    // 投稿タイプを取得
    $post_type = get_post_type($post_id);

    // 特定の投稿タイプに絞る
    if (!in_array($post_type, $target_post_types)) {
        return;
    }

    /*View数呼び出し*/
    if ($column_name === 'post_views_count') {
        $pv = get_post_meta($post_id, 'post_views_count', true);
        if (isset($pv) && $pv) {
            echo esc_attr($pv);
        } else {
            echo __('None');
        }
    }
}
add_action('manage_posts_custom_column', 'add_column', 10, 2);