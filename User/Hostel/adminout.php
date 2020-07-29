<?php
session_start();
if(isset($_SESSION['admin']))
{
	session_destroy();
	header('location:admin_login.php');

}
?>