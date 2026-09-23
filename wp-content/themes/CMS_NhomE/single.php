<?php
/** Trang chi tiết bài viết. */
get_header();
?>
<main id="site-content">
    <div class="fit-single-layout">
        <?php get_template_part( 'Module9/categories' ); ?>
        <?php get_template_part( 'Module6/detail' ); ?>
        <?php get_template_part( 'Module10/recent-posts' ); ?>
    </div>
</main>
<?php get_footer(); ?>
