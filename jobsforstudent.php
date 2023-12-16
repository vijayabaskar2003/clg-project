<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["password"]) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
} else {
    header("location:stlogin.php");
    exit();
}
if(isset($_POST["logout"])) {
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
    header("location:index.html");
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
    <title>Jobs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('backgroundimg1.jpg');
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .button {
            display: inline-block;
            margin-bottom: 20px;
        }
        .button img {
            height: 100px;
            vertical-align: middle;
        }
        .button:hover img {
            background-color: yellow;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        h1 {
            margin-top: 0;
        }
        table td a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="button">
        <a href="sthome.php"><img src="home1.png"></a>
    </div>
    <h1>All Jobs</h1>
    <?php
        $conn=mysqli_connect("localhost","root","","placement");
        $result=mysqli_query($conn,"select * from jobs");
        echo "<table>";
        echo "<tr><th>Company Name<th>Job Title<th>Skills<th>Location<th>Salary<th>CGPA<th>Job Description
        <th>Last Date To Apply<th>Company Details<th>Apply";
        while($row=mysqli_fetch_assoc($result)) {
            $companyname=$row['companyname'];
            $id=$row['id'];
            $jobtitle=$row['jobtitle'];
            $skills=$row['skills'];
            $location=$row['location'];
            $salary=$row['salary'];
            $cgpa=$row['cgpa'];
            $jdesc=$row['jdesc'];
            $date=$row['date'];
            $cid=$row['cid'];

            echo "<tr><td>$companyname<td>$jobtitle<td>$skills<td>$location<td>$salary<td>$cgpa<td>$jdesc<td>$date
            <td><a href='stviewcompany.php?cid=$cid'>View</a>
            <td><a href='stapply.php?id=$id&&sid=$sid'>Apply</a>";
        }
        echo "</table>";
   ?>
</div>   
</body>
</html>
