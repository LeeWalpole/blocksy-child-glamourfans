<?php include get_stylesheet_directory() . '/hero/variables.php'; ?>

<?php if ($hero_image) : ?>

<style>
.lw-hero[data-hero="feature"] .hero-feature figure::after {
    background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/hero/assets/glamourfans-heart-gradient.png');
}
</style>
<?php endif; ?>

<header class="lw-hero" data-hero="<?php echo esc_attr($hero_template); ?>">

    <?php include get_stylesheet_directory() . '/hero/header.php'; ?>

    <?php if ($hero_image) : ?>
    <?php include get_stylesheet_directory() . '/hero/' . 'media.php'; ?>
    <?php endif; ?>


</header>