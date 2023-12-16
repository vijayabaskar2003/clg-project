<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","placement");
    if(isset($_POST["register"])){
        $username=$_POST["username"];
        $rollno=$_POST["rollno"];
        $email=$_POST["email"];
        $password=$_POST["password"];
		if($username !="" && $rollno !="" && $email !="" && $password !="")
		{
        $q="select * from staccount where username='$username'";
        $result=mysqli_query($conn,$q);
		if(mysqli_num_rows($result)==0){
            $q="insert into staccount values ('','$username','$rollno','$email','$password')";
            $result=mysqli_query($conn,$q);
			echo "<script>alert('User $username is created successfully');</script>";
			?>
			<meta http-equiv="refresh" content="1; url=http://localhost/stlogin.php"/>
			<?php
        }
        else
        echo "<script>alert('User Name already exists... Try some other name');</script>";
    }
	else{
		echo "<script>alert('Please Fill All The Details...');</script>";
	}
}
?>

<html>
    <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Account Creation</title>
	    <style>
            body {
			background-image: url('bg3.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height:620px;
		}
        h1 {
			margin-top: 10px;
			text-shadow: 2px 2px -1px black;
			background-color: yellow;
			width: 270px;
			border-radius: 10px;
			border-color: black;
		}
		form {
			margin: 20px auto;
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
		input[type="text"], input[type="password"], input[type="box"], input[type="email"]{
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
        table tr td a img{
			height: 80px;
		}
		table{
			float: right;
			transform: translateY(-60px);
		}
        a img:hover{
			background-color: yellow;
		}
        </style>
        <body><center>
            <h1>Create Account</h1>

    <table>
		<tr>
            <td><a href="index.html"> <img class="home" src="home1.png"></a></td><td><td><td><td><td>
            <td><a href="stlogin.php"> <img class="register" src="login.png"></a></td>
		</tr>
	</table>
        <form method=POST action="">
        <label>Username:</label>
		<input type="text" name=username placeholder="Enter your username">

		<label>Roll No :</label>
		<input type="box" name=rollno placeholder="Enter your roll no">

		<label>Email Id :</label>
		<input type="email" name=email placeholder="Enter your Email Id">

		<label>Password :</label>
		<input type="password" name=password placeholder="Enter your password">

		<input type="submit" value="register" name=register>
            </form>
        </body>
    </head>
</html>