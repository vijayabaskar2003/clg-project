<?php
    session_start();
    error_reporting(0);
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
    if(isset($_GET["univregno"])){
        $univregno = $_GET["univregno"];
        $result2 = mysqli_query($conn, "select * from marksheet where univregno='$univregno'");
        $r2 = mysqli_fetch_assoc($result2);
        $sem1 = $r2["sem1"];
        $sem2 = $r2["sem2"];
        $sem3 = $r2["sem3"];
        $sem4 = $r2["sem4"];
        $sem5 = $r2["sem5"];
        $sem6 = $r2["sem6"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mark Details</title>
    <style>
        img{
            max-height: 200px;
        }
        td{
            text-align: center;
            font-size: 15pt;

        }
        table{
            height: 80%;
            transform: translateY(-10px);
        }
        .home{
            height: 100px;
        }
        a img:hover{
			background-color: yellow;
		}
        body{
            background-color: lightgray;
        }
        h1{
            transform: translateY(-60px);
        }
        .mark table img{
            width: 90%;
            max-height: 700px;
        }
    </style>
</head>
<body>
<a href="viewallapplicants.php"> <img class="home" src="home1.png"></a>
<center><h1> Mark Details<h1>
    <div class="mark">
    <table border="1"  width="90%">
        <tr><td>Semester 1 : <td><br><img src="<?php echo $sem1; ?>"><br><br>
        <tr><td>Semester 2 : <td><br><img src="<?php echo $sem2; ?>"><br><br>
        <tr><td>Semester 3 : <td><br><img src="<?php echo $sem3; ?>"><br><br>
        <tr><td>Semester 4 : <td><br><img src="<?php echo $sem4; ?>"><br><br>
        <tr><td>Semester 5 : <td><br><img src="<?php echo $sem5; ?>"><br><br>
        <tr><td>Semester 6 : <td><br><img src="<?php echo $sem6; ?>"><br><br>
    </table>
    </div>

    </div>
</body>
</html>