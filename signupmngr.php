<?php
$email=$_POST["InputEmail"];
$passwd=$_POST["InputPassword"];
$country=$_POST["InputCountry"];
$isCCPub=$_POST["CheckCC"];
$cprupubname=$_POST["InputCCName"];
$address=$_POST["InputAddress"];

$conn=mysqli_connect("localhost","root","","site");
if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}

if($isCCPub==0){
	$cprupubname="";
	$address="";
}
$sql="INSERT INTO susers (email, password, country,iscontentpub,crpubname,streetaddress)
VALUES ('$email','$passwd','$country','$isCCPub','$cprupubname','$address')";


if(mysqli_query($conn,$sql)){
	echo "New record created successfully\n";
}
else{
	echo "Error: ".$sql."<br>".mysqli_error($conn)."\n";
}

echo 'Data recorded: '.$email.' '.$passwd.' '.$country.' '. $isCCPub.' '.$cprupubname.' '.$address; 
?>