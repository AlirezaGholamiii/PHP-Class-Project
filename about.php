<?php

#declere constant
define("FOLDER_PHP_FUNCTIONS", 'PHP/');
define("FILE_PHP_FUNCTION", FOLDER_PHP_FUNCTIONS . "function.php");

#Define some picture for advertising
define("FOLDER_IMAGES_AD_FUNCTION", 'images/');
define("FILE_CoCa_FUNCTION", FOLDER_IMAGES_AD_FUNCTION ."coca.jpg");
define("FILE_pepsi_FUNCTION", FOLDER_IMAGES_AD_FUNCTION ."pepsi.jpg");
define("FILE_redbull_FUNCTION", FOLDER_IMAGES_AD_FUNCTION ."redbull.jpg");

#Randomize the picture to show
$Advertising = array(FILE_CoCa_FUNCTION, FILE_pepsi_FUNCTION, FILE_redbull_FUNCTION);

$randomImage = $Advertising[array_rand($Advertising)]; // See comments

#import the php commin function file
require_once (FILE_PHP_FUNCTION);


//put your code here to create website

createPageHeder("About Us");
?>
<!-- showing advertising -->
<br> <br> 
<h3> This is my Advertising part </h3>
<img class="Ad" src="<?php echo $randomImage; ?>" alt="Ad"/>

<?php


?>
