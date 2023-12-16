<?php
    session_start();
    if(isset($_SESSION["name"])){
        header("location:ahome.php");
        exit();
    }
    $conn=mysqli_connect("localhost","root","","placement");
    if(isset($_POST["login"])){
        $name=$_POST["name"];
        $pfno=$_POST["pfno"];
        $password=$_POST["password"];
        $q="select * from adminlogin where name='$name' and pfno='$pfno' and password='$password'";
        $result=mysqli_query($conn, $q);
        if(mysqli_num_rows($result)>0){
			$_SESSION['name'] = $name;
			header("location:ahome.php");
			exit;
        }
        else{
           echo "Username or Password Does Not Match";
        }
    }
?>
<html>
    <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
        <style>
            body {
			font-family: Arial;
			background-image: url('log1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height:620px;
		}
		h1 {
			margin-top: 50px;
			text-shadow: 2px 2px -1px black;
			background-color: yellow;
			width: 220px;
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
			display: flex;
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
			float: left;
			transform: translateY(-95px);
		}
        </style>
        <body>
            <center>
            <h1> Admin Login</h1>
    <table>
		<tr>
            <td><a href="index.html"> <img class="home" src="home1.png"></a></td><td><td><td><td><td>
		</tr>
	</table>
            <form method=POST action="">
                <label>Username:</label>
		        <input type="text" name=name placeholder="Enter Name">

                <label>Pf No:</label>
		        <input type="text" name=pfno placeholder="Last 3 Digit">

		        <label>Password:</label>
		        <input type="password" name=password placeholder="Enter your password">

		        <input type="submit" value="Login" name=login>
            </form>
        </body>
    </head>
</html>
