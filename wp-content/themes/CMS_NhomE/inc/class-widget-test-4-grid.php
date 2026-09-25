<?php
/** Eight selected WordPress posts in a two-row image grid. */

class CMS_NhomE_Widget_Test_4_Grid extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'widget_test_4_grid',
			'widget_test_4_grid',
			array( 'description' => 'Lưới tám bài viết có ảnh phía trên footer.' )
		);
	}

	public function widget( $args, $instance ) {
		$posts = get_posts(
			array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'posts_per_page'      => 8,
				'meta_key'            => '_widget_test_4_grid_order',
				'orderby'             => 'meta_value_num',
				'order'               => 'ASC',
				'ignore_sticky_posts' => true,
			)
		);

		if ( ! $posts ) {
			return;
		}

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
		<section class="widget-test-4-grid" aria-label="Bài viết nổi bật">
			<?php foreach ( array_chunk( $posts, 4 ) as $row ) : ?>
				<div class="widget-test-4-grid__row">
					<?php foreach ( $row as $post ) : ?>
						<article class="widget-test-4-grid__card">
							<a class="widget-test-4-grid__image-link" href="<?php echo esc_url( get_permalink( $post ) ); ?>" aria-label="<?php echo esc_attr( get_the_title( $post ) ); ?>">
								<?php echo get_the_post_thumbnail( $post, 'full', array( 'class' => 'widget-test-4-grid__image', 'loading' => 'lazy' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</a>
							<h3 class="widget-test-4-grid__title"><a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a></h3>
						</article>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</section>
		<?php
		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	public function form( $instance ) {
		echo '<p>Hiển thị tối đa 8 bài viết đã xuất bản được đánh dấu cho lưới này.</p>';
	}
}
