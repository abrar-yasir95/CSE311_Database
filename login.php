<!Doctype html>
<html>
<head>
<title>Login page</title>
<link rel="stylesheet"type"text/css" href="style.css">
<?php 
$con=mysqli_connect("localhost","root","","uni_info");
if(isset($_POST['log'])){
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	
	if($username!="" && $password!=""){
		$sql = "select id from login where username='$username' and password='$password'"; 
		$result = mysqli_query($con,$sql);
		$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$count = mysqli_num_rows($result);
	
		if($count== 1){
			header("location:admin.html");
		}
		else{
			echo"Incorrect password or username";
		}
	}
}
?>
</head>
<body>
<form class=""action ="login.php" method="post">
<div class = "container">
<label for="">Login</label>
<input type="text" name="username" placeholder="Username" value = "">
<input type="password" name="password" placeholder="password" value="">
<button type="sumbit"class="btn" name="log">login</button>
</div>
</form>
</body>
</html>






