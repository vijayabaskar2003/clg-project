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
    if(isset($_GET["cid"])){
        $conn=mysqli_connect("localhost","root","","placement");
        $cid = $_GET["cid"];

        $result2 = mysqli_query($conn, "select * from cdetails where cid='$cid'");
        $r2 = mysqli_fetch_assoc($result2);
        $logo = $r2["logo"];

        $sql1="DELETE FROM caccount WHERE cid='$cid'";
        $sql2="DELETE FROM jobs WHERE cid='$cid'";
        $sql3="DELETE FROM applicants WHERE cid='$cid'";
        $sql4="DELETE FROM placed WHERE cid='$cid'";
        $sql="DELETE FROM cdetails WHERE cid='$cid'";


        $query_run1=mysqli_query($conn,$sql1);
        $query_run2=mysqli_query($conn,$sql2);
        $query_run3=mysqli_query($conn,$sql3);
        $query_run4=mysqli_query($conn,$sql4);
        $query_run=mysqli_query($conn,$sql);
        if($query_run && $query_run1 && $query_run2 && $query_run3 && $query_run4){
            unlink($logo);

            ?>
            <script>
                alert("Company Successfully Deleted");
                window.location.href='viewallcompany.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Company Not Deleted");
                window.location.href='viewallcompany.php';
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
    <title>View All Companies</title>
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
    <center><h1>All Companies</h1></center>
    <?php
        $conn=mysqli_connect("localhost","root","","placement");
        $result=mysqli_query($conn,"select * from cdetails");
        echo "<table border=1 width=100%>";
        echo "<tr><th>Company Name<th>Email Id<th>GST Number<th>Url<th>Phone<th>Address<th>Logo<th>Delete";
        while($row=mysqli_fetch_assoc($result)) {
            $cid=$row["cid"];
            $companyname=$row["companyname"];
            $email=$row["email"];
            $gst=$row["gst"];
            $url=$row["url"];
            $phone=$row["phone"];
            $address=$row["address"];
            $logo=$row["logo"];



            echo "<tr><td>$companyname<td>$email<td>$gst<td>$url<td>$phone<td>$address
            <td><img class='image' src='" . $logo . "'><td><a href='viewallcompany.php?cid=$cid'>Delete</a>";
        }
        echo "</table>";
    ?>
</body>
</html>
