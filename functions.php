<?php

if (! defined('WP_DEBUG')) {
    die( 'Direct access forbidden.' );
}

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('lw-styles', get_stylesheet_directory_uri() . '/style.css', array(), null, false);

    // // Preload Flickity CSS
    // echo '<link rel="preload" href="https://unpkg.com/flickity@2/dist/flickity.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';

    // Flickity = Carousel / swiper (used in hero section and custom blocks)
    // LW: Chose to use Flickity as it's clean and fast. Although when we move to headless, will probs use React Swiper JS instead.
    wp_enqueue_style( 'flickity-css', 'https://unpkg.com/flickity@2/dist/flickity.min.css', array(), null, 'all' );
    wp_enqueue_script( 'flickity-js', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array('jquery'), null, true );

    // Ignore below, was using for test only
    // wp_enqueue_script( 'lw-js', get_stylesheet_directory_uri() . '/lw.js', array('jquery'), null, true );
});

/* 
hero-helper.php dynamically choses the hero template based on the hero_template acf field value.
When a new hero_template is added to ACF, you need to add the exact hero_template name inside "templates" folder with the following naming convention "hero-[hero_name]"
*/
include get_stylesheet_directory() . '/hero/helper.php';




    // LW: Add Glamourfans Gradient to the theme
add_theme_support(
    'editor-gradient-presets',
    array(
        array(
            'name'     => esc_attr__( 'Glamourfans Gradient', 'themeLangDomain' ),
            'gradient' => 'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
            'slug'     => 'vivid-cyan-blue-to-vivid-purple'
        ),
        array(
            'name'     => esc_attr__( 'Vivid green cyan to vivid cyan blue', 'themeLangDomain' ),
            'gradient' => 'linear-gradient(135deg,rgba(0,208,132,1) 0%,rgba(6,147,227,1) 100%)',
            'slug'     =>  'vivid-green-cyan-to-vivid-cyan-blue',
        ),
        array(
            'name'     => esc_attr__( 'Light green cyan to vivid green cyan', 'themeLangDomain' ),
            'gradient' => 'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)',
            'slug'     => 'light-green-cyan-to-vivid-green-cyan',
        ),
        array(
            'name'     => esc_attr__( 'Luminous vivid amber to luminous vivid orange', 'themeLangDomain' ),
            'gradient' => 'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)',
            'slug'     => 'luminous-vivid-amber-to-luminous-vivid-orange',
        ),
        array(
            'name'     => esc_attr__( 'Luminous vivid orange to vivid red', 'themeLangDomain' ),
            'gradient' => 'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)',
            'slug'     => 'luminous-vivid-orange-to-vivid-red',
        ),
    )
);

add_filter('blocksy:editor-gradient-presets', function ($gradients) {
	$gradients[] = [
		'name' => 'gradient-glamourfans',
		'gradient' => 'linear-gradient(to right,#fdda77 -17%,#f7bb77 -6%,#f19c78 5%,#eb7d79 17%,#e55e79 28%,#df3f7a 39%,#d43785 51%,#bd5aa3 62%,#a77ec1 73%,#90a2df 85%,#79c6fd 96%)',
		'slug' => 'gradient-glamourfans',
	];
	return $gradients;
});