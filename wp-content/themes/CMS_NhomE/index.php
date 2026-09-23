<?php
/** Trang danh sách bài viết và lưu trữ. */
get_header();
?>
<main id="site-content">
    <div class="fit-listing-layout">
        <?php get_template_part( 'Module11/archive' ); ?>
        <?php get_template_part( 'Module2/content' ); ?>
        <?php get_template_part( 'Module12/comments' ); ?>
    </div>
</main>
<?php get_footer(); ?>
