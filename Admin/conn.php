<?php
session_start();
error_reporting(1);
ini_set('max_execution_time', '0');
set_time_limit(0);
date_default_timezone_set('Asia/Kolkata');
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

function insert_data($table_name, $data)
{
        //echo 'COmig';
	$query = "insert into ".$table_name." (";
	foreach($data as $column => $values)
	{
		if(!is_numeric($column))
		{
			$query .= "".$column.",";
		}
	}
	$query = substr($query, 0, -1) . ") values (";
	foreach($data as $column => $values)
	{
		if(!is_numeric($column))
		{
			$query .= "'".$values."',";
		}
	}
	$query = substr($query, 0, -1) . ")";
        //echo 'QRY '.$query;
	$res = mysqli_query(getDB(),$query);
	if($res)
	{
		return $res;

	}
	else
	{
		$mysqli_error = mysqli_error()."<br><b> QUERY => ". $query."</b>";
            //echo sql_err($mysqli_error);
		echo '++++===='.$mysqli_error;
	}

}
function update_data($table_name, $data, $condition)
{
	$query = "update ".$table_name." set ";
	foreach($data as $column => $values)
	{
		if(!is_numeric($column))
		{
			$query .= "".$column."='".$values."', ";
		}
	}
	$query = substr($query, 0, -2) ." where ";
	$query .= "".$condition."";

	$res = mysqli_query(getDB(),$query);
	if($res)
	{
		return $res;
	}
	else
	{
		$mysqli_error = mysqli_error()."<br><b> QUERY => ". $query."</b>";
		echo $mysqli_error;
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
        if($row['type'] == 'Investor'){
            echo "<script>window.location='investor-dashboard.php';</script>";
        }else{
            echo "<script>window.location='founder-dashboard.php';</script>";
        }
	  }else{
		echo "<script>alert('Incorrect Password!!');window.location='index.php';</script>";
	  }
	}
	else{
	  echo "<script>alert('Email Not Registered!!');window.location='index.php';</script>";
	}
  }
?>