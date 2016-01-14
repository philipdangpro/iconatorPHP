<?php
//Disclaimer : this generator needs php_gd2 to be activated.
//BTW, the following code will be pretty commented as I am learning the GD library
//the code is not optimized in order to be more readable by GD noobs

//0. test if randomify.php does exist
	if (file_exists("../../11_randomify/randomify/randomify.php")){
		include("../../11_randomify/randomify/randomify.php");
	} else {
		echo "This generator needs randomify.php to work.";
	}

//build 3 random columns with booleans in it, they will be used as patterns for the icon
	function buildBoolList($length){
		$boolList = [];
		for ($i = 0; $i < $length ; $i++) { 
			array_push($boolList, rndBool());
		}
		return $boolList;
	}

	$col1 = buildBoolList(5);
	$col2 = buildBoolList(5);
	$col3 = buildBoolList(5);

// 1. header says to the web browser, this is going to be a picture, the format is jpg, jpeg, gif, png.
//Caution. the header function must be called at the beginning of the code

	header ("Content-type: image/png");
//imagecreate creates an image with width x and height y. $image is an image variable
	$image = imagecreate(175,175);	

//declare colors that are going to used
	$white = imagecolorallocate($image, 255, 255, 255);	
	$randColor = imagecolorallocate($image, mt_rand(20,240), mt_rand(20,240), mt_rand(20,240));

//fill the image with colored rectangles
foreach ($col1 as $k => $v) {
	if($v){
		imagefilledrectangle ($image, 35*0, $k*35, 35*0+35, $k*35+35, $randColor);
		imagefilledrectangle ($image, 35*4, $k*35, 35*4+35, $k*35+35, $randColor);
	}
}

foreach ($col2 as $k => $v) {
	if($v){
		imagefilledrectangle ($image, 35*1, $k*35, 35*1+35, $k*35+35, $randColor);
		imagefilledrectangle ($image, 35*3, $k*35, 35*3+35, $k*35+35, $randColor);
	}
}

foreach ($col3 as $k => $v) {
	if($v){
		imagefilledrectangle ($image, 35*2, $k*35, 35*2+35, $k*35+35, $randColor);
	}
}

//display the image
	imagepng($image);
?>