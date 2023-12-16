<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "placement");
    if(isset($_SESSION["username"]) && $_SESSION["password"]){
        $username=$_SESSION["username"];
        $password=$_SESSION["password"];
    }
        else{
            header("location:stlogin.php");
            exit();
        }
        $conn = mysqli_connect("localhost", "root", "", "placement");
        $result1 = mysqli_query($conn, "select * from staccount where username='$username' and password='$password'");
        $r1 = mysqli_fetch_assoc($result1);
        $sid = $r1["sid"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs You Applied</title>
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
        table td a{
            text-decoration: none;
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
    <center><h1>Jobs You Applied</h1></center>
    <?php
        $conn=mysqli_connect("localhost","root","","placement");
        $result=mysqli_query($conn,"select * from applicants where sid='$sid'");
        echo "<table border=1 width=100%>";
        echo "<tr><th>Student Name<th>University Register Number
        <th>Age<th>Gender<th>Course<th>Languages Known<th>Address<th>View Company
        <th>Company Name<th>Job Title<th>Location<th>Salary";
        while($row=mysqli_fetch_assoc($result)) {
            $sname=$row['sname'];
            $univregno=$row['univregno'];
            $sage=$row['sage'];
            $sgender=$row['sgender'];
            $scourse=$row['scourse'];
            $slk=$row['slk'];
            $saddress=$row['saddress'];
            $cname=$row['cname'];
            $jobtitle=$row['jobtitle'];
            $location=$row['location'];
            $salary=$row['salary'];
            $cid=$row['cid'];

            echo "<tr><td>$sname<td>$univregno<td>$sage<td>$sgender<td>$scourse<td>$slk<td>$saddress<td>
            <a href='appliedjobviewcomp.php?cid=$cid'>View</a>
            <td>$cname<td>$jobtitle<td>$location<td>$salary";
        }
        echo "</table>";
    ?>
</body>
</html>