<?php
	session_start();
    $conn = mysqli_connect("localhost", "root", "", "placement");
    if(isset($_SESSION["username"]) && $_SESSION["password"]){
        $username=$_SESSION["username"];
        $password=$_SESSION["password"];
    }
    else{
        header("location:clogin.php");
        exit();
    }
    if(isset($_GET["cid"])){
        $cid = $_GET["cid"];
        $result2 = mysqli_query($conn, "select * from cdetails where cid='$cid'");
        $r2 = mysqli_fetch_assoc($result2);
        $cid = $r2["cid"];
        $companyname = $r2["companyname"];
        $email = $r2["email"];
        $gst = $r2["gst"];
        $url = $r2["url"];
        $phone = $r2["phone"];
        $address = $r2["address"];
        $logo = $r2["logo"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Details</title>
    <style>
        img{
            max-height: 200px;
        }
        td{
            text-align: center;
            font-size: 15pt;

        }
        table{
            height: 80%;
            transform: translateY(-10px);
        }
        .home{
            height: 100px;
        }
        a img:hover{
			background-color: yellow;
		}
        body{
            /*background-color: lightgray;*/
            background-image: url('backgroundimg1.jpg');
        }
        h1{
            transform: translateY(-60px);
        }
    </style>
</head>
<body>
<a href="jobsforstudent.php"> <img class="home" src="home1.png"></a>
    <center><h1>Company Details<h1>
    <table border="1"  width="90%">
        <tr><td>Company Name : <td><br><?php echo $companyname; ?><br><br>
        <tr><td>Company Logo : <td><br><img src="<?php echo $logo; ?>"><br><br>
        <tr><td>Email Id : <td><br><?php echo $email; ?><br><br>
        <tr><td>GST Number : <td><br><?php echo $gst; ?><br><br>
        <tr><td>Website Url : <td><br><?php echo $url; ?><br><br>
        <tr><td>Phone Number :<td><br> <?php echo $phone; ?><br><br>
        <tr><td>Address : <td><br><?php echo $address; ?><br><br>
    </table>
</body>
</html>