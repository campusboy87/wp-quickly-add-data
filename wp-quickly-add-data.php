<?php
/*
Plugin Name: WP Quickly Add Data
Plugin URI: https://wp-plus.ru/
Description: Легкое добавление демо-данных на свой Wordpress сайт
Version: 0.1
Author: Campusboy
*/

define( 'WP_QAD', plugin_dir_path( __FILE__ ) );

//d(get_bloginfo('language'));

add_action( 'admin_menu', 'register_wp_qad_main_page' );
function register_wp_qad_main_page() {
	add_menu_page(
		'Быстрая генерация данных',
		'WP QAD',
		'manage_options',
		'wp-qad',
		'render_wp_qad_main_page',
		'dashicons-networking',
		2
	);
}

function render_wp_qad_main_page() {
	echo "Код страницы.";
}