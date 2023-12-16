<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","placement");
    if(isset($_SESSION["name"])) {
        $username=$_SESSION["name"];
    } else {
        header("location:admin.php");
        exit();
    }
    if(isset($_POST["logout"])){
        unset($_SESSION["name"]);
        header("location:index.html");
    }
    if(isset($_GET["cid"])){
        $cid = $_GET["cid"];
        $sql="DELETE FROM applicants WHERE cid='$cid'";
        $query_run=mysqli_query($conn,$sql);
        if($query_run){
            ?>
            <script>
                alert("Applicant Successfully Deleted");
                window.location.href='viewallapplicants.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Job Not Deleted");
                window.location.href='viewallapplicants.php';
            </script>
            <?php
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Applicants</title>
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
        <a href="ahome.php"><img class="home" src="home1.png"></a>
    </div>
    <center><h1>Applicants</h1></center>
    <?php

        $result=mysqli_query($conn,"select * from applicants");
        echo "<table border=1 width=100%>";
        echo "<tr><th>Student Name<th>University Register Number
        <th>Age<th>Gender<th>Course<th>Languages Known<th>Address<th>Mark Details
        <th>Company Name<th>Job Title<th>Location<th>Salary<th>Delete";
        while($row=mysqli_fetch_assoc($result)) {
            $sname=$row['sname'];
            $univregno=$row['univregno'];
            $sage=$row['sage'];
            $sgender=$row['sgender'];
            $scourse=$row['scourse'];
            $slk=$row['slk'];
            $saddress=$row['saddress'];
            $cname=$row['cname'];
            $cid=$row['cid'];
            $jobtitle=$row['jobtitle'];
            $location=$row['location'];
            $salary=$row['salary'];

            echo "<tr><td>$sname<td>$univregno<td>$sage<td>$sgender<td>$scourse<td>$slk<td>$saddress
            <td><a href='applicantmarks.php?univregno=$univregno'>View</a>
            <td>$cname<td>$jobtitle<td>$location<td>$salary<td><a href='viewallapplicants.php?cid=$cid'>Delete</a>";
        }
        echo "</table>";
    ?>
</body>
</html>