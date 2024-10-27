<?php

namespace App\Service;

require_once 'PostService.php';
use App\Service\PostService;

class TechBlogService extends PostService
{
    public static function get_tech_blogs()
    {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $search_query = get_search_query();
        $args = array(
            'post_type' => 'tech-blog',
            'posts_per_page' => 5,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged,
            'post_status' => 'publish',
        );
        if ($search_query) {
            $args['s'] = $search_query;
        }
        return new \WP_Query($args);
    }

    public static function get_categories($taxonomy = 'tech-blog-category')
    {
        return get_terms($taxonomy);
    }

    // よく見られているコラムを取得（閲覧数が多い順に4件取得）
    public static function get_frequently_tech_blogs() {
        $args = array(
            'post_type' => 'tech-blog',
            'posts_per_page' => 4,
            'orderby' => 'meta_value_num',
            'meta_key' => 'post_views_count',
            'order' => 'DESC',
            'post_status' => 'publish'
        );
        $query = new \WP_Query($args);
        return $query;
    }

    public static function get_tech_blogs_by_category()
    {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $category_slug = get_queried_object()->slug;
        $search_query = get_search_query();
        $args = array(
            'post_type' => 'tech-blog',
            'posts_per_page' => 5,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tech-blog-category',
                    'field' => 'slug',
                    'terms' => $category_slug
                )
            ),
        );
        if ($search_query) {
            $args['s'] = $search_query;
        }
        return new \WP_Query($args);
    }

    public static function get_pagination($all_posts)
    {
        return parent::get_pagination($all_posts);
    }

    public static function create_object($postId)
    {
        $object = new \stdClass();
        $object->permalink = get_permalink($postId);                                        # パーマリンク
        $object->thumbnail_url = get_the_post_thumbnail_url($postId, 'full');               # サムネイルのURL
        $object->title = get_the_title($postId);                                            # コラム タイトル
        $object->date = get_the_date('Y年n月j日', $postId);                                  # 日付
        $object->content = get_the_content($postId);                                        # 本文
        $categories = get_the_terms($postId, 'tech-blog-category');
        $object->tech_blog_category = $categories ? $categories[0]->name : '';              # カテゴリー
        $object->tech_blog_categories = get_the_terms($postId, 'tech-blog-category');       # カテゴリー
        $object->tech_blog_tags = get_the_terms($postId, 'tech-blog-tag');                  # タグ
        return $object;
    }
}