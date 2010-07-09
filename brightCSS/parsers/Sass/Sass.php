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
		require('sass/SassParser.php');
		
		$options = array(
		  'file' => Less::$css->file,
		  'cache' => false,
		  'style' => 'expanded',
		  'property_syntax' => 'new',
		  'always_update' => true
		);
		
		$sass = new SassParser($options);

		try {
		  //$sass->toCss(Less::$css->string,false);
		  Less::$css->string = $sass->toCss(Less::$css->string,false);

		} catch (exception $ex) {
		    Less::error('<b>Syntax Error</b> - '.$ex->getMessage());
		}
	}
}