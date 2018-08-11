<?php

include("../connection/db.php");
////////////////////////////////////////////////////////////////////////////

$username = $_POST['username'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$query_usename = $con->query($sql);

if(!$query_usename->num_rows > 0)
{
	echo"INVALID USRNAME";
	exit();
}

$rowusername = mysqli_fetch_array($query_usename);

$toemail = $rowusername['email'];

$emailid = uniqid();

////////////////////////inser into the loss table

$query_insert_id = $con->query("INSERT INTO getpassword(username, id)VALUES('$username', '$emailid')");

if(!$query_insert_id){
	
	echo"could not generate id";
	exit();
}

$link = "https://olivereward.com/changepassword.php?id=$emailid&username=$username";

$to = $toemail;
$subject = 'change password';
$from = 'olivereward';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h4 style="color:#f40;">Please to change your password click on this link <a href='.$link.'>change password</h4>';
$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully. please follow the mail and change your password';
} else{
    echo 'Unable to send email. Please try again.';
}

?>