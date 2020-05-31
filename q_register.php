<?php 
include 'server/config.php';

$email = "";
$password = "";
$lvl = "user";


$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$level = $lvl;
$date_created = date('Y-m-d H:i:s');


$sql = "INSERT INTO users (email,password,level,date_created) VALUES ('$email','$password','$level','$date_created')";
$result = mysqli_query($conn,$sql);
if ($result) {
	header("Location: login.php");
}else{
	header("Location: registration.php");
	echo "error : ".$sql;
}