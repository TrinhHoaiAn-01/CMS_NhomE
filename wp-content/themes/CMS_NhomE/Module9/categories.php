<?php
/** Module 9: category navigation beside a single post. */
$detail_categories = get_categories(
    array(
        'taxonomy'   => 'category',
        'hide_empty' => false,
        'orderby'    => 'name',
        'order'      => 'ASC',
    )
);

if ( is_wp_error( $detail_categories ) ) {
    $detail_categories = array();
}
?>
<aside class="fit-categories" aria-labelledby="fit-categories-title">
    <h2 id="fit-categories-title" class="fit-categories-title">Categories</h2>
    <div class="fit-categories-rule" aria-hidden="true"></div>
    <nav aria-label="Categories">
        <ul class="fit-categories-list">
            <?php foreach ( $detail_categories as $category ) : ?>
                <li>
                    <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</aside>
