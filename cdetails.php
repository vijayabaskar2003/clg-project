<?php
session_start();
error_reporting(0);
if(isset($_SESSION["companyname"]) && $_SESSION["password"]){
	$companyname=$_SESSION["companyname"];
	$password=$_SESSION["password"];
} else {
    header("location:clogin.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "placement");
$result1 = mysqli_query($conn, "select * from caccount where companyname='$companyname' and password='$password'");
$r1 = mysqli_fetch_assoc($result1);
$cid = $r1["cid"];


$conn = mysqli_connect("localhost","root","","placement");
if(isset($_POST["register"])) {
    $filename = $_FILES["logo"]["name"];
    $tempname = $_FILES["logo"]["tmp_name"];
    $folder = "logo/".$filename;

    if(move_uploaded_file($tempname, $folder)) {
        $companyname = $_POST["companyname"];
        $email = $_POST["email"];
        $gst = $_POST["gst"];
        $url = $_POST["url"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
		$logo =$folder;

        if($companyname !="" && $email !="" && $gst !="" && $url !="" && $phone !="" && $address !="" && $logo !="") {
            $q = "select * from cdetails where companyname='$companyname' and cid='$cid' ";
            $result = mysqli_query($conn, $q);

            if(mysqli_num_rows($result) == 0) {
                $q = "insert into cdetails values ('','$cid','$companyname','$email','$gst','$url','$phone','$address','$logo')";
                $result = mysqli_query($conn, $q);
                echo "<script>alert('$companyname Details are saved successfully');</script>";
                header("refresh:0.1; url=http://localhost/cmodule.php");
                exit();
            } else {
                echo "<script>alert('Try Again...');</script>";
            }
        } else {
            echo "<script>alert('Please Fill All The Details...');</script>";
        }
    } else {
        echo "<script>alert('Error uploading file...');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Company Details</title>
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
			width: 240px;
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
</head>
<body>
<h1>Company Details</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <label>Company Name:</label>
		    <input type="text" name="companyname" placeholder="Enter Company Name">

            <label>Email Id :</label>
		    <input type="email" name="email" placeholder="Enter Email Id">

            <label>GST Number :</label>
		    <input type="text" name="gst" placeholder="Enter GST Number">

            <label>WebSite URL :</label>
		    <input type="text" name="url" placeholder="Enter Website URL">

            <label>Phone Number :</label>
		    <input type="text" name="phone" placeholder="Enter Phone Number">

            <label>Address :</label>
		    <input type="text" name="address" placeholder="Enter Company Address">

            <label>Upload Your LOGO :</label>
		    <input type="file" name="logo"><br><br><br>

		    <input type="submit" value="register" name="register">
        </form>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","placement");
	$result=mysqli_query($conn, "select * from cdetails where companyname='$companyname'");
	$r=mysqli_fetch_assoc($result);
	$gst=$r["gst"];
	if($gst !=""){
        echo "<script>alert('You Have Already Registered');</script>";
		header("refresh:1; url=http://localhost/cmodule.php");
		exit();
	}
	else{
		exit();
	}
?>
