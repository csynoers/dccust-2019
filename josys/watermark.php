<?php

$image_path = "../../../images/watermark.png";

function watermark_image($oldimage_name, $new_image_name)
{
	global $image_path;
	list($owidth,$oheight) = getimagesize($oldimage_name);
	$width = $owidth; //ukuran gambar setelah watermark
	$height = $oheight; //ukuran gambar setelah watermark
	$im = imagecreatetruecolor($width, $height);
	$img_src = imagecreatefromjpeg($oldimage_name);
	unlink($oldimage_name); //delete image lama sebelum membuat image baru dengan nama yang sama
	imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
	$watermark = imagecreatefrompng($image_path);
	list($w_width, $w_height) = getimagesize($image_path); 
	$pos_x = $width - $w_width; 
	$pos_y = $height - $w_height;
	//$pos_x-10 supaya gambar watermark ke atas sepuluh pixel
	imagecopy($im, $watermark, $pos_x-15, $pos_y-15, 0, 0, $w_width, $w_height);
	imagejpeg($im, $new_image_name, 100);
	imagedestroy($im);
	//unlink($oldimage_name);
	return true;
}

//watermark_image('1.jpg', '1.jpg');
//watermark_text('1.jpg', '1.jpg');
?>