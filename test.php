<?php 
	include 'dbConfig.php'; 
	session_start();
	
	if(isset($_POST['submit'])){

		$fullname = mysqli_real_escape_string($db, $_POST['name']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$area = mysqli_real_escape_string($db, $_POST['area']);
		$device = mysqli_real_escape_string($db, $_POST['device']);
		
		$db->query("INSERT INTO collector (Name,username,password,phone,area,device_id) VALUES ('$fullname','$username','$password','$phone','$area','$device')");

	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
<form action="test.php" method="POST">
	Name<input type="text" name="name"><br>
	Username<input type="text" name="username"><br>
	Password<input type="text" name="password"><br>
	Phone<input type="number" name="phone"><br>
	Area<input type="text" name="area"><br>
	Device<input type="text" name="device"><br>
	<input type="submit" name="submit">
</form>
</body>
</html>