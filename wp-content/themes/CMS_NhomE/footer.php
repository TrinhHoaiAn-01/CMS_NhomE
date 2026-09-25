<?php
if ( is_front_page() || is_home() || is_archive() || is_search() || is_singular( 'post' ) ) {
	the_widget(
		'CMS_NhomE_Widget_Test_4',
		array(),
		array(
			'before_widget' => '<div class="widget-test-4-host">',
			'after_widget'  => '</div>',
		)
	);
	the_widget(
		'CMS_NhomE_Widget_Test_4_Grid',
		array(),
		array(
			'before_widget' => '<div class="widget-test-4-grid-host">',
			'after_widget'  => '</div>',
		)
	);
}
get_template_part( 'Module3/footer' );
?>
<?php wp_footer(); ?>
</body>
</html>
