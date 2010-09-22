<?php

/**
 * Mixins
 *
 * Allows you to use LESS-style syntax
 * 
 * @author Olivier Gorzalka <olivier@clearideaz.com>
 */
 
class Sass
{

	/**
	 * Stores the mixins for debugging purposes
	 *
	 * @var array
	 */
	private $sass;

	/**
	 * Parse the SASS Syntax in the CSS
	 *
	 * @return void
	 */
	public static function process()
	{
		require('sass/sass/SassParser.php');
		$options = array(
			'filename' => Less::$css->file,
			'debug_info' => false,
			'load_paths' => array(
				dirname(Less::$css->file),
				dirname(__FILE__).'/../../mixins/scss',
				dirname(__FILE__).'/../../mixins/sass'
			),
			'line_numbers'	 => false,
			'vendor_properties' => true,
			'property_syntax' => 'new',
			'line' => 1,
			'cache' => false,
			'syntax' => Less::get_file_extension(Less::$css->file),
			'style' => 'nested'
		);
		$sass = new SassParser($options);

		try {
		  Less::$css->string = $sass->toCss(Less::$css->string, false);
		} catch (exception $ex) {
		    Less::error('<b>Syntax Error</b> - '.$ex->getMessage());
		}
	}
}