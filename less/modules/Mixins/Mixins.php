<?php

/**
 * Mixins
 *
 * Allows you to use SASS-style mixins, essentially assigning classes
 * to selectors from within your css. You can also pass arguments through
 * to the mixin.
 * 
 * @author Anthony Short
 */
class Mixins
{

	/**
	 * Stores the mixins for debugging purposes
	 *
	 * @var array
	 */
	public static $mixins = array();
	
	/**
	 * Imports all of the mixins in the mixins folder automatically. All comments
	 * are stripped from these included mixins.
	 *
	 * @return void
	 */
	public static function import_process()
	{
		$folder = Less::$config['Mixins']['auto_include'];

		if($folder === false) 
			return;

		foreach(Less::list_files($folder,true) as $file)
		{
			if(is_dir($file))
				continue;
				
			Less::$css->string = file_get_contents($file).Less::$css->string;
		}
	}

}