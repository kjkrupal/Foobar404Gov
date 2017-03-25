<?php 
	session_start();
	include 'dbConfig.php';
	
	if(isset($_SESSION['user_id'])!="") {
    	header("Location: home.php");
	}

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$fetchUsers = $db->query("SELECT * FROM login WHERE username='".$username."' AND password='".$password."'");
		
		if($fetchUsers->num_rows > 0){
			while($row = $fetchUsers->fetch_assoc()){
				$_SESSION['user_id'] = $row['user_id'];
        		$_SESSION['username'] = $row['username'];
				header("location: home.php");
			}
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
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php if(isset($message)) echo $message; ?>

	<div class="col-lg-6">
	<div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">

            <form method="POST" action="login.php">

            	<div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
				
			<input type="submit" name="submit" value="Login">
		</form>
        </div>
        </div>
    </div>
	
	

	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
