<?php
/** The five newest WordPress posts in the reference list layout. */

class CMS_NhomE_Widget_Test_4 extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'widget_test_4',
			'widget_test_4',
			array( 'description' => 'Năm bài viết mới nhất phía trên footer.' )
		);
	}

	public function widget( $args, $instance ) {
		$items = get_posts(
			array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'posts_per_page'      => 5,
				'orderby'            => 'date',
				'order'              => 'DESC',
				'ignore_sticky_posts' => true,
			)
		);

		if ( ! $items ) {
			return;
		}

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
		<section class="widget-test-4" aria-label="Liên kết tin tức">
			<ul class="widget-test-4__list">
				<?php foreach ( $items as $item ) : ?>
					<li class="widget-test-4__item">
						<a class="widget-test-4__link" href="<?php echo esc_url( get_permalink( $item ) ); ?>">
							<span class="widget-test-4__text">
								<span class="widget-test-4__title"><?php echo esc_html( get_the_title( $item ) ); ?></span>
								<span class="widget-test-4__description"><?php echo esc_html( wp_trim_words( get_the_excerpt( $item ), 25, '…' ) ); ?></span>
							</span>
							<span class="widget-test-4__chevron" aria-hidden="true"></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
		<?php
		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	public function form( $instance ) {
		echo '<p>Hiển thị 5 bài viết đã xuất bản mới nhất từ Bài viết của WordPress.</p>';
	}
}
