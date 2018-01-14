<?php
session_start();
include_once 'dbconnect.php';

if(isset($_POST['signup']))
{
	if($_POST['roll']!="" && $_POST['name']!="" && $_POST['list']!="" && $_POST['password']!="") 
	{
		
		$roll = mysql_real_escape_string($_POST['roll']);
		$name = mysql_real_escape_string($_POST['name']);
		$class = mysql_real_escape_string($_POST['list']);
		
		$password = mysql_real_escape_string(md5($_POST['password']));

		if(mysql_query("INSERT INTO all_student_database (name,class,roll,password) VALUES('$name','$class','$roll','$password')"))
		{
			 echo '<h5 style="color:green; text-align:center;">Successfully registered with strong password!</h5>';
		}
		else
		{		 
			 echo '<h5 style="color:red; text-align:center;">Error while registering you! try again.</h5>';
		}		
	}
	else
	{		 
		 echo '<h5 style="color:red; text-align:center;">All fields are required.</h5>';
	}	
}


if (isset($_POST['signin'])) 
{
	if($_POST['roll_login']!="" && $_POST['password_login']!="") 
	{

		$roll_login = mysql_real_escape_string($_POST['roll_login']);
		$password_login = mysql_real_escape_string($_POST['password_login']);
		$res=mysql_query("SELECT * FROM all_student_database WHERE roll='$roll_login'");
		$row=mysql_fetch_array($res);
		
		if($row['password']==md5($password_login))
		{
			$_SESSION['user'] = $row['roll'];
			$class = $row['class'];
			if ($class == "fe_it_sem_1") {
				header("Location: class/fe_it_sem_1.php");
			}
			if ($class == "fe_it_sem_2") {
				header("Location: class/fe_it_sem_2.php");
			}
			if ($class == "se_it_sem_3") {
				header("Location: class/se_it_sem_3.php");
			}
			if ($class == "se_it_sem_4") {
				header("Location: class/se_it_sem_4.php");
			}
			if ($class == "te_it_sem_5") {
				header("Location: class/te_it_sem_5.php");
			}
			if ($class == "te_it_sem_6") {
				header("Location: class/te_it_sem_6.php");
			}
			else
			{
				echo '<h5 style="color:red; text-align:center;">Data did not macth.</h5>';
			}
		}
		else
		{
	    	echo '<h5 style="color:red; text-align:center;">Data did not match.</h5>';
		}
	}
	else
	{		 
		 echo '<h5 style="color:red; text-align:center;">All fields are required.</h5>';
	}
}
?>