<?php


if (isset($_POST['submit'])){
	include_once "uni_connect.php";
	
	$first_name=$_POST['f_n'];
	$last_name=$_POST['l_n'];
	$father_name =$_POST['ftr'];
	$mother_name =$_POST['mtr'];
	$present_address =$_POST['pra'];
	$permanent_address=$_POST['pea'];
	$date_of_birth =$_POST['dob'];
	
	
	$query2= "INSERT INTO student (first_name, last_name, father_name, mother_name, present_address, permanent_address, date_of_birth)
	         VALUES ('".$first_name."','".$last_name."','".$father_name."','".$mother_name."','".$present_address."','".$permanent_address."','".$date_of_birth."')";
			 
	if ($conn->query ($query2)===TRUE)
	{echo "New record created successfully";
	}
	else
	{
		echo "error";
	}
	$conn->close();
}
	