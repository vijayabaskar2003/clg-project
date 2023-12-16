<?php
    session_start();
    if(isset($_SESSION["companyname"]))
        $username=$_SESSION["companyname"];
        else{
            header("location:clogin.php");
            exit();
        }
        if(isset($_POST["logout"])){
            unset($_SESSION["companyname"]);
            header("location:index.html");
        }
?>

<html>
    <head>
        <body style="color:black; margin-top: 250px;">
            <center>
            <h1>You Have Successfully Logged in, Welcome</h1>
            <form method=POST action="">
                <input type=submit value=logout name=logout>
            </form>
             </center>
        </body>
    </head>
</html>