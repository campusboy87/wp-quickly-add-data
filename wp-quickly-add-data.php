<?php
/*
Plugin Name: WP Quickly Add Data
Plugin URI: https://wp-plus.ru/
Description: Легкое добавление демо-данных на свой Wordpress сайт
Version: 0.1
Author: Campusboy
*/

define( 'WP_QAD_DIR', plugin_dir_path( __FILE__ ) );
define( 'WP_QAD_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_QAD_DIR_DEMO', WP_QAD_DIR . 'demo-content/' );
define( 'WP_QAD_URL_DEMO', plugin_dir_url( __FILE__ ) . 'demo-content/' );
define( 'WP_QAD_LANG', get_bloginfo( 'language' ) );

/**
 * Автоподключение классов проекта
 *
 * @param $class
 */
function wp_qad_spl_autoload_register( $class ) {
	
	$file_path = WP_QAD_DIR . 'inc/classes/' . $class . '.php';
	$file_path = str_replace( '\\', DIRECTORY_SEPARATOR, $file_path );
	
	include_once( $file_path );
}

spl_autoload_register( 'wp_qad_spl_autoload_register' );


/**
 * Регистрация меню QAD
 */
function register_wp_qad_main_page() {
	$page = add_menu_page(
		'Быстрая генерация данных',
		'WP QAD',
		'manage_options',
		'wp-qad',
		'render_wp_qad_main_page',
		'dashicons-networking',
		2
	);
	
	// Вызываем CSS и JS только на странице с плагином
	add_action( 'admin_print_scripts-' . $page, 'wp_qad_admin_scripts_and_styles' );
}

add_action( 'admin_menu', 'register_wp_qad_main_page' );

/**
 * Подключение JS и CSS плагина
 */
function wp_qad_admin_scripts_and_styles() {
	wp_enqueue_style( 'wp-qad', plugins_url( 'assets/css/wp-qad.css', __FILE__ ) );
	
	wp_enqueue_script( 'handlebars', plugins_url( 'assets/js/handlebars.js', __FILE__ ) );
	wp_enqueue_script( 'wp-qad', plugins_url( 'assets/js/wp-qad.js', __FILE__ ) );
}

/**
 * Подключение шаблона главной страницы
 */
function render_wp_qad_main_page() {
	require_once( WP_QAD_DIR . 'admin-page.php' );
}