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
    exit();
}
if(isset($_GET["sid"])){
    $conn=mysqli_connect("localhost","root","","placement");
    $sid = $_GET["sid"];
    $sql="DELETE FROM staccount WHERE sid='$sid'";
    $sql1="DELETE FROM stdetails WHERE sid='$sid'";
    $sql2="DELETE FROM marksheet WHERE sid='$sid'";


    $result = mysqli_query($conn, "SELECT * FROM marksheet WHERE Sid='$sid'");
    $row = mysqli_fetch_assoc($result);
    $sem1 = $row["sem1"];
    $sem2 = $row["sem2"];
    $sem3 = $row["sem3"];
    $sem4 = $row["sem4"];
    $sem5 = $row["sem5"];
    $sem6 = $row["sem6"];
    $q = "DELETE FROM marksheet WHERE Sid='$sid'";
    if(mysqli_query($conn, $q)) {
        if(!empty($sem1) && file_exists($sem1)) {
            unlink($sem1);
        }
        if(!empty($sem2) && file_exists($sem2)) {
            unlink($sem2);
        }
        if(!empty($sem3) && file_exists($sem3)) {
            unlink($sem3);
        }
        if(!empty($sem4) && file_exists($sem4)) {
            unlink($sem4);
        }
        if(!empty($sem5) && file_exists($sem5)) {
            unlink($sem5);
        }
        if(!empty($sem6) && file_exists($sem6)) {
            unlink($sem6);
        }
    $query_run=mysqli_query($conn,$sql);
    $query_run1=mysqli_query($conn,$sql1);
    $query_run2=mysqli_query($conn,$sql2);
    if($query_run && $query_run1 && $query_run2){
        ?>
        <script>
            alert("Student Successfully Deleted");
            window.location.href='viewallstudents.php';
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("Student Not Deleted");
            window.location.href='viewallstudents.php';
        </script>
        <?php
    }
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Students</title>
    <style>
        .home {
            height: 100px;
        }
        .button a img:hover {
            background-color: yellow;
        }
        .image {
            height: 100px;
            width: 100px;
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
<div class="button">
        <a href="ahome.php"><img class="home" src="home1.png"></a>
    </div>
    <center><h1>All Students</h1></center>
    <?php
        $conn=mysqli_connect("localhost","root","","placement");
        $result=mysqli_query($conn,"select * from stdetails");
        echo "<table border=1 width=100%>";
        echo "<tr><th>University Register Number<th>Name<th>Age<th>Date Of Birth<th>Phone Number<th>Email Id<th>Gender
            <th>Address<th>Languages Known<th>Course<th>Mark Details<th>Delete";
        while($row=mysqli_fetch_assoc($result)) {
            $sid=$row["sid"];
            $universityregno=$row["universityregno"];
            $name=$row["name"];
            $age=$row["age"];
            $dateofbirth=$row["dateofbirth"];
            $phoneno=$row["phoneno"];
            $email=$row["email"];
            $gender=$row["gender"];
            $address=$row["address"];
            $languagesknown = explode(",", $row["languagesknown"]);
            $lk = implode(", ", $languagesknown);
            $selectyourcourse=$row["selectyourcourse"];

            echo "<tr><td>$universityregno<td>$name<td>$age<td>$dateofbirth<td>$phoneno<td>$email
            <td>$gender<td>$address<td>$lk<td>$selectyourcourse<td><a href='adminviewmarks.php?sid=$sid'>View</a>
            <td><a href='viewallstudents.php?sid=$sid'>Delete</a>";
        }
        echo "</table>";
    ?>
</body>
</html>