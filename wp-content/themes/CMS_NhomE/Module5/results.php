<?php /** Module 5: kết quả tìm kiếm bài viết. */ ?>
<div class="fit-search-container">
    <?php while ( have_posts() ) : the_post(); ?>
        <article class="fit-search-item">
            <div class="fit-search-content">
                <h2 class="fit-search-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
            </div>
        </article>
    <?php endwhile; ?>
</div>
