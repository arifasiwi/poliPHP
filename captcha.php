<?php
	$acak	= substr(str_shuffle("1234567890qwertyuiopasdfghjklzxcvbnm"),0,7);
	session_start();
	$_SESSION['captcha'] = $acak;

	$gbr	= imagecreate(100,30);
	$bg 	= imagecolorallocate($gbr,0,0,0);
	$color	= imagecolorallocate($gbr,255,255,255);

	imagestring($gbr,10, 30, 5, $acak, $color);

	imagepng($gbr);
	imagecolordeallocate($color);
	imagecolordeallocate($bg);

	imagedestroy($gbr);
?>