<?php

/**
 * Creates a hex2rgba() colour function
 * Converts hex to rgba
 * Based on code from http://github.com/masseuro
 * as suggested http://github.com/anthonyshort/csscaffold/issuesearch?state=open&q=hex#issue/114
 *
 *
 * @author Kirk Bentley
 * @param $hex
 * @param $alpha
 * @return string
 */

function bCSS_hex2rgba($hex, $alpha = 1)
{
	$hex = str_replace('#', '', $hex);
	$r = $g = $b = 0;

	switch(strlen($hex)){
		case 3:
			list($r, $g, $b) = str_split($hex);
			$r = hexdec($r.$r);
			$g = hexdec($g.$g);
			$b = hexdec($b.$b);
			break;
		case 6:
			list($r1, $r2, $g1, $g2, $b1, $b2) = str_split($hex);
			$r = hexdec($r1.$r2);
			$g = hexdec($g1.$g2);
			$b = hexdec($b1.$b2);
			break;
		default:
			break;
	}

	return 'rgba('.$r.', '.$g.', '.$b.', '.$alpha.')';
}