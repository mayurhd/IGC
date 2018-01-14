<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
else if(isset($_SESSION['user'])!="")
{
	header("Location: xyz.php");
}

if(isset($_GET['signout']))
{
	session_destroy();
	unset($_SESSION['user']);
	?><script>alert("Logout successful.");</script><?php
	header("Location: index.php");
}
?>
