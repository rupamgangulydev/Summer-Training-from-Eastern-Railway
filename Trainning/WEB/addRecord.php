<?php

require ("conn.php");
require ("session_security.php");

extract($_POST);
// print_r($_POST);
// die();

$sql = "INSERT INTO `stations` (`station_id`,`station_code`,
`station_name`,`station_category`,
`division_code`,`division_name`,
`state_code`,`state_name`,
`name_mp`,`constituency_mp`,
`party_code_mp`,`party_name_mp`,
`name_mla`,`constituency_mla`,
`party_code_mla`,`party_name_mla`,
`is_active`,`active_year`,
`remarks`,`fob`,
`rr`,`divyang`,
`hlp`,`trolley`,
`wh`,`ps`,
`lifts`,`escalator`,
`dcd`,`illumination`,
`indication`)
		VALUES 
		(null,'$station_code','$station_name','$station_category','$division_code','$division_name','$state_code','$state_name','$name_mp','$constituency_mp','$party_code_mp','$party_name_mp','$name_mla','$constituency_mla','$party_code_mla','$party_name_mla','y','$active_year','$remarks','$fob','$rr','$divyang','$hlp','$trolley','$wh','$ps','$lifts','$escalator','$dcd','$illumination','$indication')";

print_r($sql);
mysqli_query($conn,$sql) or die("Please check SQL Query");
$res = mysqli_affected_rows($conn);

if ($res) {

header("location:add.php?msg=Station Added Successfully");
}

else {
	header("location:add.php?msg=Data not added");
}

?>
