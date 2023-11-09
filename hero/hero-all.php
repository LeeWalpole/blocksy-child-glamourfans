<?php
get_template_part('hero/variables');

$hero_template_name = "simple"; // Default template name

while ( have_posts() ) : the_post();
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        $slug = $categories[0]->slug;

        if ( $slug == 'blog' ) {
            $hero_template_name = "standard";
        } elseif ( $slug == 'features' ) {
            $hero_template_name = "feature";
        } elseif ( $slug == 'guides' ) {
            $hero_template_name = "guide";
        }
    }
endwhile;
?>

<header class="lw-hero" data-hero="<?php echo esc_attr($hero_template_name); ?>">
    <?php get_template_part('hero/header'); ?>
    <div>
        <?php get_template_part('hero/media'); ?>
    </div>
</header>