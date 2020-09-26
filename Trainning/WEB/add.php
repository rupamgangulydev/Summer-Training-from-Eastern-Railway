<?php 

include ("banner.php");
include ("menu.php");
require ("conn.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title> Add </title>
<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>




<?php

if (isset($_REQUEST['msg'])){
  print "<div style='color:#f00;' align='center'> 
  <b>$_REQUEST[msg]<b>
  </div>";
}
?>


        
<div class='container' align="center">
<h2>Add Station</h2>
<form action='addRecord.php' method='POST'>  
  <table class='table' border='0'>
       <tbody>
       
       <tr class='success'>
        
        

    
        <td> 
            <p>Station code</p>
            <input type='text' name='station_code' value="">  
        
        </td>
        <td> 
            <p>Station name</p>
            <input type='text' name='station_name' value="">  
        
        </td>
      
       <td> Division Code
            <br>
        <select name="division_code">
            <option value="HWH">HWH</option>
            <option value="SDAH">SDAH</option>
            <option value="ASL">ASN</option>
            <option value="MLDT">MLDT</option>
 
        </select>
        </td>
    </tr>
       <tr>
        <td>  State Code
            <br>
        <select name="state_code">
            <option value="WB">WB</option>
            <option value="JH">JHARKHAND</option>
            <option value="BH">BH</option>
            <option value="NO">NO</option>
 
        </select>
            
        </td>
        <td>  State Name
            <br>
        <select name="state_name">
            <option value="West Bengal">West Bengal</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Bihar">Bihar</option>
            <option value="NO">NO</option>
 
        </select>
            
        </td>
        
        <td> 
            <p>Name MP</p>
            <input type='text' name='name_mp' value="">  
        
        </td>
    </tr>
    <tr>
        <td> 
        <tr class='success'>
            <td>
            <p>Constituency MP</p>
            <input type='text' name='constituency_mp' value="">  
        
        </td>
         <td>  Party Code MP
            <br>
        <select name="party_code_mp">
           <option value='BJP'>BJP</option>
            <option value='AITMC'>AITMC</option>
            <option value='CPIM'>CPIM</option>
            <option value='INC'>INC</option>
 
        </select>
            
        </td>
        <td>  Party Name MP
            <br>
        <select name="party_name_mp">
           <option value='Bharatiya Janata Party'>Bharatiya Janata Party</option>
            <option value='All India Trinamool Congress'>All India Trinamool Congress</option>
            <option value='The Communist Party of India'>The Communist Party of India</option>
            <option value='Indian National Congress'>Indian National Congress</option>
        </select>
            
        </td>


        
</tr>
    <tr>
        <td>
        <p>Name MLA</p> 
        <input type='text' name='name_mla' value="">  
        
        </td>
        <td> 
            <p>Constituency MLA</p>
            <input type='text' name='constituency_mla' value="">  
        
        </td>
        <td> 
            <p>Party Code MLA</p>
        <select name='party_code_mla'>
            <option value='BJP'>BJP</option>
            <option value='AITMC'>AITMC</option>
            <option value='CPIM'>CPIM</option>
            <option value='INC'>INC</option>
 
        </select>  
        </td>



         <tr>
        <tr class='success'>
        <td>
            <p>Party name MLA</p>
            <input type='text' name='party_name_mla' value="">  
        
        </td>
        <td>
        <p>Remarks</p> 
        <input type='text' name='remarks' value="">  
        
        </td>
        
        <td> 
            <p>Active year</p>
            <input type='text' name='active_year' value="">  
        </td>
    </tr>
    <tr>
        <td> Division Name
            <br>
        <select name="division_name">
            <option value="Howrah">Howrah</option>
            <option value="Sealdah">Sealdah</option>
            <option value="Asansol">Asansol</option>
            <option value="Malda">Malda</option>
 
        </select>
        </td>
        <td> Station Category 
            <br> 
        <select name="station_category">
            <option value="NSG-1">NSG-1</option>
            <option value="NSG-2">NSG-2</option>
            <option value="SG-2">SG-2</option>
            <option value="H-1">H-1</option>
 
        </select>  
        </td>
        <td> 
            <p>Retring Room</p>
            <input type="radio" name="rr" value="y" > Yes
            <input type="radio" name="rr" value="n" > No  
        
        </td>
        </tr>
         <tr class='success'>
        <td> 
            <p>Foot Over Bridge</p>
            <input type="radio" name="fob" value="y" > Yes
            <input type="radio" name="fob" value="n" > No 
        
        </td>
    
    
        <td> 
            <p>Divyang</p>
            <input type="radio" name="divyang" value="y" > Yes
            <input type="radio" name="divyang" value="n" > No  
        
        </td>
        
        <td> 
            <p>HLP</p>
            <input type="radio" name="hlp" value="y" > Yes
            <input type="radio" name="hlp" value="n" > No  
        
        </td>
        </tr>
    <tr>
        <td> 
            <p>Trolley</p>
            <input type="radio" name="trolley" value="y" > Yes
            <input type="radio" name="trolley" value="n" > No  
        
        </td>
    
        <td> 
            <p>Waiting Hall</p>
            <input type="radio" name="wh" value="y" > Yes
            <input type="radio" name="wh" value="n" > No 
        
        </td>
    
        <td> 
            <p>Platform Shelter</p>
            <input type="radio" name="ps" value="y" > Yes
            <input type="radio" name="ps" value="n" > No  
        
        </td>
        </tr>
    <tr class='success'>
        <td> 
            <p>Lifts</p>
            <input type="radio" name="lifts" value="y" > Yes
            <input type="radio" name="lifts" value="n"> No  
        
        </td>
    
        <td> 
            <p>Escalators</p>
            <input type="radio" name="escalator" value="y" > Yes
            <input type="radio" name="escalator" value="n" > No 
        
        </td>
    
        <td> 
            <p>Digital Chart Display</p>
            <input type="radio" name="dcd" value="y" > Yes
            <input type="radio" name="dcd" value="n" > No  
        
        </td>
        <td> 
            <p>Illumination</p>
            <input type="radio" name="illumination" value="y" > Yes
            <input type="radio" name="illumination" value="n" > No  
        
        </td>
    
        <td> 
            <p>Coach Indication Board</p>
            <input type="radio" name="indication" value="y" > Yes
            <input type="radio" name="indication" value="n" > No  
      
        </td>
    </tr>
        


      <tr>
        <td colspan="8" align="center"> 
        <input type='submit' name='Add' value='Add'>  
        <input type="reset" name="Update" value="Clear">
        </td>

      </tr>

      
      

    </tbody>
  </table>
</form>
</div>
</body>
</html>