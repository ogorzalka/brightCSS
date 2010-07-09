<?php

/**
 * Mixins
 *
 * Allows you to use LESS-style syntax
 * 
 * @author Olivier Gorzalka <olivier@clearideaz.com>
 */
class LessPHP
{

	/**
	 * Stores the mixins for debugging purposes
	 *
	 * @var array
	 */
	public static $lessc = array();

	/**
	 * Parse the LESS Syntax in the CSS
	 *
	 * @return void
	 */
	public static function process()
	{
		require('lessphp/lessc.inc.php');
		$lessc = new lessc();
		try {
		    Less::$css->string = $lessc->parse(Less::$css->string);
		} catch (exception $ex) {
		    Less::error('<b>Syntax Error</b> - '.$ex->getMessage());
		}
	}
}