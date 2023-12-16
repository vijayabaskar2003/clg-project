<?php
session_start();
if(isset($_SESSION["companyname"]) && $_SESSION["password"]){
	$companyname=$_SESSION["companyname"];
	$password=$_SESSION["password"];
} else {
    header("location:clogin.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "placement");
$result1 = mysqli_query($conn, "select * from caccount where companyname='$companyname' and password='$password'");
$r1 = mysqli_fetch_assoc($result1);
$cid = $r1["cid"];

$conn=mysqli_connect("localhost","root","","placement");
if(isset($_POST["register"])){
    $companyname=$_POST["companyname"];
    $jobtitle=$_POST["jobtitle"];
    $skills=$_POST["skills"];
    $location=$_POST["location"];
    $salary=$_POST["salary"];
    $cgpa=$_POST["cgpa"];
    $jdesc=$_POST["jdesc"];
    $date= date('y-m-d', strtotime($_POST['date']));
    if($companyname !="" && $jobtitle !="" && $skills !=""  && $location !="" && $salary !="" && $cgpa !="" && $jdesc !="" && $date !="" )
    {
    $q="select * from jobs";
    $result=mysqli_query($conn,$q);
	if(mysqli_num_rows($result)>=0){
        $q="insert into jobs values ('','$cid','$companyname','$jobtitle','$skills','$location','$salary','$cgpa','$jdesc','$date')";
        $result=mysqli_query($conn,$q);
        echo "<script>alert('$companyname Job are saved successfully');</script>";
        ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/cmodule.php"/>
        <?php
    }
    else
    echo "<script>alert('Try again...');</script>";
}
else{
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
    <title>Add Job Details</title>
</head>
<body>
<style>
     body {
			background-image: url('f1.jpg');
            background-repeat: no-repeat;
            height:620px;
		}
        h1 {
			margin-top: 5px;
			text-shadow: 2px 2px -1px black;
			background-color: yellow;
			width: 160px;
			border-radius: 10px;
			border-color: black;
            transform: translatex(585px);
		}
		form {
			margin: 20px auto;
			max-width: 400px;
			background-color: white;
			padding: 50px;
			border-radius: 40px;
			box-shadow: 0px 0px 5px 1px black;
		}
		label {
			display: flex;
			font-weight: bold;
			margin-bottom: 10px;
		}
		input[type="text"], input[type="password"], input[type="box"], input[type="email"], input[type="date"]{
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
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
        .home{
            height: 100px;
        }
        a img:hover{
			background-color: yellow;
		}
        body{
            background-color: lightgray;
        }
		form{
            transform: translateY(-95px);
        }
        h1{
            transform: translateY(-95px);
        }
        </style>
<body>
<a href="cmodule.php"> <img class="home" src="home1.png"></a>
<center><h1>Add Jobs</h1>
        <form method="POST" action="">
             <label>Company Name :</label>
		    <input type="text" name="companyname" value="<?php echo $companyname; ?>">

            <label>Job Title :</label>
		    <input type="text" name="jobtitle" placeholder="Enter Job Title">

			<label>Primary Skills :</label>
		    <input type="text" name="skills" placeholder="Skills Required">

			<label>Location :</label>
		    <input type="text" name="location" placeholder="Enter Job Location">

			<label>Salary :</label>
		    <input type="text" name="salary" placeholder="Enter Job Salary">

			<label>Minimum CGPA Required :</label>
		    <input type="text" name="cgpa" placeholder="Enter CGPA Required">

			<label>Job Description :</label>
		    <input type="text" name="jdesc" placeholder="Enter Job Description">

            <label>Last Date To Apply :</label>
            <input type="date"  name="date">

		    <input type="submit" value="register" name="register">
        </form>
</body>
</html>