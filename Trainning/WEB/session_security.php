<?php
session_start();

if (!$_SESSION['active_id']) {
	header("location:index.php?msg=Wrong attempt!");
}