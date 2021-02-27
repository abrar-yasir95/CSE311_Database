<?php


if (isset($_POST['submit'])){
	include_once "uni_connect.php";
	
	$first_name=$_POST['ft'];
	$last_name=$_POST['lt'];
	$present_address =$_POST['p1'];
	$date_of_birth =$_POST['dot'];
	$bsc = $_POST['b1'];
	$msc = $_POST['m1'];
	$phd = $_POST['ph1'];
	
	
	$query3= "INSERT INTO teacher (first_name, last_name, present_address, date_of_birth, bsc, msc, phd)
	         VALUES ('".$first_name."','".$last_name."','".$present_address."','".$date_of_birth."','".$bsc."','".$msc."','".$phd."')";
			 
	if ($conn->query ($query3)===TRUE)
	{echo "New record created successfully";
	}
	else
	{
		echo "error";
	}
	$conn->close();
}
	