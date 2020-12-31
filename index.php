<?php
include('conn.php');
session_start();
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$q = $db->prepare("SELECT * FROM admin WHERE username='$username' && password='$password'");
	$q->execute();
	$res =  $q->fetchAll(PDO::FETCH_OBJ);
	if($res){
		$_SESSION['username'] = $username;
		header("Location:admin-home.php");
	} 
	else{
		echo "<script>alert('Invalid Login Credentials')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
	<div id="full">
		<div id="inner_full">
			<div id="header">
				<h1>Blood Bank Management System</h1>
			</div>
			<div id="bg_img">
				<img src="./img/BDTP.jpg">
			</div>
			<div id="body">
				<form action="" method="post">
					<input type="text" name="username" placeholder="Enter Username" id="username">
					<input type="password" name="password" placeholder="Enter Password" id="password">
					<button id="submit" value="submit" name="submit">Login</button>
				</form>
			</div>
			<div id="footer"><h4>&copy; Yash Studios</h4> </div>
		</div>
	</div>
</body>
</html>