<?php


if (isset($_POST['submit'])){
	include_once "uni_connect.php";
	
	$course_id=$_POST['ci'];
	$teacher_initial=$_POST['ti'];
	$section=$_POST['sc'];
	$timing =$_POST['tim'];
	$room_no =$_POST['rn'];
	
	
	
	$query5= "INSERT INTO courses(course_id, teacher_initial, section, timing, room_no)
	         VALUES ('".$course_id."','".$teacher_initial."','".$section."','".$timing."','".$room_no."')";
			 
	if ($conn->query ($query5)===TRUE)
	{echo "New record created successfully";
	}
	else
	{
		echo "error";
	}
	$conn->close();
}
	