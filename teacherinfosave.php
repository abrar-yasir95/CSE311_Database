<?php


if (isset($_POST['submit'])){
	include_once "uni_connect.php";
	
	$name=$_POST['ne'];
	$initial=$_POST['int'];
	$role=$_POST['rl'];
	$room_no=$_POST['ro'];
	$office_hour =$_POST['oc'];
    $publication =$_POST['pu'];
    $teaching =$_POST['tg'];	
	
	
	$query6= "INSERT INTO teacherlist(name,initial,role,room_no,office_hour,publication,teaching)
	         VALUES ('".$name."','".$initial."','".$role."','".$room_no."','".$office_hour."','".$publication."','".$teaching."')";
			 
	if ($conn->query ($query6)===TRUE)
	{echo "New record created successfully";
	}
	else
	{
		echo "error";
	}
	$conn->close();
}
	