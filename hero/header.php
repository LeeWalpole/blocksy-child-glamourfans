<?php include get_stylesheet_directory() . '/hero/variables.php'; ?>



<section class="hero-header">

    <?php if ( is_singular("features") ) { // Check if it's a single post ?>
    <ul class="lw-meta">
        <li class="lw-meta-category">
            <a href="#">Features</a>
        </li>
        <li>
            <span style="margin-right: 2px">🕒</span>
            <?php echo $published_date; ?>
        </li>
    </ul>
    <?php } elseif ( is_singular("post") ) { // Check if it's a single post ?>
    <ul class="lw-meta">
        <?php if ( !empty($categories) && isset($categories[0]) ) : ?>
        <li class="lw-meta-category">
            <a href=" <?php echo get_category_link($categories[0]->term_id); ?>"><?php echo $first_category; ?></a>
        </li>
        <li>
            <span style="margin-right: 2px">🕒</span>
            <?php echo $published_date; ?>
        </li>
    </ul>
    <?php endif; ?>

    <?php } else null; ?>





    <?php if ($hero_title) : ?>
    <h1 class="hero-title">
        <?php echo $hero_title; ?>
    </h1>
    <?php endif; // hero_title ?>

    <?php if ($hero_text) : ?>
    <div class="hero-text">
        <?php echo $hero_text; ?>
    </div>
    <?php endif; // hero_text ?>


    <?php if ( is_single() && $tags ) : // Check if it's a single post ?>

    <ul class="lw-meta">
        <?php foreach ($tags as $tag) : ?>
        <li class="lw-meta-tag">
            <a href=" <?php echo get_tag_link($tag->term_id); ?>">#<?php echo $tag->name; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; // single & hashtags ?>

</section>