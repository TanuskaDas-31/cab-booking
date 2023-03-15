<?php
require('config.php');
session_start();

if(isset($_POST['login']))
{
    // $username = mysqli_real_escape_string($conn , $_POST['username']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $select = "SELECT * FROM logged WHERE  email = '$email' AND  password = '$password'";

    $result = mysqli_query($conn , $select);
	$fetch_data = mysqli_fetch_assoc($result); 
    if(mysqli_num_rows($result) > 0)
    {
		$_SESSION['id']=$fetch_data['id'];
		header('location:index.php');
    }
    else
    {
		echo"
            <script>
                alert('incorrect email or password');
                window.location.href = 'login.php';
            </script>
        ";
		
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link rel = "stylesheet" href = "login.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action = "register.php" method = "post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required="">
					<button name="register">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action = "" method = "post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
					<button name = "login">Login</button>
				</form>
			</div>
	</div>
</body>
</html>