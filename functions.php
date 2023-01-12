<?php 

add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' ); 

function my_enqueue_assets() { 

    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 

} 

function my_custom_mime_types( $mimes ) {
	
	// New allowed mime types.
	$mimes['ttf']  = 'font/ttf';
	$mimes['woff'] = 'font/woff';
	$mimes['woff2']  = 'font/woff2'; 

	return $mimes;
}

add_filter( 'upload_mimes', 'my_custom_mime_types' );

function learntech_vacancies() {
	ob_start();
	get_template_part('template-parts/vacancies');
	$variable = ob_get_clean();
	return $variable;
}

add_shortcode( 'learntech-vacancies', 'learntech_vacancies' );

function start_dates() {
	ob_start();
	get_template_part('template-parts/startDates');
	$variable = ob_get_clean();
	return $variable;
}

add_shortcode( 'start-dates', 'start_dates' );

function learntech_vacancies_script() {
	
	if(is_page('vacancies')) {
		wp_enqueue_style( 'cs-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', all );
	}
}

add_action('wp_enqueue_scripts', 'learntech_vacancies_script');
