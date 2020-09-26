<?php

session_start();

require ("conn.php");

extract($_POST);

$sql = "SELECT * FROM `users` WHERE `username`='$uname' AND `password`='$pwd'";

$query = mysqli_query($conn,$sql) or die ("error");
$res = mysqli_affected_rows($conn);


// print_r($query);
// die();

if($res) {

$row = mysqli_fetch_assoc($query);
// print_r($row);
// die();

$_SESSION['active_id'] = $row['user_id'];
$_SESSION['active_user'] = $row['username'];



header("location:home.php");
}

else {
	header("location:index.php?msg=Wrong username or password");
}

?>