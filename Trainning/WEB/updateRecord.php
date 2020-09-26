<?php

include ("conn.php");
require ("session_security.php");

extract($_POST);

//	print_r($_POST);
//die();

$sql = "UPDATE `stations` SET`station_code`='$station_code',
`station_name`='$station_name',`station_category`='$station_category',
`division_code`='$division_code',`division_name`='$division_name',
`state_code`='$state_code',`state_name`='$state_name',
`name_mp`='$name_mp',`constituency_mp`='$constituency_mp',
`party_code_mp`='$party_code_mp',`party_name_mp`='$party_name_mp',
`name_mla`='$name_mla',`constituency_mla`='$constituency_mla',
`party_code_mla`='$party_code_mla',`party_name_mla`='$party_name_mla',
`is_active`='y',`active_year`='$active_year',
`remarks`='$remarks',`fob`='$fob',
`rr`='$rr',`divyang`='$divyang',
`hlp`='$hlp',`trolley`='$trolley',
`wh`='$wh',`ps`='$ps',
`lifts`='$lifts',`escalator`='$escalator',
`dcd`='$dcd',`illumination`='$illumination',
`indication`='$indication'
	    WHERE `station_id`='$stn_id'";


//print_r($sql);
//die();
mysqli_query($conn,$sql) or die ("error");
$res = mysqli_affected_rows($conn);

if ($res) {

header("location:update.php?msg=Station Updated Successfully");
}

else {
	header("location:update.php?msg=Data not updated");
}

?>
