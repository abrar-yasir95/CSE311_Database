<?php


if (isset($_POST['submit'])){
	include_once "uni_connect.php";
	
	$student_id=$_POST['id'];
	$name=$_POST['nm'];
	$course_id =$_POST['cn'];
	$section =$_POST['sec'];
	$grade =$_POST['grd'];
	$semester=$_POST['sm'];
	$year =$_POST['yr'];
	
	
	$query4= "INSERT INTO grade (student_id, name, course_id, section, grade, semester, year)
	         VALUES ('".$student_id."','".$name."','".$course_id."','".$section."','".$grade."','".$semester."','".$year."')";
			 
	if ($conn->query ($query4)===TRUE)
	{echo "New record created successfully";
	}
	else
	{
		echo "error";
	}
	$conn->close();
}
	