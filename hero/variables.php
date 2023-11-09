<?php
// variables.php
// Hero Templates:
// standard : Vertical Hero (Title on top of Media)
// simple : Simple Hero (No Media)
// appfeature : Text Left and Image to right (with heart in background)

global $post;
$post_id = $post->ID;

$hero_template = get_field('hero_template', $post_id);
$hero_title = get_field('hero_title', $post_id) ?: get_the_title($post_id);
$hero_text = get_field('hero_text', $post_id) ?: '';
$categories = get_the_category($post_id);
$first_category = !empty($categories) ? $categories[0]->name : '';
$tags = get_the_tags($post_id);
$published_date = get_the_date('j M, Y', $post_id);
$hero_image = get_field('hero_image', $post_id);
?>