<?php
/** Attach the supplied theme image files to the eight seeded WordPress posts. */

if ( 'cli' !== PHP_SAPI ) {
	http_response_code( 404 );
	exit;
}

require dirname( __DIR__, 4 ) . '/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$posts = get_posts(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 8,
		'meta_key'       => '_widget_test_4_grid_order',
		'orderby'        => 'meta_value_num',
		'order'          => 'ASC',
	)
);

foreach ( $posts as $post ) {
	if ( has_post_thumbnail( $post ) ) {
		continue;
	}

	$order  = (int) get_post_meta( $post->ID, '_widget_test_4_grid_order', true );
	$source = dirname( __DIR__ ) . '/assets/images/widget-test-4-grid/image_' . $order . '.png';
	if ( $order < 1 || $order > 8 || ! is_file( $source ) ) {
		fwrite( STDERR, "Missing source image for post {$post->ID}.\n" );
		exit( 1 );
	}

	$upload = wp_upload_bits( 'widget-test-4-grid-' . $order . '.png', null, file_get_contents( $source ), '2026/09/24' );
	if ( $upload['error'] ) {
		fwrite( STDERR, $upload['error'] . "\n" );
		exit( 1 );
	}

	$attachment_id = wp_insert_attachment(
		array(
			'post_mime_type' => 'image/png',
			'post_title'     => get_the_title( $post ),
			'post_status'    => 'inherit',
			'post_parent'    => $post->ID,
		),
		$upload['file'],
		$post->ID,
		true
	);
	if ( is_wp_error( $attachment_id ) ) {
		fwrite( STDERR, $attachment_id->get_error_message() . "\n" );
		exit( 1 );
	}

	wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $upload['file'] ) );
	update_post_meta( $attachment_id, '_wp_attachment_image_alt', get_the_title( $post ) );
	set_post_thumbnail( $post, $attachment_id );
	echo $post->ID . ': image_' . $order . ".png\n";
}
