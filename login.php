<?php 
	session_start();
	include 'dbConfig.php';
	
	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$fetchUsers = $db->query("SELECT * FROM login WHERE username=".$username." AND password=".$password);
		if($fetchUsers->num_rows > 0){
			header("location: home.php");
		}
		else{
			$message = "Invalid username or password. Please try again!";
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<?php if(isset($message)) echo $message; ?>
	<table>
		<form method="POST" action="login.php">
			<tr><td>Username:</td><td><input type="text" name="username" /></td></tr>
			<tr><td>Password:</td><td><input type="Password" name="password" /></td></tr>
			<tr><td><input type="submit" name="submit" value="Login"></td></tr>
		</form>
	</table>
</body>
</html>