<?Php

session_start();
header ("Content-type: image/png");


if(isset($_SESSION['my_captcha']))
{
unset($_SESSION['my_captcha']); // destroy the session if already there
}
//////Part 1 Random string generation ////////
$string0="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$string1="abcdefghijklmnopqrstuvwxyz";
$string2="1234567890";
$string=$string0.$string1.$string2;
$string= str_shuffle($string);
$random_text= substr($string,0,8); // change the number to change number of chars
/////End of Part 1 ///////////

$_SESSION['my_captcha'] =$random_text; // Assign the random text to session variable


///// Create the image ////////
$im = @ImageCreate (120, 50) // Width and hieght of the image. 
or die ("Cannot Initialize new GD image stream");
$background_color = ImageColorAllocate ($im,232, 232, 232); // Assign background color
$text_color = ImageColorAllocate ($im, 33, 130, 18);      // text color is given
ImageString($im,11,20,15,$_SESSION['my_captcha'],$text_color); // Random string  from session added 
///im is the image source, Int 5 is the font size,Int 8 is the X position , Int 2 is the Y position //
ImagePng ($im); // image displayed
imagedestroy($im); // Memory allocation for the image is removed. 
?>
