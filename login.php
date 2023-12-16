<?php
    $conn=mysqli_connect("localhost","root","","placement");
    if(isset($_POST["login"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $q="select * from stregister where username='$username' and password='$password'";
        $result=mysqli_query($conn, $q);
        if(mysqli_num_rows($result)>0){
            echo "Username $username is login Successfully";
        }
        else{
           echo "Username or Password Does Not Match";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Placement Management System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
		body {
			font-family: Arial;
			background-image: url('jobc.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height:620px;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		form {
			margin: 50px auto;
			max-width: 300px;
			background-color: white;
			padding: 50px;
			border-radius: 40px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
		}
		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
		}
		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
		}
		input[type="submit"] {
			display: block;
			width: 100%;
			padding: 10px;
			background-color: green;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color:  #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Placement Management System</h1>
	<form method=POST action="">
		<label>Username:</label>
		<input type="text" name=username placeholder="Enter your username">

		<label>Password:</label>
		<input type="password" name=password placeholder="Enter your password">

		<input type="submit" value="Login" name=login>
	</form>
</body>
</html>