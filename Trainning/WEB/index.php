<?php 
include ("banner.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
</head>
<body>
<br>
<br>
<br>
<br>
<?php

if (isset($_REQUEST['msg'])){
	print "<div style='color:#f00;' align='center'> 
	$_REQUEST[msg]
	</div>";
}
?>
<form action="login.php" method="post">

<table border='1' width='500' align='center'>
					
					<tr align='center'>
						
						<th>Username</th>
							<td>:</td>
							<td align=""><input type="text" name="uname" placeholder="Enter Your Username" autofocus="true">
							</td>			
					</tr>

					<tr align='center'>
						
						<th>Password</th>
						<td>:</td>
						<td align=""><input type="password" name="pwd" placeholder="Enter Your Password">
							</td>
				
					</tr>
				
					<p>
						<td colspan="3" align="center">
							<br>
						<input type="submit"  value="Login">
						<input type="reset"  value="Clear">
						<br>

						</td>
					</tr>
				</p>
</table>
<form>

</body>
</html>