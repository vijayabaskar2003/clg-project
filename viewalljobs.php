<?php
    session_start();
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
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql="DELETE FROM jobs WHERE id='$id'";
        $query_run=mysqli_query($conn,$sql);
        if($query_run){
            ?>
            <script>
                alert("Job Successfully Deleted");
                window.location.href='viewalljobs.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Job Not Deleted");
                window.location.href='viewalljobs.php';
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
    <title>View All Jobs</title>
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
    <center><h1>All Company Jobs</h1></center>
    <?php
        $conn=mysqli_connect("localhost","root","","placement");
        $result=mysqli_query($conn,"select * from jobs");
        echo "<table border=1 width=100%>";
        echo "<tr><th>Company Name<th>Job Title<th>Skills<th>Location<th>Salary<th>CGPA<th>Job Description<th>Last Date To Apply<th>Delete";
        while($row=mysqli_fetch_assoc($result)) {
            $id=$row['id'];
            $cid=$row['cid'];
            $companyname=$row['companyname'];
            $jobtitle=$row['jobtitle'];
            $skills=$row['skills'];
            $location=$row['location'];
            $salary=$row['salary'];
            $cgpa=$row['cgpa'];
            $jdesc=$row['jdesc'];
            $date=$row['date'];

            echo "<tr><td>$companyname<td>$jobtitle<td>$skills<td>$location<td>$salary
            <td>$cgpa<td>$jdesc<td>$date<td><a href='viewjob.php?id=$id'>Delete</a>";
        }
        echo "</table>";
    ?>
</body>
</html>