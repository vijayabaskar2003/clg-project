<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "placement");
if(isset($_SESSION["companyname"]) && isset($_SESSION["password"])){
    $companyname=$_SESSION["companyname"];
    $password=$_SESSION["password"];
}
else{
    header("location:clogin.php");
    exit();
}

if (isset($_GET["cid"])) {
	$cid = $_GET["cid"];
	$result2 = mysqli_query($conn, "select * from cdetails where cid='$cid'");
	$r2 = mysqli_fetch_assoc($result2);
	if ($r2) {
		$companyname = $r2["companyname"];
		$email = $r2["email"];
		$gst = $r2["gst"];
		$url = $r2["url"];
		$phone = $r2["phone"];
		$address = $r2["address"];
		$logo = $r2["logo"];
	} else {
		header("location:viewcd.php");
		exit();
	}
}

if(isset($_POST['update'])) {
    $newLogo = '';
    if($_FILES['logo']['name'] != '') {
        $target_dir = "logos/";
        $target_file = $target_dir . basename($_FILES["logo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if(!in_array($imageFileType, $allowedTypes)) {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
            exit();
        }
        if(move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            $newLogo = $_FILES["logo"]["name"];
        } else {
            echo "Error uploading file.";
            exit();
        }
    }
    $companyname = $_POST["companyname"];
    $email = $_POST["email"];
    $gst = $_POST["gst"];
    $url = $_POST["url"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $updateQuery = "UPDATE cdetails SET companyname='$companyname', email='$email', gst='$gst', url='$url', phone='$phone', address='$address'";
    if($newLogo != '') {
        $updateQuery .= ", logo='$newLogo'";
    }
    $updateQuery .= " WHERE cid='$cid'";
    if(mysqli_query($conn, $updateQuery)) {
        header("Location:viewcd.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Company Details</title>
	<style>
        body {
			background-image: url('f1.jpg');
            background-repeat: no-repeat;
            height:620px;
		}
        h1 {
			margin-top: 5px;
			text-shadow: 2px 2px -1px black;
			background-color: yellow;
			width: 350px;
			border-radius: 10px;
			border-color: black;
            transform: translatex(555px);
		}
		form {
			margin: 20px auto;
			max-width: 400px;
			background-color: white;
			padding: 50px;
			border-radius: 40px;
			transform: translateY(-95px);
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
        .home{
            height: 100px;
        }
        a img:hover{
			background-color: yellow;
		}
        body{
            background-color: lightgray;
        }
        h1{
            transform: translateY(-100px);
        }
</style>
</head>
<body>
<a href="cmodule.php"> <img class="home" src="home1.png"></a>


    <center><h1>Update Company Details</h1>
	<form method="POST" action="" enctype="multipart/form-data">
            <label>Company Name:</label>
		    <input type="text" name="companyname" value="<?php echo $companyname; ?>">

            <label>Email Id :</label>
		    <input type="email" name="email" value="<?php echo $email; ?>">

            <label>GST Number :</label>
		    <input type="text" name="gst" value="<?php echo $gst; ?>">

            <label>WebSite URL :</label>
		    <input type="text" name="url" value="<?php echo $url; ?>">

            <label>Phone Number :</label>
		    <input type="text" name="phone" value="<?php echo $phone; ?>">

            <label>Address :</label>
		    <input type="text" name="address" value="<?php echo $address; ?>">

            <label>Upload Your LOGO :</label>
		    <input type="file" value="<?php echo $logo; ?>"><br><br><br>

		    <input type="submit" value="update" name="update">
        </form>
</body>
</html>