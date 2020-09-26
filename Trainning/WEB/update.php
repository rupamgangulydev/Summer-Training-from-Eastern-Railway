<?php 

include ("banner.php");
include ("menu.php");
require ("conn.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title> Update </title>
<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>


<div align="center"> 
<form action="update.php" method="post">
 
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
                `division_name` LIKE '%$search%'||
                `station_category` LIKE '%$search%'

                 
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
  
  <table class='table' border='0'>
    <thead>

    	<tr>
        <th>Sl No.</th>
        <th>Station Name</th>
        <th>Division</th>
        <th>Station Category</th>
        <th>Update ?</th>

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

        <td>
        <a href='update.php?id=$row[station_id]'>
        <img src='images/edit.png' style='height:30px;width:30px'></a> </td>

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



<?php

if(isset($_REQUEST['id'])){

  $id = $_REQUEST['id'];

  // echo "$id";
  // die();
                   
        $sql=  "SELECT * 
                FROM `stations` 
                WHERE
                `station_id`='$id'";

        $res = mysqli_query($conn, $sql) or die("Data not found");
        $count = mysqli_affected_rows($conn);
      
      if($count) {

        
echo "<div class='container'>
  <h2>Update Station</h2>
<form action='updateRecord.php' method='POST'>  
  <table class='table' border='1'>
       <tbody>";
       
      
        while($row = mysqli_fetch_assoc($res))
        {
        
        echo "<tr class='success'>
        
        <td> Station code </td>

        <td> 
        <input type='text' name='station_code' value='$row[station_code]' readonly>  
        </td>

        <td> Station Name </td>
        
        <td> 
        <input type='text' name='station_name' value='$row[station_name]' readonly>  
        </td>
        <td> station Category </td>
        
        <td> 
        <input type='text' name='station_category' value='$row[station_category]' readonly>  
        </td>
            </tr>
            <tr>
        <td> Division code </td>
        
        <td> 
        <input type='text' name='division_code' value='$row[division_code]' readonly>  
        </td>
        <td> Division Name </td>
        
        <td> 
        <input type='text' name='division_name' value='$row[division_name]' readonly>  
        </td>
        <td> State Code </td>
        
        <td> 
        <input type='text' name='state_code' value='$row[state_code]' readonly>  
        </td>
        </tr>
          <tr class='success'>
        <td> State Name </td>
            
            
        <td> 
        <input type='text' name='state_name' value='$row[state_name]'readonly>  
        </td>
        <td> Name MP </td>
        
        <td> 
        <input type='text' name='name_mp' value='$row[name_mp]'>  
        </td>
        <td> Constituency MP </td>
        
        <td> 
        <input type='text' name='constituency_mp' value='$row[constituency_mp]'readonly>  
        </td>
        </tr>
        <tr>
        <td> Party Code MP </td>
            
            
        <td> 
        <select name='party_code_mp'>
            <option value='BJP'>BJP</option>
            <option value='AITMC'>AITMC</option>
            <option value='CPIM'>CPIM</option>
            <option value='INC'>INC</option>
 
        </select>  
        </td>
        <td> Party Name MP </td>
         <td> 
        <select name='party_name_mp'>
            <option value='Bharatiya Janata Party'>Bharatiya Janata Party</option>
            <option value='All India Trinamool Congress'>All India Trinamool Congress</option>
            <option value='The Communist Party of India'>The Communist Party of India</option>
            <option value='Indian National Congress'>Indian National Congress</option>
 
        </select>  
        </td>
        <td> Name MLA </td>
        
        <td> 
        <input type='text' name='name_mla' value='$row[name_mla]'>  
        </td>
        </tr>
        <tr class='success'>
        <td> Constituency MLA </td>
            
        <td> 
        <input type='text' name='constituency_mla' value='$row[constituency_mla]'>  
        </td>

         <td> Party Code MLA </td>
            
            
        <td> 
        <select name='party_code_mla'>
            <option value='BJP'>BJP</option>
            <option value='AITMC'>AITMC</option>
            <option value='CPIM' selected>CPIM</option>
            <option value='INC'>INC</option>
 
        </select>  
        </td>
        
        <td> Party Name Mla </td>
        
        <td> 
        <input type='text' name='party_name_mla' value='$row[party_name_mla]'>  
        </td>
          </tr>
            <tr>
        <td> Active Year </td>
          
        <td> 
        <input type='text' name='active_year' value='$row[active_year]'>  
        </td>
        <td> Remarks </td>
        
        <td> 
        <input type='text' name='remarks' value='$row[remarks]'>  
        </td>
        
        <td>
    
       </td>
        </tr>
        <tr class='success'>

        <td>
        <p> Foot Over Bridge</p>";
        ?>

					 <p>Yes<input type='radio' name='fob' value='y' 
                        <?php echo ($row['fob']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='fob' value='n' 
                    <?php echo ($row['fob']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
        <td>
        <p>Retiring Room</p>";
        ?>

					 <p>Yes<input type='radio' name='rr' value='y' 
                        <?php echo ($row['rr']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='rr' value='n' 
                    <?php echo ($row['rr']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
        <td>
        <p>Divyang</p>";
        ?>

					 <p>Yes<input type='radio' name='divyang' value='y' 
                        <?php echo ($row['divyang']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='divyang' value='n' 
                    <?php echo ($row['divyang']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
        <td>
        <p> High Level Platform</p>";
        ?>

					 <p>Yes<input type='radio' name='hlp' value='y' 
                        <?php echo ($row['hlp']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='hlp' value='n' 
                    <?php echo ($row['hlp']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
        <td>
        <p> Trolley</p>";
        ?>

					 <p>Yes<input type='radio' name='trolley' value='y' 
                        <?php echo ($row['trolley']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='trolley' value='n' 
                    <?php echo ($row['trolley']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
        <td>
        <p> Waiting Hall</p>";
        ?>

					 <p>Yes<input type='radio' name='wh' value='y' 
                        <?php echo ($row['wh']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='wh' value='n' 
                    <?php echo ($row['wh']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
        <td>
        <p> Platform Shelter</p>";
        ?>

					 <p>Yes<input type='radio' name='ps' value='y' 
                        <?php echo ($row['ps']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='ps' value='n' 
                    <?php echo ($row['ps']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
        <td>
        <p> Lifts</p>";
        ?>

					 <p>Yes<input type='radio' name='lifts' value='y' 
                        <?php echo ($row['lifts']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='lifts' value='n' 
                    <?php echo ($row['lifts']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
        <td>
        <p> Escalators</p>";
        ?>

					 <p>Yes<input type='radio' name='escalator' value='y' 
                        <?php echo ($row['escalator']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='escalator' value='n' 
                    <?php echo ($row['escalator']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
        <td>
        <p> Digital Chart Display</p>";
        ?>

					 <p>Yes<input type='radio' name='dcd' value='y' 
                        <?php echo ($row['dcd']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='dcd' value='n' 
                    <?php echo ($row['dcd']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td><td>
        <p> Illumination</p>";
        ?>

					 <p>Yes<input type='radio' name='illumination' value='y' 
                        <?php echo ($row['illumination']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='illumination' value='n' 
                    <?php echo ($row['illumination']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td><td>
        <p>Coach Indication Board</p>";
        ?>

					 <p>Yes<input type='radio' name='indication' value='y' 
                        <?php echo ($row['indication']=='y')?"checked":'';?>
                        >
					No<input type='radio' name='indication' value='n' 
                    <?php echo ($row['indication']=='n')?"checked":'';?>
                    >
        <?php

        echo"</td>
       
     </tr>
	


        <input type='hidden' name='stn_id' value='$row[station_id]'>  

        <td> 
        <input type='submit' name='Update' value='Update'>  
        </td>

        <td> 
        <a herf='delete.php'>
        <input type='reset' name='clear' value='Clear'>
        </a> 
        </td>
        

      </tr>";?>

      
    <?php   }  ?>

    </tbody>
  </table>
</form>
</div>

<?php 

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