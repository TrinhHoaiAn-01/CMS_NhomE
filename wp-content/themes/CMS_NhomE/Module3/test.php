<?php
/** Module 3: chân trang của giao diện. */
?>
<section id="footer" class="cms-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Bình luận mới</h2>
                <ul class="cms-footer-links">
                    <?php $recent_comments = get_comments( array( 'number' => 5, 'status' => 'approve', 'post_status' => 'publish' ) ); ?>
                    <?php foreach ( $recent_comments as $comment ) : ?>
                        <li><a href="<?php echo esc_url( get_comment_link( $comment ) ); ?>">
                            <?php echo esc_html( get_comment_author( $comment ) . ': ' . wp_trim_words( wp_strip_all_tags( $comment->comment_content ), 7, '…' ) ); ?>
                        </a></li>
                    <?php endforeach; ?>
                    <?php if ( ! $recent_comments ) : ?><li>Chưa có bình luận nào</li><?php endif; ?>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Chuyên mục</h2>
                <ul class="cms-footer-links">
                    <?php $categories = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => false, 'number' => 5 ) ); ?>
                    <?php foreach ( $categories as $category ) : ?>
                        <li><a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                            <?php echo esc_html( $category->name . ' (' . $category->count . ')' ); ?>
                        </a></li>
                    <?php endforeach; ?>
                    <?php if ( ! $categories ) : ?><li>Chưa có chuyên mục</li><?php endif; ?>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Bài viết mới</h2>
                <ul class="cms-footer-links">
                    <?php $recent_posts = get_posts( array( 'numberposts' => 5, 'post_status' => 'publish' ) ); ?>
                    <?php foreach ( $recent_posts as $post_item ) : ?>
                        <li><a href="<?php echo esc_url( get_permalink( $post_item ) ); ?>">
                            <?php echo esc_html( wp_trim_words( get_the_title( $post_item ), 7, '…' ) ); ?>
                        </a></li>
                    <?php endforeach; ?>
                    <?php if ( ! $recent_posts ) : ?><li>Chưa có bài viết nào</li><?php endif; ?>
                </ul>
            </div>
        </div>
        <nav class="cms-footer-social" aria-label="Mạng xã hội">
            <a href="https://facebook.com" aria-label="Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
            <a href="https://instagram.com" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
            <a href="mailto:contact@fit.tdc.edu.vn" aria-label="Email"><i class="fa-solid fa-envelope" aria-hidden="true"></i></a>
        </nav>
        <p class="cms-footer-copy">&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
    </div>
</section>
