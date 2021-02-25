<?php

#declere constant
define("FOLDER_PHP_FUNCTIONS", 'PHP/');
define("FILE_PHP_FUNCTION", FOLDER_PHP_FUNCTIONS . "function.php");

#import the php commin function file
require_once (FILE_PHP_FUNCTION);


//put your code here to create website

createPageHeder("Home Page");
echo 'Welcom to my website';





$companies = array("Microsoft", "Apple", "RedHat", "Kasra", "Dragon", "Resiliance");

createList($companies);
createForm();
TitlePath();
colorText();
createPageFooter();


?>