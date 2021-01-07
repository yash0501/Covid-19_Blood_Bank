<?php
include('conn.php');
session_start();
$username = $_SESSION['username'];
if(!$username){
	header('Location:index.php');
}

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$fname = $_POST['fname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$b_group = $_POST['b_group'];
	$ex_b_group = $_POST['ex_b_group'];
	
	$q1=$db->query("SELECT * FROM donor_registration WHERE b_group='$b_group'");
	$row=$q1->rowcount();
	if($row==0){
		echo "<script>alert('Required Blood is not available in our Stock. Sorry:(')</script>";
	}
    else{       
		$q = $db->prepare("INSERT INTO exchange (name,fname,address,city,age,email,mobile,b_group,ex_b_group) VALUES (:name,:fname,:address,:city,:age,:email,:mobile,:b_group,:ex_b_group)");
		$q->bindValue('name',$name);
		$q->bindValue('fname',$fname);
		$q->bindValue('address',$address);
		$q->bindValue('city',$city);
		$q->bindValue('age',$age);
		$q->bindValue('email',$email);
		$q->bindValue('mobile',$mobile);
		$q->bindValue('b_group',$b_group);
		$q->bindValue('ex_b_group',$ex_b_group);
		if($q->execute()){
			echo "<script>alert('Blood Exchange form submitted successfully.')</script>";
		}
		else{
			echo "<script>alert('Form submission Failed.')</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Donor Registration</title>
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
				<h1>Donor Registration</h1>
				<a href="logout.php"><button>Logout</button></a>
				<!--
				<form action="" method="post">
					<input type="text" name="username" placeholder="Enter Username" id="username">
					<input type="password" name="password" placeholder="Enter Password" id="password">
					<button id="submit" value="submit" name="submit">Login</button>
				</form>
				-->
				<!--
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
							<a href="out-stock.php">Out-Of-Stock Blood List</a>
						</p>
					</div>
					<div class="feature">
						<p>
							<a href="exchange.php">Donor Blood Exchange List</a>
						</p>
					</div>
					<div class="feature">
						<p>
							<a href="ngo.php">NGO List</a>
						</p>
					</div>
				</div>-->
				<div id="form">
					<form action="" method="post">
						<input type="text" name="name" placeholder="Enter Donor Name">
						<input type="text" name="fname" placeholder="Enter Father's Name">
						<input type="text" name="address" placeholder="Enter Address">
						<input type="text" name="city" placeholder="Enter City Name">
						<input type="number" name="age" placeholder="Enter Donor Age">
						<input type="email" name="email" placeholder="Enter Donor Email">
                        <input type="text" name="mobile" placeholder="Enter Donor Mobile No.">
                        <label for="b_group">Blood Group Required</label>
						<select name="b_group">
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
                        </select>
                        <label for="b_group">Blood Group Exchanging</label>
                        <select name="ex_b_group">
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
						</select>
						<button name="submit">Save</button>
					</form>
				</div>
			</div>
			<div id="footer"><h4>&copy; Yash Studios</h4> </div>
		</div>
	</div>
</body>
</html>