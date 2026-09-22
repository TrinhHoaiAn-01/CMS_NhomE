<?php
/** Module 3: footer with recent comments, categories, and posts. */

// Allow this module to be opened directly for testing.
if ( ! function_exists( 'get_header' ) ) {
    $wp_load_path = dirname( __DIR__, 4 ) . '/wp-load.php';
    if ( file_exists( $wp_load_path ) ) {
        require_once $wp_load_path;
    }
}

$is_standalone = ! did_action( 'get_header' );
if ( $is_standalone ) {
    get_header();
}

$recent_comments = get_comments(
    array(
        'number'      => 5,
        'status'      => 'approve',
        'post_status' => 'publish',
    )
);
$categories = get_categories(
    array(
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => false,
        'number'     => 5,
    )
);
$recent_posts = wp_get_recent_posts(
    array(
        'numberposts' => 5,
        'post_status' => 'publish',
    )
);

if ( is_wp_error( $categories ) ) {
    $categories = array();
}
if ( is_wp_error( $recent_posts ) ) {
    $recent_posts = array();
}
?>
<section id="footer" class="cms-footer" aria-label="Chân trang">
    <div class="container">
        <div class="row text-center text-sm-left">
            <div class="col-12 col-sm-4 mb-3">
                <h5>Bình luận mới</h5>
                <ul class="list-unstyled quick-links">
                    <?php if ( $recent_comments ) : ?>
                        <?php foreach ( $recent_comments as $comment ) : ?>
                            <?php
                            $author       = get_comment_author( $comment );
                            $comment_text = wp_strip_all_tags( $comment->comment_content );
                            $preview      = wp_trim_words( $comment_text, 7, '...' );
                            ?>
                            <li>
                                <a href="<?php echo esc_url( get_comment_link( $comment ) ); ?>" title="<?php echo esc_attr( $author . ': ' . $comment_text ); ?>">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo esc_html( $author . ': ' . $preview ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="footer-empty">Chưa có bình luận nào</li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-12 col-sm-4 mb-3">
                <h5>Chuyên mục</h5>
                <ul class="list-unstyled quick-links">
                    <?php if ( $categories ) : ?>
                        <?php foreach ( $categories as $category ) : ?>
                            <li>
                                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" title="<?php echo esc_attr( $category->name ); ?>">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo esc_html( $category->name ); ?> (<?php echo esc_html( $category->count ); ?>)
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="footer-empty">Chưa có chuyên mục</li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-12 col-sm-4 mb-3">
                <h5>Bài viết mới</h5>
                <ul class="list-unstyled quick-links">
                    <?php if ( $recent_posts ) : ?>
                        <?php foreach ( $recent_posts as $post_item ) : ?>
                            <?php $post_title = $post_item['post_title']; ?>
                            <li>
                                <a href="<?php echo esc_url( get_permalink( $post_item['ID'] ) ); ?>" title="<?php echo esc_attr( $post_title ); ?>">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo esc_html( wp_trim_words( $post_title, 7, '...' ) ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="footer-empty">Chưa có bài viết nào</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <nav aria-label="Mạng xã hội">
                    <ul class="list-unstyled social">
                        <li><a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="https://plus.google.com" target="_blank" rel="noopener noreferrer" aria-label="Google Plus"><i class="fa-brands fa-google-plus-g" aria-hidden="true"></i></a></li>
                        <li><a href="mailto:contact@fit.tdc.edu.vn" aria-label="Email"><i class="fa-solid fa-envelope" aria-hidden="true"></i></a></li>
                    </ul>
                </nav>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 footer-bottom-text">
                <p><u><a href="#">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
                <p>&copy; All right Reversed. <a href="https://sunlimetech.com" target="_blank">Sunlimetech</a></p>
            </div>
        </div>
    </div>
</section>

<?php
if ( $is_standalone ) {
    wp_footer();
    echo '</body></html>';
}
?>
