<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  	$imgFunc = array(
			'image/jpeg' => array('create' => 'imagecreatefromjpeg', 'output' => 'imagejpeg','ext' => 'jpg' ),
			'image/jpg'  => array('create' => 'imagecreatefromjpeg', 'output' => 'imagejpeg','ext' => 'jpg' ),
			'image/png'  => array('create' => 'imagecreatefrompng',  'output' => 'imagepng', 'ext' => 'png' ),
			'image/gif'  => array('create' => 'imagecreatefromgif',  'output' => 'imagegif', 'ext' => 'gif' ),
			'image/bmp'  => array('create' => 'imagecreatefromwbmp', 'output' => 'imagewbmp', 'ext' => 'bmp' )
	);
  	$targ_w = $targ_h = 150;
	$path = 'server/php/files/';
	$thum = 'server/php/thumbnails/'.$_POST['filename'];
	$src = $path.$_POST['filename'];
	$imgData = getimagesize( $src );
	$new = md5($_POST['filename']).".".$imgFunc[$imgData['mime']]['ext'];
	if( file_exists( $path.$new ) ) {
		unlink($path.$new);
	}
	
	$img_r = $imgFunc[$imgData['mime']]['create']($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
	$imgFunc[$imgData['mime']]['output']($dst_r,$path.$new);
	echo $new;
} 