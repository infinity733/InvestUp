<?php
session_start();
$conn=mysqli_connect("localhost","root","","investup");
if(!$conn)
{
	die("could not connect server... and Database!!");
}
ob_start();

function getDB(){
	$conn=mysqli_connect("localhost","root","","investup");
	if(!$conn)
	{
		die("could not connect server... and Database!!");
	} else {
		return $conn;
	}
}

if(isset($_POST['Login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
  
	$chkEmail = mysqli_query($conn, "select * from user where email = '$email'");
	if(mysqli_num_rows($chkEmail) > 0){
	  $chkPassword = mysqli_query($conn, "select * from user where email = '$email' and password = MD5('$password')");
	  if(mysqli_num_rows($chkPassword) > 0){
		$row = mysqli_fetch_array($chkPassword);
		$_SESSION['user_email'] = $row['email'];
		$_SESSION['type'] = $row['type'];
		echo "<script>window.location='index.php';</script>";
	  }else{
		echo "<script>alert('Incorrect Password!!');window.location='signup.php';</script>";
	  }
	}
	else{
	  echo "<script>alert('Email Not Registered!!');window.location='signup.php';</script>";
	}
  }
?>