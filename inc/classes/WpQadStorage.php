<?php

class WpQadStorage {
	
	function __construct() {
		
	
		
	}
	
	/**
	 * Возвращает список языков, поддерживаемые демо контентом
	 *
	 * @return array|bool
	 */
	function get_lang() {
		$dirs  = $this->get_structure();
		$langs = [];
		
		if ( $dirs ) {
			
			foreach ( $dirs as $lang => $dir_content ) {
				if ( ! is_numeric( $lang ) ) {
					
					$lang_file_path = WP_QAD_DIR_DEMO . $lang . '/lang.json';
					$package_url = file_exists( $lang_file_path ) ? WP_QAD_URL_DEMO . $lang . '/lang.json' : false;
					
					if ( $package_url ) {
						$langs[] = [
							'url'   => $package_url,
							'valid' => true
						];
					} else {
						$langs[] = [
							'url'   => $package_url,
							'valid' => false
						];
					}
					
				}
			}
			
		}
		
		return $langs;
	}
	
	function get_lang_json(){
		$data = new stdClass();
		$data->langs = $this->get_lang();
		$data = wp_json_encode( $data );
		return $data;
	}
	
	/**
	 * Возвращает структуру папки с демо контентом
	 *
	 * @return array|bool|null
	 */
	function get_structure() {
		static $cache = null;
		
		if ( ! $cache ) {
			$cache = $this->dir_to_array();
		}
		
		return $cache;
	}
	
	/**
	 * Сканирует директорию демо контента на наличие папок и файлов
	 *
	 * @param null $dir
	 *
	 * @return array|bool массив папок и файлов | false - ничего нет
	 */
	function dir_to_array( $dir = null ) {
		
		$dir    = ( $dir ) ? $dir : WP_QAD_DIR_DEMO;
		$result = array();
		$cdir   = scandir( $dir );
		
		foreach ( $cdir as $key => $value ) {
			if ( ! in_array( $value, array( ".", ".." ) ) ) {
				if ( is_dir( $dir . DIRECTORY_SEPARATOR . $value ) ) {
					$result[ $value ] = $this->dir_to_array( $dir . DIRECTORY_SEPARATOR . $value );
				} else {
					$result[] = $value;
				}
			}
		}
		
		return $result ? $result : false;
	}
	
	function get_taxonomies() {
		$dir        = $this->get_structure();
		$taxonomies = [];
		
		foreach ( $dir as $tax => $dir_content ) {
			if ( ! is_numeric( $tax ) ) {
				$taxonomies[] = $tax;
			}
		}
		
		return $taxonomies;
	}
	
	
}