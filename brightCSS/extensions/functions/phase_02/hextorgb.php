<?php
/**
* Convert Hexadecimal Color to RGB color
* Example: _hex_to_rgb(#FFFFFF) => rgb(255,255,255)
*
* @param $hexa_color (hexadecimal format)
* @return $rgb string
*/
function bCSS_hextorgb($hex,$format='preformatted') {
	// Regexp for a valid hex digit
	$d = '[a-fA-F0-9]';
	// Make sure $hex is valid
	if (preg_match("/^#($d$d)($d$d)($d$d)\$/", $hex, $rgb)) {
	  $rgb_values = hexdec($rgb[1]).','.hexdec($rgb[2]).','.hexdec($rgb[3]);
	  if ($format != 'preformatted') {
		  return $rgb_values;
	  }
	  return 'rgb('.$rgb_values.')';
	}
	if (preg_match("/^($d)($d)($d)$/", $hex, $rgb)) {
	  $rgb_values = hexdec($rgb[1] . $rgb[1]).','.hexdec($rgb[2] . $rgb[2]).','.hexdec($rgb[3] . $rgb[3]);
		if ($format != 'preformatted') {
		  return $rgb_values;
	  }
	  return 'rgb('.$rgb_values.')';
	}
	return $hex;
}