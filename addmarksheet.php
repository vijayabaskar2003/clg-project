<?php
session_start();
$conn = mysqli_connect("localhost","root","","placement");
if(isset($_SESSION["username"]) && $_SESSION["password"]){
    $username=$_SESSION["username"];
    $password=$_SESSION["password"];
    $result1 = mysqli_query($conn, "select * from staccount where username='$username' and password='$password'");
    $r1 = mysqli_fetch_assoc($result1);
    $sid = $r1["sid"];
    $result2= mysqli_query($conn, "select * from stdetails where sid='$sid'");
    $r2 = mysqli_fetch_assoc($result2);
    $univregno = $r2["universityregno"];
    $sname = $r2["name"];
} else {
    header("location:clogin.php");
    exit();
}
        if (isset($_POST["register"])) {
            $sem1_path = "";
            $sem2_path = "";
            $sem3_path = "";
            $sem4_path = "";
            $sem5_path = "";
            $sem6_path = "";
            
            $filename = $_FILES["sem1"]["name"];
            $tempname = $_FILES["sem1"]["tmp_name"];
            $sem1 = "marksheet/" . $filename;
            move_uploaded_file($tempname, $sem1);
            
            $filename = $_FILES["sem2"]["name"];
            $tempname = $_FILES["sem2"]["tmp_name"];
            $sem2 = "marksheet/" . $filename;
            move_uploaded_file($tempname, $sem2);
            
            $filename = $_FILES["sem3"]["name"];
            $tempname = $_FILES["sem3"]["tmp_name"];
            $sem3 = "marksheet/" . $filename;
            move_uploaded_file($tempname, $sem3);
            
            $filename = $_FILES["sem4"]["name"];
            $tempname = $_FILES["sem4"]["tmp_name"];
            $sem4 = "marksheet/" . $filename;
            move_uploaded_file($tempname, $sem4);
            
            $filename = $_FILES["sem5"]["name"];
            $tempname = $_FILES["sem5"]["tmp_name"];
            $sem5 = "marksheet/" . $filename;
            move_uploaded_file($tempname, $sem5);

            $filename = $_FILES["sem6"]["name"];
            $tempname = $_FILES["sem6"]["tmp_name"];
            $sem6 = "marksheet/" . $filename;
            move_uploaded_file($tempname, $sem6);

        if($sem1 !="" && $sem2 !="" && $sem3 !="" && $sem4 !="" && $sem5 !="") {
            $q = "select * from marksheet where  sid='$sid' ";
            $result = mysqli_query($conn, $q);

            if(mysqli_num_rows($result) == 0) {
                $q = "insert into marksheet values ('','$sname','$sid','$univregno','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6')";
                $result = mysqli_query($conn, $q);
                echo "<script>alert('$username Mark Details are saved successfully');</script>";
                header("refresh:0.1; url=http://localhost/sthome.php");
                exit();
            } else {
                echo "<script>alert('Try Again...');</script>";
            }
        } else {
            echo "<script>alert('Please Fill All The Details...');</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Mark Details</title>
    <style>
                body {
			background-image: url('f1.jpg');
            background-repeat: no-repeat;

		}
        .home{
            height: 100px;
        }
        a img:hover{
			background-color: yellow;
		}
        h1 {
			margin-top: 5px;
			text-shadow: 2px 2px -1px black;
			background-color: yellow;
			width: 240px;
			border-radius: 10px;
			border-color: black;
            transform: translatex(555px);
		}
		form {
			margin: 20px auto;
			max-width: 270px;
			background-color: white;
			padding: 50px;
			border-radius: 40px;
            /*offset-x | offset-y | blur-radius | spread-radius | color  */
			box-shadow: 0px 0px 5px 1px black;
		}
		label {
			display: flex;
			font-weight: bold;
			margin-bottom: 10px;
		}
        input[type="submit"] {
			display: block;
			width: 100%;
			padding: 10px;
			background-color: green;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
        input[type="submit"]:hover {
			background-color:  #3e8e41;
		}
        form{
            transform: translateY(-95px);
        }
    </style>
</head>
<body>
<a href="sthome.php"> <img class="home" src="home1.png"></a>
<h1>Add MarkSheet</h1>
        <form method="POST" action="" enctype="multipart/form-data">
        <label>Upload SEM-1 MarkSheet :</label>
		    <input type="file" name="sem1" required><br><br><br>
        <label>Upload SEM-2 MarkSheet :</label>
		    <input type="file" name="sem2" required><br><br><br>
        <label>Upload SEM-3 MarkSheet :</label>
		    <input type="file" name="sem3" required><br><br><br>
        <label>Upload SEM-4 MarkSheet :</label>
		    <input type="file" name="sem4" required><br><br><br>
        <label>Upload SEM-5 MarkSheet :</label>
		    <input type="file" name="sem5" required><br><br><br>
        <label>Upload SEM-6 MarkSheet :</label>
		    <input type="file" name="sem6" ><br><br><br>
		    <input type="submit" value="register" name="register">
        </form>
</body>
</html>