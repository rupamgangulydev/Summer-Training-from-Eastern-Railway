<?php
	
include ("banner.php");
include ("menu.php");
require ("conn.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reports</title>
	<script type="text/javascript">
		function goBack()
		{
			window.location.href = "next_page.php";
		}
	</script>
</head>
<body>


<div align="center"><b><font color="blue" align="center" size="">Stations Reports</font></b></div>
<p></p>


<form action="reports.php" method="POST" align="center">

<select name="reports" onchange="subMenu()" id="reports_1">
	<option value="">--Select--</option>	
  <option value="div">List of Stations according to Division</option>
  <option value="cat">List of Stations according to Category</option>
  <option value="amen">List of Stations having Amenities</option>
  
</select>
<br><br>
<select name="reports2" id="reports_2"></select>
<br><br>
<input type="submit" value="Generate">
<input type="button" name="back" value="Back" onclick="goBack()">
</form>

<script type="text/javascript">
	
	var sub_menu = {};
	sub_menu['div'] = ['HOWRAH','MALDA','SEALDAH','ASANSOL'];
	sub_menu['cat'] = ['NSG-1','NSG-2','NSG-3','NSG-4','NSG-5','NSG-6','SG-1','SG-2','SG-3','HG-1','HG-2','HG-3'];
	sub_menu['amen'] = ['Foot Over Bridge','Retiring Room','Divyang','High Level Platform','Trolley','Waiting Halls','Platform Shelters','Lifts','Escalators','Digital Charts Display','Illumination','Train/Coach Indication Board'];
	
	function subMenu() 
	{
		var menu_list = document.getElementById("reports_1");
		var sub_menu_list = document.getElementById("reports_2");
		var final_list = menu_list.options[menu_list.selectedIndex].value;
		while(sub_menu_list.options.length)
		{
			sub_menu_list.remove(0);
		}
		var final = sub_menu[final_list];
		if(final)
		{
			var i;
			for(i=0;i<final.length;i++)
			{
				var j = new Option(final[i],i);
				sub_menu_list.options.add(j);
			}
		}
	}

</script>

<?php

if (isset($_REQUEST['msg'])){
  print "<div style='color:#f00;' align='center'>
  <br><br> 
  <b>$_REQUEST[msg]<b>
  </div>";
}
?>

<?php

extract($_POST);
// print_r($_POST);
// die();

if(isset($_POST['reports'])){

	$select = $_POST['reports'];
	$select2 = $_POST['reports2'];
	//print_r($select);
	//print_r($select2);
	//die();

	if($select == "div")
	{
		switch($select2)
		{
			case 0: $q = "`division_code` = 'HWH'";
					break;
			case 1: $q = "`division_code` = 'MLDT'";
					break;
			case 2: $q = "`division_code` = 'SDAH'";
					break;
			case 3: $q = "`division_code` = 'ASN'";
					break;
		}
		
	}
	elseif ($select == "cat")
	{
		switch($select2)
		{
			case 0: $q = "`station_category` = 'NSG-1'";
					break;
			case 1: $q = "`station_category` = 'NSG-2'";
					break;
			case 2: $q = "`station_category` = 'NSG-3'";
					break;
			case 3: $q = "`station_category` = 'NSG-4'";
					break;
			case 4: $q = "`station_category` = 'NSG-5'";
					break;
			case 5: $q = "`station_category` = 'NSG-6'";
					break;
			case 6: $q = "`station_category` = 'SG-1'";
					break;
			case 7: $q = "`station_category` = 'SG-2'";
					break;
			case 8: $q = "`station_category` = 'SG-3'";
					break;
			case 9: $q = "`station_category` = 'HG-1'";
					break;
			case 10: $q = "`station_category` = 'HG-2'";
					break;
			case 11: $q = "`station_category` = 'HG-3'";
					break;
		}

	}
	elseif ($select == "amen")
	{
		switch($select2)
		{
			case 0: $q = "`fob` = 'y'";
					break;
			case 1: $q = "`rr` = 'y'";
					break;
			case 2: $q = "`divyang` = 'y'";
					break;
			case 3: $q = "`hlg` = 'y'";
					break;
			case 4: $q = "`trolley` = 'y'";
					break;
			case 5: $q = "`wh` = 'y'";
					break;
			case 6: $q = "`ps` = 'y'";
					break;
			case 7: $q = "`lifts` = 'y'";
					break;
			case 8: $q = "`escalator` = 'y'";
					break;
			case 9: $q = "`dcd` = 'y'";
					break;
			case 10: $q = "`illumination` = 'y'";
					break;
			case 11: $q = "`indication` = 'y'";
					break;
		}

	}
	
	else
	{
		header("location:reports.php?msg=Report can not be generated");	
	}
	
		$con=mysqli_connect("localhost","root","","station_master");   
        $sql=  "SELECT * FROM `stations` WHERE $q";
        $res = mysqli_query($con, $sql) or die("Data not found");
		$count = mysqli_affected_rows($con);	
		$arr = array("div"=>"Division", "cat"=>"Category", "amen"=>"Amenities");
		if($select == "cat")
		{
			$arr2 = array("NSG-1", "NSG-2", "NSG-3", "NSG-4", "NSG-5", "NSG-6", "SG-1", "SG-2", "SG-3", "HG-1", "HG-2", "HG-3");	
		}elseif($select == "amen")
		{
			$arr2 = array("fob","rr","divyang","hlg","trolley","wh","ps","lifts","escalator","dcd","illumination","indication");	
		}
		elseif($select == "div")
		{
			$arr2 = array("Howrah", "Malda", "Sealdah", "Asansol");
		}
		else
		{
			$arr2 = array("");
		}
		 
		if($count) {
						echo "<div class='container' align='center'>
						  <p><font size='5'> Showing result for stations according to <b>$arr[$select] $arr2[$select2]</b> </font></p>
						  
						  <table class='table' border='1'>
						    <thead>

						    	<tr>
						        <th>Sl No.</th>
						        <th>Station Name</th>
						        <th>Division</th>
						        <th>Station Category</th>
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
						        <td> $row[station_category] </td>

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