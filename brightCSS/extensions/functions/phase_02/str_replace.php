<?php

/**
 * Replace all occurrences of the search string with the replacement string
 *
 * @param $search
 * @param $replace
 * @param $subject
 * @return string
 */

function bCSS_str_replace($search,$replace,$subject)
{
  $search = explode('|',$search);
  $replace = explode('|',$replace);
  return str_replace($search,$replace,$subject);
}