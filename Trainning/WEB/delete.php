<?php 

include ("banner.php");
include ("menu.php");

require ("conn.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title> Search </title>
<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>


<div align="center">
<form action="delete.php" method="post">
 
    <label>Search : </label>
    <input type="text" name="search" id="search"
    placeholder="Station Name, Division etc." required style="width:400px">

  	<p>
 		<input type="submit" value="Search">
	</p>

</form>
</div>
<?php

if (isset($_REQUEST['msg'])){
  print "<div style='color:#f00;' align='center'> 
  <b>$_REQUEST[msg]<b>
  </div>";
}
?>
<?php

if(isset($_POST['search'])){

  $search = $_POST['search'];

  // echo "$search";
  // die();
                   
        $sql=  "SELECT * 
               	FROM `stations` 
                WHERE
                `station_name` LIKE '%$search%' ||
                `division_name` LIKE '%$search%'
                 
                AND `is_active`='y'";

         	$res = mysqli_query($conn, $sql) or die("Data not found");
		  	$count = mysqli_affected_rows($conn);
			
			if($count) {

				echo "<table align='center'>
           		<tr>
                	<td>Search result for $search</td>
            	</tr>
        		</table>"; 



echo "<div class='container'>
  <h2>Result</h2>
  
  <table class='table' border='1'>
    <thead>

    	<tr>
        <th>Sl No.</th>
        <th>Station Name</th>
        <th>Division</th>
        <th>Delete ?</th>

      </tr>
    </thead>
    <tbody>";
       
		$i =1;
        while($row = mysqli_fetch_assoc($res))
        {
      echo "<tr class='success'>
        <td> $i </td>
        <td> $row[station_name] </td>
        <td> $row[division_name] </td>
        <td>
         <a href='#form_modal1' data-toggle='modal'>
        <a href='deleteRecord.php?id=$row[station_id]'>
        <img src='images/delete.png' style='height:30px;width:30px'></a> </td>

      </tr>";

      $i++;
      }

    echo "</tbody>
  </table>
</div>";


			}

			else{
			echo "<table align='center'>
           			<tr>
                		<td>No result found</td>
            		</tr>
        		  </table>";

				exit();
			}   

}
?>      


</body>
</html>