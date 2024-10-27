<?php

namespace App\Service;

class PostService {
    /**
     * 指定したタクソノミーのカテゴリーを取得
     * @param string $taxonomy
     * @return array
     */
    public static function get_categories($taxonomy) {
        $categories = get_terms($taxonomy, 'orderby=term_order&order=ASC&hide_empty=0');
        return $categories;
    }

    /**
     * 指定した投稿タイプの最新の投稿を取得
     * @param string $post_type
     * @param int $posts_per_page
     * @return \WP_Query
     */
    public static function get_latest_posts($post_type, $posts_per_page = 5) {
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $posts_per_page,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish'
        );
        return new \WP_Query($args);
    }

    /**
     * 投稿タイプとスラッグから投稿を取得
     * @param string $post_type
     * @param string $slug
     * @return \WP_Query
     */
    public static function get_latest_posts_by_slug($post_type, $slug, $posts_per_page = 5) {
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $posts_per_page,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => $post_type . '_category',
                    'field' => 'slug',
                    'terms' => $slug
                )
            )
        );
        return new \WP_Query($args);
    }

    // ページネーションのリンクを取得
    public static function get_pagination($all_posts) {
        return paginate_links(array(
            'total' => $all_posts->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'format' => '?paged=%#%',
            'show_all' => false,
            'type' => 'plain',
            'end_size' => 2,
            'mid_size' => 1,
            'prev_text' => '<img src="' . get_template_directory_uri() . '/images/btn_arrow_green.svg" alt="Previous">',
            'next_text' => '<img src="' . get_template_directory_uri() . '/images/btn_arrow_green.svg" alt="Next">',
        ));
    }
}