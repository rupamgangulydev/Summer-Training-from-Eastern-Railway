
<hr color='red'>
<div align='center' >
<font size='6'>
<span><a href='home.php'>|Home|</a></span>&emsp;
<span><a href='search.php'>|Search|</a></span>&emsp;
<span><a href='add.php'>|Add|</a></span>&emsp;
<span><a href='update.php'>|Update|</a></span>&emsp;
<span><a href='delete.php'>|Delete|</a></span>&emsp;
<span><a href='reports.php'>|Reports|</a></span>&emsp;

<span><a href='logout.php'>|Logout|</a></span>
</font>
</div>

<!--START - welcome user -->
<div align='center' >
<font size='6'>
<span>Welcome

<?php
require ("session_security.php");
echo "<b>".$_SESSION['active_user']."</b>";
?>

</span>
</font>
</div>
<!--END - welcome user -->

<hr color='red'>

