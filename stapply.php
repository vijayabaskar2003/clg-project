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
        if(isset($_POST["logout"])){
            unset($_SESSION["username"]);
            unset($_SESSION["password"]);
            header("location:index.html");
        }
        if(isset($_GET["id"]) && ($_GET["sid"])){
            $id = $_GET["id"];
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

            $result1 = mysqli_query($conn, "select * from jobs where id='$id'");
            $r1 = mysqli_fetch_assoc($result1);
            $companyname=$r1['companyname'];
            $id=$r1['id'];
            $cid=$r1['cid'];
            $jobtitle=$r1['jobtitle'];
            $location=$r1['location'];
            $salary=$r1['salary'];

                $q="insert into applicants values ('','$sid','$name','$universityregno','$age',
                    '$gender','$selectyourcourse','$lk','$address','$companyname','$cid','$id','$jobtitle','$location','$salary')";
                $result=mysqli_query($conn,$q);
            echo "<script>alert('You Have Successfully Applied For Job');</script>";
            header("refresh:1; url=http://localhost/sthome.php");
            exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
</head>
<body>
</body>
</html>