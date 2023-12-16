<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","placement");
    if(isset($_SESSION["name"])) {
        $username=$_SESSION["name"];
    } else {
        header("location:admin.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants Placed</title>
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
        <a href="ahome.php"><img class="home" src="home1.png"></a>
    </div>
    <center><h1>Applicants Placed</h1></center>
    <?php
    $result=mysqli_query($conn,"select * from placed");
        echo "<table border=1 width=100%>";
        echo "<tr><th>Student Name<th>University Register Number
        <th>Course<th>Company Name<th>Job Title<th>Job Location<th>Salary";
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


            echo "<tr><td>$sname<td>$sunivregno<td>$scourse<td>$cname<td>$jobtitle<td>$clocation<td>$csalary";
        }
        echo "</table>";
    ?>
</body>
</html>