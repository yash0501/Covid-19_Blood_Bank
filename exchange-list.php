<?php
include('conn.php');
session_start();
$username = $_SESSION['username'];
if(!$username){
	header('Location:index.php');
}
/*
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$fname = $_POST['fname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$b_group = $_POST['b_group'];
	$q = $db->prepare("INSERT INTO donor_registration (name,fname,address,city,age,email,mobile,b_group) VALUES (:name,:fname,:address,:city,:age,:email,:mobile,:b_group)");
	$q->bindValue('name',$name);
	$q->bindValue('fname',$fname);
	$q->bindValue('address',$address);
	$q->bindValue('city',$city);
	$q->bindValue('age',$age);
	$q->bindValue('email',$email);
	$q->bindValue('mobile',$mobile);
	$q->bindValue('b_group',$b_group);
	if($q->execute()){
		echo "<script>alert('Donor Registration Successful.')</script>";
	}
	else{
		echo "<script>alert('Donor Registration Failed.')</script>";
	}
}*/
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
				<a href = "./admin-home.php" text-decoration = "none"><h1 style="color: white">Blood Bank Management System</h1></a>
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
                    </div>
                -->
				<!--<div id="form">
					<form action="" method="post">
						<input type="text" name="name" placeholder="Enter Donor Name">
						<input type="text" name="fname" placeholder="Enter Father's Name">
						<input type="text" name="address" placeholder="Enter Address">
						<input type="text" name="city" placeholder="Enter City Name">
						<input type="number" name="age" placeholder="Enter Donor Age">
						<input type="email" name="email" placeholder="Enter Donor Email">
						<input type="text" name="mobile" placeholder="Enter Donor Mobile No.">
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
						<button name="submit">Save</button>
					</form>
				</div>-->
                <table id="data" style="width: 100%; border: 2px solid black; margin: 30px; font-size: 24px">
                    <tr id="t_head">
                        <td class="h_item" style="border: 1px solid black;">Name</td>
                        <td class="h_item" style="border: 1px solid black;">Father's Name</td>
                        <td class="h_item" style="border: 1px solid black;">Address</td>
                        <td class="h_item" style="border: 1px solid black;">City</td>
                        <td class="h_item" style="border: 1px solid black;">Age</td>
                        <td class="h_item" style="border: 1px solid black;">E-mail</td>
                        <td class="h_item" style="border: 1px solid black;">Mobile No.</td>
                        <td class="h_item" style="border: 1px solid black;">Blood Group Required</td>
                        <td class="h_item" style="border: 1px solid black;">Blood Group Exchanged</td>
                    </tr>
                    <?php
                        $q=$db->query("SELECT * FROM exchange");
                        while($r1=$q->fetch(PDO::FETCH_OBJ)){
                            ?>
                            <tr class="t_row">
                                <td class="item" style="border: 1px solid black;"><?= $r1->name; ?></td>
                                <td class="item" style="border: 1px solid black;"><?= $r1->fname; ?></td>
                                <td class="item" style="border: 1px solid black;"><?= $r1->address; ?></td>
                                <td class="item" style="border: 1px solid black;"><?= $r1->city; ?></td>
                                <td class="item" style="border: 1px solid black;"><?= $r1->age; ?></td>
                                <td class="item" style="border: 1px solid black;"><?= $r1->email; ?></td>
                                <td class="item" style="border: 1px solid black;"><?= $r1->mobile; ?></td>
                                <td class="item" style="border: 1px solid black;"><?= $r1->b_group; ?></td>
                                <td class="item" style="border: 1px solid black;"><?= $r1->ex_b_group; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
			</div>
			<div id="footer"><h4>&copy; Yash Studios</h4> </div>
		</div>
	</div>
</body>
</html>