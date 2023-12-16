<?php
	session_start();
    error_reporting(0);
    if(isset($_SESSION["username"]) && $_SESSION["password"]){
        $username=$_SESSION["username"];
        $password=$_SESSION["password"];
    }
    else{
        header("location:clogin.php");
        exit();
    }

    $conn = mysqli_connect("localhost", "root", "", "placement");
    $result1 = mysqli_query($conn, "select * from staccount where username='$username' and password='$password'");
    $r1 = mysqli_fetch_assoc($result1);
    $sid = $r1["sid"];

    $result2 = mysqli_query($conn, "select * from stdetails where sid='$sid'");
    $r2 = mysqli_fetch_assoc($result2);
    $sid=$r2["sid"];
    $universityregno=$r2["universityregno"];
    $name=$r2["name"];
    $age=$r2["age"];
    $dateofbirth= date('y-m-d', strtotime($r2['dateofbirth']));
    $phoneno=$r2["phoneno"];
    $email=$r2["email"];
    $gender=$r2["gender"];
    $address=$r2["address"];
    $languagesknown = explode(",", $r2["languagesknown"]);
    $lk = implode(", ", $languagesknown);
    $selectyourcourse=$r2["selectyourcourse"];


    $result2 = mysqli_query($conn, "select * from marksheet where sid='$sid'");
    $r2 = mysqli_fetch_assoc($result2);
    $sem1 = $r2["sem1"];
    $sem2 = $r2["sem2"];
    $sem3 = $r2["sem3"];
    $sem4 = $r2["sem4"];
    $sem5 = $r2["sem5"];
    $sem6 = $r2["sem6"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>
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
            background-color: lightgray;
        }
        h1{
            transform: translateY(-60px);
        }
        /*.mark table img{
            max-height: 700px;
        }*/
        .mark table img{
            width: 90%;
            max-height: 700px;
        }
    </style>
</head>
<body>
    <a href="sthome.php"> <img class="home" src="home1.png"></a>
    <center><h1>Student Details<h1>
    <table border="1"  width="90%">
        <tr><td>University Register Number : <td><br><?php echo $universityregno; ?><br><br>
        <tr><td>Name : <td><br><?php echo $name; ?><br><br>
        <tr><td>Age : <td><br><?php echo $age; ?><br><br>
        <tr><td>Date Of Birth : <td><br><?php echo $dateofbirth; ?><br><br>
        <tr><td>Phone Number : <td><br><?php echo $phoneno; ?><br><br>
        <tr><td>Email Id :<td><br> <?php echo $email; ?><br><br>
        <tr><td>Gender : <td><br><?php echo $gender; ?><br><br>
        <tr><td>Address : <td><br><?php echo $address; ?><br><br>
        <tr><td>Languages Known : <td><br><?php echo $lk; ?><br><br>
        <tr><td>Course : <td><br><?php echo $selectyourcourse; ?><br><br>
    </table>
    <br>
    <div class="mark">
    <center><h3> Mark Details<h3>
    <table border="1"  width="90%">
        <tr><td>Semester 1 : <td><br><img src="<?php echo $sem1; ?>"><br><br>
        <tr><td>Semester 2 : <td><br><img src="<?php echo $sem2; ?>"><br><br>
        <tr><td>Semester 3 : <td><br><img src="<?php echo $sem3; ?>"><br><br>
        <tr><td>Semester 4 : <td><br><img src="<?php echo $sem4; ?>"><br><br>
        <tr><td>Semester 5 : <td><br><img src="<?php echo $sem5; ?>"><br><br>
        <tr><td>Semester 6 : <td><br><img src="<?php echo $sem6; ?>"><br><br>
    </table>

    </div>
</body>
</html>