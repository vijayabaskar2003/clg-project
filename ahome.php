<?php
    session_start();
    if(isset($_SESSION["name"]))
        $username=$_SESSION["name"];
        else{
            header("location:admin.php");
            exit();
        }
        if(isset($_POST["logout"])){
            unset($_SESSION["name"]);
            header("location:index.html");
        }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
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

			background-image: url('adminh.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}

		.main h1 {
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
            height: 193px;
            }
            .header{
                background-color: #007bff;
                width: 100%;
            }
	</style>
</head>
<body>
<div class="header">
        <img src="sp2.jpg" alt="Jawahar Science College">
        </div>

	<div class="container">
		<div class="sidebar">
			<h2>Menu</h2>
			<ul>
                <li><a href="viewallstudents.php">View All Students</a></li><br>
                <li><a href="viewallcompany.php">View All Company</a></li><br>
				<li><a href="viewalljobs.php">View All Jobs</a></li><br>
				<li><a href="viewallapplicants.php">View All Applicants</a></li><br>
				<li><a href="viewallplaced.php">View All Placed</a></li><br><br>
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
		</div>
	</div>
</body>
</html>