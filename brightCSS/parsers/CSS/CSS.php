<?php

/**
 * Mixins
 *
 * Allows you to use LESS-style syntax
 * 
 * @author Olivier Gorzalka <olivier@clearideaz.com>
 */
 
class CSS
{

	/**
	 * Stores the mixins for debugging purposes
	 *
	 * @var array
	 */

	/**
	 * Parse the SASS Syntax in the CSS
	 *
	 * @return void
	 */
	public static function process()
	{
		try {
		  Less::$css->string = Less::$css->string;

		} catch (exception $ex) {
		    Less::error('<b>Syntax Error</b> - '.$ex->getMessage());
		}
	}
}