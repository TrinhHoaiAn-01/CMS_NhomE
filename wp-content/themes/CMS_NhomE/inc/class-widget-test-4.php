<?php
/** A small list of links stored in the site's MySQL database. */

class CMS_NhomE_Widget_Test_4 extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'widget_test_4',
			'widget_test_4',
			array( 'description' => 'Danh sách liên kết tin tức phía trên footer.' )
		);
	}

	public function widget( $args, $instance ) {
		global $wpdb;

		$table = $wpdb->prefix . 'widget_test_4_items';
		$items = $wpdb->get_results(
			"SELECT title, description, url FROM {$table} WHERE is_active = 1 ORDER BY sort_order ASC, id ASC LIMIT 5"
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
						<a class="widget-test-4__link" href="<?php echo esc_url( $item->url ); ?>">
							<span class="widget-test-4__text">
								<span class="widget-test-4__title"><?php echo esc_html( $item->title ); ?></span>
								<span class="widget-test-4__description"><?php echo esc_html( $item->description ); ?></span>
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
		echo '<p>Nội dung được quản lý trong bảng MySQL <code>' . esc_html( $GLOBALS['wpdb']->prefix . 'widget_test_4_items' ) . '</code>.</p>';
	}
}
