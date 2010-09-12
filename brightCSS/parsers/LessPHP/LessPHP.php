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
			$options = array('importDir' => bCSS_Utils::fix_path(dirname(Less::$css->file)));
		    Less::$css->string = $lessc->parse(Less::$css->string, $options);
		} catch (exception $ex) {
		    Less::error('<b>Syntax Error</b> - '.$ex->getMessage());
		}
	}
}