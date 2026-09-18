<?php
/** Trang tìm kiếm. */
get_header();
?>
<main id="site-content">
    <?php if ( have_posts() ) : ?>
        <?php get_template_part( 'Module5/results' ); ?>
    <?php else : ?>
        <?php get_template_part( 'Module4/empty' ); ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
