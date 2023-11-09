<?php
include get_stylesheet_directory() . '/hero/variables.php';
?>

<?php if ($hero_image) : ?>

<div class="hero-feature">
    <figure>
        <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($hero_title); ?>">
    </figure>
</div>
<?php endif; ?>