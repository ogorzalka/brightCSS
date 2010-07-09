<?php

/**
 * Adds the image-width property that allows you to automatically
 * obtain the width of a image
 *
 * Because functions can't have - in their name, it is replaced
 * with an underscore. The property name is still image-width
 *
 * @author Kirk Bentley
 * @param $url
 * @return string
 */
function bCSS_image_width($url, $w = false)
{
	$url = preg_replace('/\s+/','',$url);
	$url = preg_replace('/url\\([\'\"]?|[\'\"]?\)$/', '', $url);

	$path = Scaffold::find_file($url);
	
	if($path === false)
		return false;
																		
	// Get the width of the image file
	$size = GetImageSize($path);
	$width = $size[0];
	
	if($w == '50%'){
		$width = $width*0.5;
	}

	// Make sure theres a value so it doesn't break the css
	if(!$width)
	{
		$width = 0;
	}
	
	return $width;
}