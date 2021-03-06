<?php

#dont forget to create constant

/*$myfile = fopen("text.txt", "w") or die("The file could not be open");
fwrite($myfile, "This is kasra gholami's first test");
fclose($myfile);*/


#I have to use jason to convert an array into a string inorder to write it in the File
file_put_contents("text.txt", "Haj ali\r\n", FILE_APPEND);


//////////////////////////////READ FILE

$myfile = fopen("text.txt", "r") or exit("The file could not be open");

#read all file with one step
//$allFile = fread($myfile, filesize("text.txt"));
//echo $allFile;

#read the file one line at time

while(!feof($myfile))
{
    echo fgets($myfile) . "<br>";
    
    #convert the string into an array
    #generate your table row
}
fclose($myfile);

echo "It workes";