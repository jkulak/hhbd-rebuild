<?php

function create_urlname($oldname, $cut40, $lower) {
	$toreplace = array(' ', '?', ':', '*', '|', '/', '\\', '"', '<', '>', '&', '!', '-', '+', '%', '^', '(', ')', '#', ';', '~', '`', '[', ']', '{', '}', ',', '=') ;
	$name = str_replace($toreplace, '_', $oldname);

var_dump($oldname);

	// ZMIANA POLSKICH LITEREK!
	$toreplace = array('@', '$', '�?', '�?', '�?', '�?', '�?', 'ó', '�?', 'ż', 'ź', '�?', 'Ł', 'Ż', 'Ń', 'Ę', '�?', '�?', '�?', 'Ź');
	$replaceto = array('a', 's', 'a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z', 'S', 'L', 'Z', 'N', 'E', 'C', 'A', 'O', 'Z');  
	$name = str_replace($toreplace, $replaceto, $name);
	
	$name = str_replace('___', '_', $name);
	$name = str_replace('__', '_', $name);
	
	$name = str_replace(array('\'', '.'), '', $name);
	
	while ($name[strlen($name) - 1] == '_') {$name = substr($name, 0, strlen($name) - 1);
		}
	
	if ($name == '') $name = '_';
	
	if ($cut40) {
		$name = substr($name, 0, 40);
		}
		
	if ($lower) {
		$name = strtolower($name);
		}
		
	return $name;
	}
	
	
	
	
	
	
function createthumbnail($dstfilename, $srcfilename, $frmcolor, $width, $height ){
// ****************************************************************************
// *** USTAWIENIE HEIGHT NA 0 POWODUJE PROPORCJONALNE DOPASOWANIE WYSOKOSCI ***
// ****************************************************************************

	//pobieram rozmiary originalnego
	list($width_orig, $height_orig) = getimagesize($srcfilename);

	if (!$height) $height = (int) (($width / $width_orig) * $height_orig);

	//tworze docelowy jpg
	$image_p = imagecreatetruecolor($width, $height);

	$image = imagecreatefromjpeg($srcfilename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
	imagejpeg($image_p, $dstfilename);
	}	
	
?>