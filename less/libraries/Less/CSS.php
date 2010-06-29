<?php

/**
 * CSS Utilities
 *
 * Has methods for interacting with the CSS string
 * and makes it very easy to find properties and values within the css
 * 
 * @package CSScaffold
 * @author Anthony Short
 */
class Less_CSS
{
	/**
	 * Server path to this CSS file
	 *
	 * @var string
	 */
	public $path;
	
	/**
	 * The name of this CSS file
	 *
	 * @var string
	 */
	public $file;
	
	/**
	 * The string of CSS code
	 *
	 * @var string
	 */
	public $string;
	
	/**
	 * Constructor
	 *
	 * @param $file
	 * @return void
	 */
	public function __construct($file)
	{
		$this->path = dirname($file);
		$this->file = $file;
		$this->string = file_get_contents($file);
	}
	
	/**
	 * Finds CSS 'functions'. These are things like url(), embed() etc.
	 *
	 * @author Anthony Short
	 * @param $name
	 * @param $capture_group
	 * @return array
	 */
	public function find_functions($name, $capture_group = "")
	{
		$regex =
		"/
			{$name}
			(
				\s*\(\s*
					( (?: (?1) | [^()]+ )* )
				\s*\)\s*
			)
		/sx";

		if(preg_match_all($regex, $this->string, $match))
		{
			return ($capture_group == "") ? $match : $match[$capture_group];
		}
		else
		{
			return array();
		}
	}

	
	/**
	 * Returns the CSS string when treated as a string
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->string;
	}


}