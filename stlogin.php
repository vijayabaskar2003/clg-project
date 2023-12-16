<?php
    session_start();
	if(isset($_SESSION["companyname"]) && $_SESSION["password"]){
        header("location:sthome.php");
        exit();
    }
    $conn=mysqli_connect("localhost","root","","placement");
	if(isset($_POST["login"])){
		$username=$_POST['username'];
		$password=$_POST['password'];
        $q="select * from staccount where username='$username' and password='$password'";
        $result=mysqli_query($conn, $q);
        if(mysqli_num_rows($result)>0){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['status']="User $username has logged-in successfully";
				header('location:sthome.php');
			}
        else{
		   echo "<script>alert('Username or Password Does Not Match');</script>";
        }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Login</title>
<style>
		body {
			font-family: Arial;
			background-image: url('bg3.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height:620px;
		}
		h1 {
			margin-top: 50px;
			text-shadow: 2px 2px -1px black;
			background-color: yellow;
			width: 270px;
			border-radius: 10px;
			border-color: black;
		}
		form {
			margin: 50px auto;
			max-width: 300px;
			background-color: white;
			padding: 50px;
			border-radius: 40px;
			box-shadow: 0px 0px 5px 1px black;
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
		a img:hover{
			background-color: yellow;
		}
		table tr td a img{
			height: 80px;
		}
		table{
			float: right;
			transform: translateY(-95px);
		}

	</style>
</head>
<body>
	<center><h1>STUDENT LOGIN</h1></center>
	<table>
		<tr>
    <td><a href="index.html"> <img class="home" src="home1.png"></a></td><td><td><td><td><td>
    <td><a href="stregister.php"> <img class="register" src="register.png"></a></td>
		</tr>
	</table>
	<form method=POST action="">
		<label>Username:</label>
		<input type="text" name=username placeholder="Enter your username">

		<label>Password:</label>
		<input type="password" name=password placeholder="Enter your password">

		<input type="submit" value="Login" name=login>
	</form>
</body>
</html>