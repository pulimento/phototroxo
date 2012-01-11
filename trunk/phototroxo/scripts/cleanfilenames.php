<?php

//Obtenido desde http://protech.ws4.org/php/clean-file-name-php-regular-expression

function cleanFileName($str) {
	$cleaner = array();
	$cleaner[] = array('expression' => "/[à&#225;äãâª]/", 'replace' => "a");
	$cleaner[] = array('expression' => "/[è&#233;êë]/", 'replace' => "e");
	$cleaner[] = array('expression' => "/[ì&#237;îï]/", 'replace' => "i");
	$cleaner[] = array('expression' => "/[ò&#243;õôö]/", 'replace' => "o");
	$cleaner[] = array('expression' => "/[ù&#250;ûü]/", 'replace' => "u");
	$cleaner[] = array('expression' => "/[ñ]/", 'replace' => "n");
	$cleaner[] = array('expression' => "/[ç]/", 'replace' => "c");
	$str = strtolower($str);
	$ext_point = strripos($str, ".");
	// Changed to strripos to avoid issues with ‘.’ Thanks nico.
	if ($ext_point === false)
		return false;
	$ext = substr($str, $ext_point, strlen($str));
	$str = substr($str, 0, $ext_point);
	foreach ($cleaner as $cv)
		$str = preg_replace($cv["expression"], $cv["replace"], $str);
	return preg_replace("/[^a-z0-9-]/", "_", $str) . $ext;
}
?>