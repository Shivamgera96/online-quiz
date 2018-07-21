<?php

session_start();
include "connect.php";


if($_SESSION['xyz'] && $_SESSION['pasw'])
{
  header("location:teacherhome.php");



}



// echo "sdfdsfadsf session = ".$_SESSION['xyz'] ;

if(isset($_POST['login']))
{
       

         $Uname=$_POST["uname"];
         $Password=$_POST["psw"];
         
            
            $_SESSION['xyz']=$Uname;
            $_SESSION['pasw']=$Password;

         $query="SELECT * FROM teacher_signup WHERE `Id`='$Uname' and `password`='$Password'";

         $result= @mysqli_query($connect, $query);


         $count = @mysqli_num_rows($result);


         if($count>0)
         {
            
              echo "..........................................". "$Uname" ;
              header("location:teacherhome.php");
         }

         else
         {
            echo '<script> alert("Username/Password Invalid")</script>';
         }

    
}

if(isset($_POST['signup']))
{
    header("Location: Teacher_Signup.PHP");
}


?>




<!DOCTYPE html>
<html>
	 <head>
          <title></title>
          <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="connect1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- <style type="text/css">
        html, body {
            height: 100%;
            margin: 0px;
            
        }
        </style> -->

       </head>
     
       <body >



		<div class="container con" >      
				<div class="container" >
						<div class="row" style="margin-left:0%;margin-right:0%">

								<div class="container">
										<div class="jumbotron">
												<center><h1> Teacher Login </h1></center>
											  </div>
								</div>

<div class="container con" > 
<form action="Teacher_Login.php"  method="POST">
	<div class="imgcontainer">
	  <img src="images\login.jpg" alt="Avatar" class="avatar" style="width:100px;height:100px;">
	</div>
  
	<div class="container-fluid">
	  <label for="uname"><b>Username</b></label>
	  <input type="text" placeholder="Enter Teacher Id" name="uname"  class="form-control" >
	  <br></br>
  
	  <label for="psw"><b>Password</b></label>
	  <input type="password" placeholder="Enter Password" name="psw"  class="form-control">
	  <br></br>
	  
	  <button type="submit" class="btn btn-primary" name="login">Login</button>
	  
	  <button type="submit" class="btn btn-danger" name="signup" >Sign Up</button> 
	  <label>
		<input type="checkbox" checked="checked" name="remember"> Remember me
	  </label>
	</div>
  
	<!-- <div class="container" style="background-color:#f1f1f1"> -->
	  <!-- <button type="button" class="cancelbtn">Cancel</button> -->
	  <span class="psw"> <a href="Forgot_Password.php">Forgot password?</a></span>
	</div>
  </form>

</div>
</div>

</div>
</div>

</body>
</html>