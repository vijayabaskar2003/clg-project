<?php 
session_start();
if(isset($_SESSION["companyname"]) && isset($_SESSION["password"])){
    $companyname=$_SESSION["companyname"];
    $password=$_SESSION["password"];
}
else{
    header("location:clogin.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "placement");
$result1 = mysqli_query($conn, "SELECT * FROM caccount WHERE companyname='$companyname' AND password='$password'");
$r1 = mysqli_fetch_assoc($result1);
$cid = $r1["cid"];

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql="DELETE FROM jobs WHERE id='$id' AND cid='$cid'";
    $query_run=mysqli_query($conn,$sql);
    if($query_run){
        ?>
        <script>
            alert("Job Successfully Deleted");
            window.location.href='viewjob.php';
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("Job Not Deleted");
            window.location.href='viewjob.php';
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
    <title>View Jobs</title>
    <style>
        .home{
            height: 100px;
        }
        a img:hover{
			background-color: yellow;
		}
        td{
            text-align: center;
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
    <a href="cmodule.php"> <img class="home" src="home1.png"></a>  
    <center>
        <h1><?php echo "$companyname Jobs"; ?></h1>
        <?php
        $result=mysqli_query($conn,"SELECT * FROM jobs WHERE companyname='$companyname' AND cid='$cid'");
        if(mysqli_num_rows($result) > 0) {
            echo "<table border=1 width=100%>";
            echo "<tr><th>Company Name<th>Job Title<th>Skills Required<th>Location<th>Salary<th>CGPA<th>
            Job Description<th>Last Date To Apply<th>Delete";
            while($row=mysqli_fetch_assoc($result))
            {
                $id=$row['id'];
                $companyname=$row['companyname'];
                $jobtitle=$row['jobtitle'];
                $skills=$row['skills'];
                $location=$row['location'];
                $salary=$row['salary'];
                $cgpa=$row['cgpa'];
                $jdesc=$row['jdesc'];
                $date=$row['date'];
                echo "<tr><td>$companyname<td>$jobtitle<td>$skills
                    <td>$location<td>$salary<td>$cgpa<td>$jdesc<td>$date<td><a href='viewjob.php?id=$id'>Delete</a>";
            }
            echo "</table>";
        } else {
            echo "<p>No jobs found.</p>";
        }
        ?>
    </center>
</body>
</html>
