<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","placement");
    if(isset($_SESSION["companyname"]) && $_SESSION["password"]){
        $companyname=$_SESSION["companyname"];
        $password=$_SESSION["password"];

        $result=mysqli_query($conn, "select * from caccount where companyname='$companyname' and password='$password'");
        $r=mysqli_fetch_assoc($result);
        $cid=$r["cid"];
    } else {
        header("location:clogin.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accepted</title>
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
        <a href="cmodule.php"><img class="home" src="home1.png"></a>
    </div>
    <center><h1>Selected Applicants</h1></center>
    <?php
    $result=mysqli_query($conn,"select * from placed where cid='$cid'");
        echo "<table border=1 width=100%>";
        echo "<tr><th>Student Name<th>University Register Number
        <th>Age<th>Gender<th>Course<th>Languages Known<th>Address";
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


            echo "<tr><td>$sname<td>$sunivregno<td>$sage<td>$sgender<td>$scourse<td>$slk<td>$saddress";
        }
        echo "</table>";
    ?>
</body>
</html>