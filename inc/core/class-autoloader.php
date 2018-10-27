<?php
/**
 * Class file for Autoloader.
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Inc\Core;

/**
 * Class Autoloader
 *
 * @package Modern_Basic
 */
class Autoloader {

	/**
	 * Map of Classname to relative filepath sans extension.
	 *
	 * @note    We omitted the leading slash and the .php extension from each
	 *       relative filepath because they are redundant and to include
	 *       them would take up unnecessary bytes of memory at runtime.
	 *
	 * @example Format (note no leading / and no .php extension for file_path, and no vendor name and class name in namespace):
	 *
	 *  [
	 *    'Enqueue_Scripts' =>
	 *      [
	 *        'file_path' => 'inc/core/class-enqueue-scripts',
	 *        'namespace' => 'Inc\Core',
	 *      ]
	 *  ];
	 */
	const CLASSMAP
		= [
			'Enqueue_Scripts'        => [
				'file_path'  => 'inc/core/class-enqueue-scripts',
				'namespace'  => 'Inc\Core',
				'initialize' => true,
			],
			'Template_Meta'          => [
				'file_path'  => 'inc/template/class-template-meta',
				'namespace'  => 'Inc\Template',
				'initialize' => true,
			],
			'Template_Helper'        => [
				'file_path' => 'inc/template/class-template-helper',
				'namespace' => 'Inc\Template',
			],
			'Template_Header_Helper' => [
				'file_path' => 'inc/template/class-template-header-helper',
				'namespace' => 'Inc\Template',
			],
			'Template_Footer_Helper' => [
				'file_path' => 'inc/template/class-template-footer-helper',
				'namespace' => 'Inc\Template',
			],
			'Content_Loop'           => [
				'file_path' => 'inc/template-parts/class-content-loop',
				'namespace' => 'inc\Template_Parts',
			],
		];

	/**
	 * Class autoloader.
	 */
	public static function autoload(): void {
		if ( empty( self::CLASSMAP ) ) {
			return;
		}

		foreach ( self::CLASSMAP as $name => $path ) {
			require_once get_theme_file_path( $path['file_path'] . '.php' );

			if ( array_key_exists( 'initialize', $path ) && $path['initialize'] ) {
				$class = 'Modern_basic\\' . $path['namespace'] . "\\${name}";
				new $class();
			}
		}
	}

	/**
	 * Load Composer autoloader
	 */
	public static function load_autoloader(): void {
		if ( file_exists( get_parent_theme_file_path( 'vendor/autoload.php' ) ) ) {
			require_once get_parent_theme_file_path( 'vendor/autoload.php' );
		}
	}
}
