<?php

$url_error="login.php?error=1";
$url="login.php?error=0";
$email=$_POST["InputEmail"];
$passwd=$_POST["InputPassword"];

function do_redirect ( $url )
{
 Header ( "Location: $url" );
	 echo "<html><HEAD><TITLE>Redirect</TITLE></HEAD><BODY>" .
		 "Redirecting to ... <A HREF=\"" . $url . "\">here</A>.</BODY></HTML>.\n";
 exit;
}


function LoginUser($ll,$pp)
{
 $mysqli = new mysqli('localhost', 'root', '', 'site');
 mysqli_set_charset($mysqli, "utf8");
 $ll = mysqli_real_escape_string($mysqli,stripslashes($ll));
 $pp = mysqli_real_escape_string($mysqli,stripslashes($pp));
 if ($mysqli->connect_error) {die('Connect Error: ' . $mysqli->connect_error);}
 if ($stmt = $mysqli->prepare("SELECT email,password FROM susers WHERE email=? and password=?"))
 {
	 $stmt->bind_param("ss",$ll,$pp);
	 $stmt->execute();
	 $stmt->bind_result($email,$password);
	 $stmt->store_result();
	 if ( $stmt->num_rows() ){
		 $auth=1;
	 }else{
		 $auth=0;
		 $errno="1";
	 }
 }
 else
 {
	 echo "Error: " . $mysqli->error;
 }
 $stmt->close();
 $mysqli->close();
 return $auth;
}

$User=LoginUser($email,$passwd);
if(!$User){
	do_redirect($url_error);
}else{
 session_start();
 $_SESSION['userLoggedIn']= TRUE;
 setcookie("userLoggedIn", TRUE, time()+86400);
 setcookie("userEmail", $email, time()+86400);
 setcookie("userPassword", $passwd, time()+86400);
 do_redirect($url);
}
