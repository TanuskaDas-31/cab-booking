<?php 
require('config.php');


if(isset($_POST['register']))
{
    $username = mysqli_real_escape_string($conn , $_POST['username']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $select = "SELECT * FROM  logged  WHERE username = '$username' OR email = '$email'";

    $result = mysqli_query($conn , $select);

    if(mysqli_num_rows($result)==0)
    {
	if($pass != $cpass)
        {
            // $error[]="password not matched"; 
            echo"
                <script>
                    alert('password not matched');
                    window.location.href = 'login.php';
                </script>
            ";
        }
        else
        {
            $insert = "INSERT INTO logged ( username , email , password) VALUES ( '$username' , '$email' , '$password')";
            mysqli_query($conn , $insert);
            header('location:login.php');
        }
	}
    else
    {
		// $error[]="user already exists";
        echo"
            <script>
                alert('user already exists');
                window.location.href = 'login.php';
            </script>
    	";
	}
}
?>
