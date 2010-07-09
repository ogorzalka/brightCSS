<?php

/**
 * Adds the image-width property that allows you to automatically
 * obtain the height of a image
 *
 * Because functions can't have - in their name, it is replaced
 * with an underscore. The property name is still image-height
 *
 * @author Kirk Bentley
 * @param $url
 * @return string
 */
function bCSS_image_height($url,$h = false)
{
	$url = preg_replace('/\s+/','',$url);
	$url = preg_replace('/url\\([\'\"]?|[\'\"]?\)$/', '', $url);

	$h = trim($h);

	$path = Scaffold::find_file($url);
	
	if($path === false)
		return false;
																		
	// Get the width of the image file
	$size = GetImageSize($path);
	$height = $size[1];
	
	if($h == '50%'){
		$height = $height*0.5;
	}

	// Make sure theres a value so it doesn't break the css
	if(!$height)
	{
		$height = 0;
	}
	
	return $height;
}