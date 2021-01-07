<?php
include('conn.php');
session_start();
$username = $_SESSION['username'];
if(!$username){
	header('Location:index.php');
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
				<h1>Welcome Admin</h1>
				<a href="logout.php"><button>Logout</button></a>
				<!--
				<form action="" method="post">
					<input type="text" name="username" placeholder="Enter Username" id="username">
					<input type="password" name="password" placeholder="Enter Password" id="password">
					<button id="submit" value="submit" name="submit">Login</button>
				</form>
				-->
				<div id="facilities">
					<div class="feature">
						<p>
							<a href="donor-reg.php">Donor Registration</a>
						</p>
					</div>
					<div class="feature">
						<p>
							<a href="donor-list.php">Donor List</a>
						</p>
					</div>
					<div class="feature">
						<p>
							<a href="in-stock.php">In-Stock Blood List</a>
						</p>
					</div>
					<div class="feature">
						<p>
							<a href="exchange.php">Donor Blood Exchange Registration</a>
						</p>
					</div>
					<div class="feature">
						<p>
							<a href="exchange-list.php">Donor Blood Exchange List</a>
						</p>
					</div>
					<div class="feature">
						<p>
							<a href="ngo.php">NGO List</a>
						</p>
					</div>
				</div>
			</div>
			<div id="footer"><h4>&copy; Yash Studios</h4> </div>
		</div>
	</div>
</body>
</html>