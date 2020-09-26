<?php

require ("session_security.php");

require ("conn.php");

extract($_REQUEST);

$id = $_REQUEST['id'];

// print_r($_REQUEST);
// echo $id;
// die();

$sql = "DELETE FROM `stations`
		WHERE `station_id`='$id'";

mysqli_query($conn,$sql) or die ("error");
$res = mysqli_affected_rows($conn);

if ($res) {

header("location:delete.php?msg=Record Deleted Successfully");
}

else {
	header("location:index.php?msg=Wrong username or password");
}

?>

$sql = "DELETE FROM `users`
		WHERE `user_id`=3";


mysqli_query($con,$sql) or die ("Can not DELETE data from users table");


$res = mysqli_affected_rows($con);

// print_r($res);
// die();

if($res)
{

	header("location:success.php");
}
else{

	header("location:failed.php");
}

mysqli_close($con);
?>


<!-- Showing System Error of Database
$res = mysqli_query($conn,$sql) or die(mysqli_error($con)); -->