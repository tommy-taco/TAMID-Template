<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent=" From: $name \n Message: $message";
$recipient = "jordanbana@gmail.com";
$subject = "TAMID Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");


/* echo "Thank You!" . " -" . "<a href='YOURWEBSITE.COM' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
--- AJ's version sends users to a new blank white page with a thank you message and a link to go back to the home */


/*header("Location: http://www.usctamid.com/"); */
/* --- Jordan's version just redirects to the link above, but doesnt have a thank you message
php doesnt let you echo then redirect: http://stackoverflow.com/questions/17157685/php-redirect-to-another-page-after-form-submit*/




/*This is a CSV file that will save all of the emails we ever get*/


    $filename = "tamid_***.csv";
    $exists = (file_exists($filename));
$handle = fopen($filename, 'a');
$msg = "TAMID at *** Information\n" .
"\nYour Name is: " . $name . 
"\nYour Email is: " . $email . 
"\nYour Message is: " . $message;

$stringToAdd=""; 

if (!$exists){
foreach($_POST as $name => $value) {
$stringToAdd.="$name,";
}
$stringToAdd.="\n";
$new=False;
fwrite($handle, $stringToAdd);
}
$stringToAdd="";

foreach($_POST as $name => $value) {
$msg .="$name : $value\n";
$stringToAdd.="$value,";
}
$stringToAdd.="\n";

fwrite($handle, $stringToAdd);
fclose($handle);


?>
