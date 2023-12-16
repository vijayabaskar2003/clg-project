<?php
    session_start();
    if(isset($_SESSION["companyname"]) && $_SESSION["password"]){
        $companyname=$_SESSION["companyname"];
        $password=$_SESSION["password"];
    } else {
        header("location:clogin.php");
        exit();
    }
    $conn=mysqli_connect("localhost","root","","placement");
    $result=mysqli_query($conn, "select * from caccount where companyname='$companyname' and password='$password'");
    $r=mysqli_fetch_assoc($result);
    $cid=$r["cid"];
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql="DELETE FROM applicants WHERE id='$id'";
        $query_run=mysqli_query($conn,$sql);
        if($query_run){
            ?>
            <script>
                alert("Applicant Successfully Deleted");
                window.location.href='applicants.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Applicant Not Deleted");
                window.location.href='applicants.php';
            </script>
            <?php
        }
    }



    if(isset($_GET["jid"]) && isset($_GET["sid"])){
        $jid = $_GET["jid"];
        $sid = $_GET["sid"];
    
        $result2 = mysqli_query($conn, "select * from stdetails where sid='$sid'");
        $r2 = mysqli_fetch_assoc($result2);
        $name=$r2["name"];
        $universityregno=$r2["universityregno"];
        $age=$r2["age"];
        $gender=$r2["gender"];
        $selectyourcourse=$r2["selectyourcourse"];
        $languagesknown = explode(",", $r2["languagesknown"]);
        $lk = implode(", ", $languagesknown);
        $address=$r2["address"];
        $result1 = mysqli_query($conn, "select * from jobs where id='$jid'");
        $r1 = mysqli_fetch_assoc($result1);
        $companyname=$r1['companyname'];
        $id=$r1['id'];
        $cid=$r1['cid'];
        $jobtitle=$r1['jobtitle'];
        $location=$r1['location'];
        $salary=$r1['salary'];
    
        $q="insert into placed values ('','$sid','$name','$universityregno','$age',
            '$gender','$selectyourcourse','$lk','$address','$companyname','$cid','$jobtitle','$id','$location','$salary')";
    
        $sql="DELETE FROM applicants WHERE univregno='$universityregno' and jid='$jid'";
        mysqli_query($conn,$sql);
        $result=mysqli_query($conn,$q);
        echo "<script>alert('Applicant Accepted Successfully....');</script>";
        header("refresh:1; url=http://localhost/applicants.php");
        exit();
    }
    





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applicants</title>
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
        <a href="cmodule.php"><img class="home" src="home1.png"></a>
    </div>
    <center><h1>Applicants</h1></center>
    <?php

        $result=mysqli_query($conn,"select * from applicants where cid='$cid'");
        echo "<table border=1 width=100%>";
        echo "<tr><th>Student Name<th>University Register Number
        <th>Age<th>Gender<th>Course<th>Languages Known<th>Address<th>Student Details
        <th>Company Name<th>Job Title<th>Location<th>Salary<th>Accept<th>Reject";
        while($row=mysqli_fetch_assoc($result)) {
            $sname=$row['sname'];
            $id=$row['id'];
            $univregno=$row['univregno'];
            $sid=$row['sid'];
            $sage=$row['sage'];
            $sgender=$row['sgender'];
            $scourse=$row['scourse'];
            $slk=$row['slk'];
            $saddress=$row['saddress'];
            $cname=$row['cname'];
            $jid=$row['jid'];
            $jobtitle=$row['jobtitle'];
            $location=$row['location'];
            $salary=$row['salary'];

            echo "<tr><td>$sname<td>$univregno<td>$sage<td>$sgender<td>$scourse<td>$slk<td>$saddress
            <td><a href='cviewstudent.php?sid=$sid'>View</a>
            <td>$cname<td>$jobtitle<td>$location<td>$salary
            <td><a href='applicants.php?jid=$jid&&sid=$sid'>Accept</a><td><a href='applicants.php?id=$id'>Reject</a>";
        }
        echo "</table>";
    ?>
</body>
</html>