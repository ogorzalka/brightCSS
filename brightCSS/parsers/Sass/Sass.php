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
			'filename'			 => array(
				'dirname' => str_replace(basename(Less::$css->file),'',Less::$css->file),
				'basename' => basename(Less::$css->file)
			),
			'debug_info'		 => false,
			'line_numbers'	 => false,
			'line'					 => 1,
			'cache' => false,
			'syntax' => 'scss',
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