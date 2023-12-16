<?php
    session_start();
	if(isset($_SESSION["username"]) && $_SESSION["password"]){
        $username=$_SESSION["username"];
		$password=$_SESSION["password"];
	}
        else{
            header("location:stlogin.php");
            exit();
        }
        if(isset($_POST["logout"])){
            unset($_SESSION["username"]);
			unset($_SESSION["password"]);
            header("location:index.html");
        }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Home</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		.container {
			display: flex;
			flex-direction: row;
		}

		.sidebar {
			background-color: #f2f2f2;
			height: 70vh;
			width: 200px;
			padding: 20px;
			box-sizing: border-box;
		}

		.sidebar h2 {
			margin-top: 0;
		}

		.sidebar ul {
			list-style-type: none;
			padding: 0;
			margin: 0;
		}

		.sidebar li {
			margin-bottom: 10px;
		}

		.sidebar a {
			display: block;
			padding: 10px;
			background-color: #fff;
			color: #333;
			text-decoration: none;
			border-radius: 5px;
		}

		.sidebar a:hover {
			background-color: #333;
			color: #fff;
		}

		.main {
			padding: 20px;
			box-sizing: border-box;
			flex-grow: 1;
			background-color: darkgrey;
		}

		.main h2 {
			margin-top: 0;
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
			background-color: red;
		}
		.header img{
            width: 100%;
            height: 200px;
            }
            .header{
                background-color: #007bff;
                width: 100%;
            }
	</style>
</head>
<body>
<div class="header">
        <img src="sp1.jpg" alt="Jawahar Science College">
        </div>

	<div class="container">
		<div class="sidebar">
			<h2>Menu</h2>
			<ul>
				<li><a href="stdetails.php">Student Register</a></li>

				<li><a href="addmarksheet.php">Add Marksheet</a></li>

				<li><a href="viewstdetails.php">View Student Details</a></li>
				<li><a href="jobsforstudent.php">view Job Offer</a></li>
				<li><a href="viewappliedjobs.php">Jobs You Applied</a></li>
				<li><a href="stplaced.php">Placed</a></li>
					<form method=POST action="">
                		<input type=submit value=logout name=logout>
           			</form>
				</li>
			</ul>
		</div>

		<div class="main">
			<h1><center>
            <?php
                echo "Welcome $username!";
            ?>
			</h1>
		</div>
	</div>
</body>
</html>