<?php
/** Seed the reference items as ordinary WordPress posts. Run with PHP CLI. */

if ( 'cli' !== PHP_SAPI ) {
	http_response_code( 404 );
	exit;
}

require dirname( __DIR__, 4 ) . '/wp-load.php';

$items = array(
	array( 'the-gioi', 'Tin Thế giới, thời sự quốc tế ...', 'Tin thế giới và thời sự quốc tế mới nhất, cập nhật các diễn biến đáng chú ý.' ),
	array( 'tin-tuc-24h', 'Tin tức 24h Mới nhất', 'Cập nhật tin tức 24/7: Thời sự, Giải trí, Thể thao tại Việt Nam và thế giới.' ),
	array( 'the-thao', 'Thể thao', 'Tin thể thao 24h mới nhất, kết quả thi đấu và lịch các sự kiện sắp tới.' ),
	array( 'thoi-su', 'Thời sự', 'Bản tin thời sự mới nhất trong ngày và những vấn đề được quan tâm.' ),
	array( 'phap-luat', 'Pháp luật', 'Tin tức pháp luật và an ninh, cập nhật các sự kiện đáng chú ý.' ),
);

$authors = get_users( array( 'role' => 'administrator', 'number' => 1, 'fields' => 'ID' ) );
if ( ! $authors ) {
	fwrite( STDERR, "No administrator account found.\n" );
	exit( 1 );
}

foreach ( $items as $index => $item ) {
	$existing = get_posts(
		array(
			'post_type'      => 'post',
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'meta_key'       => '_widget_test_4_seed_key',
			'meta_value'     => $item[0],
		)
	);

	if ( $existing ) {
		continue;
	}

	$timestamp = time() - $index * MINUTE_IN_SECONDS;
	$post_id   = wp_insert_post(
		array(
			'post_author'   => (int) $authors[0],
			'post_title'    => $item[1],
			'post_excerpt'  => $item[2],
			'post_content'  => '<p>' . esc_html( $item[2] ) . '</p>',
			'post_status'   => 'publish',
			'post_type'     => 'post',
			'post_name'     => $item[0],
			'post_date'     => wp_date( 'Y-m-d H:i:s', $timestamp ),
			'post_date_gmt' => gmdate( 'Y-m-d H:i:s', $timestamp ),
		),
		true
	);

	if ( is_wp_error( $post_id ) ) {
		fwrite( STDERR, $post_id->get_error_message() . "\n" );
		exit( 1 );
	}

	update_post_meta( $post_id, '_widget_test_4_seed_key', $item[0] );
	echo $post_id . ': ' . $item[1] . "\n";
}
