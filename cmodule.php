<?php
    session_start();
	if(isset($_SESSION["companyname"]) && $_SESSION["password"]){
        $companyname=$_SESSION["companyname"];
		$password=$_SESSION["password"];
	}
        else{
            header("location:clogin.php");
            exit();
        }
        if(isset($_POST["logout"])){
            unset($_SESSION["companyname"]);
			unset($_SESSION["password"]);
            header("location:index.html");
        }
		$conn=mysqli_connect("localhost","root","","placement");
		$result=mysqli_query($conn, "select * from caccount where companyname='$companyname' and password='$password'");
		$r=mysqli_fetch_assoc($result);
		$cid=$r["cid"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Company Home</title>
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

			background-image: url('#');
			background-repeat: no-repeat;
			background-size: cover;
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
			h1{
            transform: translateY(-35px);
        }
	</style>
</head>
<body>
<div class="header">
        <img src="placement.jpg" alt="Jawahar Science College">
        </div>
	<div class="container">
		<div class="sidebar">
			<h2>Menu</h2>
			<ul>
				<li><a href="cdetails.php">Register Company</a></li>
				<li><a href="viewcd.php">View Company Details</a></li>
				<li><a href="addjob.php">Add Job Offer</a></li>
				<li><a href="viewjob.php">View Job Offers</a></li>
				<li><a href="applicants.php">View Applicants</a></li>
				<li><a href="applicantsaccepted.php">Applicants Accepted</a></li><br>
					<form method=POST action="">
                		<input type=submit value=logout name=logout>
           			</form>
				</li>
			</ul>
		</div>

		<div class="main">
			<h1><center>
            <?php
                echo "Welcome $companyname!";
            ?>
			</h1>
		</div>
	</div>
</body>

</html>
<?php
	$conn=mysqli_connect("localhost","root","","placement");
	$result=mysqli_query($conn, "select * from cdetails where companyname='$companyname'");
	$r=mysqli_fetch_assoc($result);
	$gst=$r["gst"];
	if($gst !=""){
		exit();
	}
	else{
		echo "<script>alert('Please Register Your Company First');</script>";
		header("refresh:1; url=http://localhost/cdetails.php");
		exit();

	}
?>
