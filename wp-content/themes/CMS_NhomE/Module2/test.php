<?php /** Module 2: danh sách bài viết. */ ?>
<div class="module-2-content-container">
    <div class="fit-posts-list">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="fit-post-card">
                    <div class="fit-post-content">
                        <h2 class="fit-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
