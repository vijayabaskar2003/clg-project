<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "placement");
error_reporting(0);

if(isset($_SESSION["username"]) && $_SESSION["password"]){
    $username=$_SESSION["username"];
    $password=$_SESSION["password"];

    $result1 = mysqli_query($conn, "select * from staccount where username='$username' and password='$password'");
    $r1 = mysqli_fetch_assoc($result1);
    $sid = $r1["sid"];
}
else{
    header("location:stlogin.php");
    exit();
}

if(isset($_POST["register"])){
    $universityregno=$_POST["universityregno"];
    $name=$_POST["name"];
    $age=$_POST["age"];
    $dateofbirth= date('y-m-d', strtotime($_POST['dateofbirth']));
    $phoneno=$_POST["phoneno"];
    $email=$_POST["email"];
    $gender=$_POST["gender"];
    $address=$_POST["address"];
    $languagesknown=$_POST["languagesknown"];
    $lk=implode(", ",$languagesknown);
    $selectyourcourse=$_POST["selectyourcourse"];

    if($universityregno !="" && $name !="" && $dateofbirth !="" && $phoneno !="" && $email !="" && $gender !=""
        && $address !="" && $languagesknown !="" && $selectyourcourse !="") {

        $q="select * from stdetails where universityregno='$universityregno'";
        $result=mysqli_query($conn,$q);

        if(mysqli_num_rows($result)==0){
            $q="insert into stdetails values ('','$sid','$universityregno','$name','$age',
                '$dateofbirth','$phoneno','$email','$gender','$address','$lk',
                '$selectyourcourse')";
            $result=mysqli_query($conn,$q);

            echo "<script>alert('$username Details are saved successfully');</script>";
            header("refresh:1; url=http://localhost/sthome.php");
            exit();
        }
        else {
            echo "<script>alert('Try Again...');</script>";
        }
    }
    else {
        echo "<script>alert('Please Fill All The Details...');</script>";
    }
}
?>
<!DOCTYPE html> 
<html>
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Details</title>
		<style>
            input{
                font-size:12pt;
            }
             :root{
                --neon-color:#9cf3eb;
                --white-color:white;
                --main-bacco:#051527;
                --light-bacco:#0A2647;
            }
            *{
                margin: 0;
                padding: 0;
            }
			  body {
					background-image:url("f1.jpg");
                    background-repeat: no-repeat;
                    height:620px;
			  }	 
			  div.main{
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 600px;
                background: white;
                border: 3px solid var(--light-bacco);
                border-radius: 25px;
                margin: 100px auto 0px auto;
                transition: 0.5s;
                transform: translateY(-50px);
			  } 	
              div.main:hover{
                border: 4px solid #00FFD1;
                box-shadow: 0 0 20px #00FFD1, inset 0 0 20px #31c6D4;
             }
             .one{
                font-size :45px;
                font-family: sans-serif;
             }
              .two{
                font-size: 25px;
                padding:;
                font-family: sans-serif;
              }
              div.register{
                background-color: rgba(0,0,0,0.5);
                width: 100%;
                padding: 30px;
                font-size: 23px;
                border-radius: 20px;
                border: 3px solid rgba(255,255,255,0.3);
                box-shadow: 2px 2px 15px rgba(0,0,0,0.3);
                color: #fff;
              }
		    .primaryBtn{
                 border-radius: 25px;
                 height: 40px;
                 border: none;
                 width: 40%;
                 background: white;
                 color: #ffae00;
                 font-weight: 500;
                 font-size: 20px;
                 cursor: pointer;
                 position: relative;
                 display: flex;
                 justify-content: center;
                 align-items: center;
                 background: transparent;
                 border: 3px  solid var(--light-bacco);
                 transition: 0.5s;
            }
            .primaryBtn:hover{
                border: 4px solid #00FFD1;
                box-shadow: 0 0 20px #00FFD1, inset 0 0 20px #31c6D4;
             }
             .home{
            height: 100px;
        }
        a img:hover{
			background-color: yellow;
		}
		</style>
   </head>
   <body>
   <a href="sthome.php"> <img class="home" src="home1.png"></a>
       <div class="wrapper">
        <div class="main">
        <div class="register">
          <h1 class="one"><font color=#ffae00> <center>Students Registration Form</font></h1>	
		<form method=POST action="">
			<center>
			<table >
			    <tr>
                 <td>
                   <label class="two"><font color=white> University Regno &nbsp;&nbsp; </font><br></label>
                 </td>
                 <td>
                   <label><input type=text name="universityregno" placeholder="University Regno"><br></label>
                 </td>	
                </tr>
				<tr>
				   <td><label class="two"><font color=white> Name </font><br></label></td>
				   <td><label><input type=text name="name"placeholder="Name"><br></label></td>	
				</tr>
				<tr>
					 <td><label class="two"><font color=white> Age </font><br></label></td>
					 <td><label><input type=number name="age" placeholder="Age"><br></label></td>
				</tr>
				<tr>
					<td><label class="two"><font color=white>Date of Birth </font><br></label></td>
					<td><label><input type=date name="dateofbirth"><br></label></td>
				</tr>
                <tr>
                    <td><label class="two"><font color=white>Phone No </font><br></label></td>
                    <td><label><input type=text  name="phoneno" placeholder="Phoneno"><br></label></td>
                </tr>
                <tr>
                    <td><label class="two"><font color=white>Email </font><br></label></td>
                    <td><label><input type=Email name="email" placeholder="Email"><br></label></td>
                </tr>
				<tr> 			    
					<td><label class="two"><font color=white >Gender </font><br></label></td>
                    <td><label><input type=radio value=M name="gender"><font color=white>Male</font> 
					<input type=radio value=F name="gender" ><font color=white>Female </font> <br></label></td>
				</tr> 
                 <tr>
                    <td><label class="two"><font color=white>Address </font><br></label></td>
                    <td><label><font color=white><textarea name="address" id="addres" cols="30" rows="5" placeholder="Enter your address">
                    </textarea></font><br><br></label></td>
                </tr>
				<tr>
					<td><label class="two"><font color=white>Languages known  </font><br></label></td>
                    <td><label> <input type="checkbox" value=English name="languagesknown[]" >
						 <label><font color=white>English</font></label> 
						 <input type="checkbox" value=Tamil name="languagesknown[]" > 
						 <label><font color=white>Tamil</font></label> 
						 <input type="checkbox" value=Hindi name="languagesknown[]"> 
						 <label><font color=white>Hindi</font></label> <br></label></td>
				</tr>
				<tr>  
					 <td><label class="two"><font color=white>Select your course </font><br></label></td>
					 <td><label><Select name="selectyourcourse"><br>
					   <option>None</option>
					   <option>Computer Science </option>
					   <option>Computer Application</option>
					   <option>Tamil</option>
					   <option>English</option>
					   <option>Chemistry</option>
					   <option>Mathematics</option>
					   <option>Geology</option>
					   <option>Environmental Management</option>
					   <option>Busines Administration</option>
					   </select> <br></label>
                    </td>
				<tr><tr><tr><tr><tr><tr><tr><tr><tr>
                <tr><td colspan=2><center><button class="primaryBtn" name="register">Register</button>
                <tr><tr><tr><tr><tr> 
			</table>
			</center>
		</form>
		</div>
        </div>
       </div>
    </body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","placement");
	$result=mysqli_query($conn, "select * from stdetails where sid='$sid'");
	$r=mysqli_fetch_assoc($result);
	$universityregno=$r["universityregno"];
	if($universityregno !=""){
      echo "<script>alert('You Have Already Registered... Go Back To Home');</script>";
	}
?>
