<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "placement");
    if(isset($_SESSION["username"]) && $_SESSION["password"]){
        $username=$_SESSION["username"];
        $password=$_SESSION["password"];
        $result1 = mysqli_query($conn, "select * from staccount where username='$username' and password='$password'");
        $r1 = mysqli_fetch_assoc($result1);
        $sid = $r1["sid"];
    }
        else{
            header("location:stlogin.php");
            exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placed</title>
    <style>
        td{
            text-align: center;
        }
        .home {
            height: 100px;
        }
        .button a img:hover {
            background-color: yellow;
        }
        table{
            transform: translateY(-60px);
        }
        h1{
            transform: translateY(-60px);
        }
        body{
            background-image: url('backgroundimg1.jpg');
        }
    </style>
</head>
<body>
<div class="button">
        <a href="sthome.php"><img class="home" src="home1.png"></a>
    </div>
    <center><h1>You Have Placed</h1></center>
    <?php
    $result=mysqli_query($conn,"select * from placed where sid='$sid'");
        echo "<table border=1 width=100%>";
        echo "<tr><th>Student Name<th>University Register Number
        <th>Company Name<th>Job Title<th>Job Location<th>Salary";
        while($row=mysqli_fetch_assoc($result)) {
            $sname=$row['sname'];
            $id=$row['id'];
            $sunivregno=$row['sunivregno'];
            $sid=$row['sid'];
            $sage=$row['sage'];
            $sgender=$row['sgender'];
            $scourse=$row['scourse'];
            $slk=$row['slk'];
            $saddress=$row['saddress'];
            $cname=$row['cname'];
            $jobtitle=$row['jobtitle'];
            $clocation=$row['clocation'];
            $csalary=$row['csalary'];


            echo "<tr><td>$sname<td>$sunivregno<td>$cname<td>$jobtitle<td>$clocation<td>$csalary";
        }
        echo "</table>";
    ?>
</body>
</html>