<?php

include "connect.php";
if(isset($_POST['submit']))
{
       

         $Id=$_POST["id"];
         $Email=$_POST["email"];
         $Name=$_POST["name"];
         $Password=$_POST['password'];
         $Key=$_POST['key'];
         $Answer=$_POST['answer'];

         $query="SELECT * FROM Teacher_Signup WHERE `Id`='$Id'";

         $result= @mysqli_query($connect, $query);


         $count = @mysqli_num_rows($result);


         if($count > 0)
         {
             
             $query ="UPDATE  teacher_signup SET `Email`= '$Email', `F_name`='$Name',`S_key`='$Key',`Answer`='$Answer', `password`='$Password' WHERE `Id`='$Id'";
            
             $result= @mysqli_query($connect,$query);

             
             $_SESSION['Id']=$_POST['id'];
             $_SESSION['Email']=$_POST['email'];
             $_SESSION['Name']=$_POST['name'];
             $_SESSION['Password']=$_POST['password'];
             $_SESSION['Key']=$_POST['key'];
             $_SESSION['Submit']=$_POST['submit'];
             $_SESSION['Answer']=$_POST['answer'];

              echo '<script> if(!alert("User Signup Sucessfully You Just Need to Login Now")) document.location = ' .'"Teacher_Login.php"</script>';
           //  echo '<script> alert("User Signup Sucessfully You Just Need to Login Now") </script>';
           // header("Location:Teacher_Login.php");
         }
        else
         {
           
            // echo "<center><h1>\n\n\n User Exist Already </h1>\n</center>";
            echo '<script> alert("Invalid User") </script>';
         }

    
}


?>



<!DOCTYPE html>
<html>
	 <head>
          <title></title>
          <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="contain.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
        html, body {
            height: 100%;
            margin: 0px;
            
        }
        </style>

       </head>
     
       <body >
              
           
       <div class="container con" >      

        <div class="container">
                <div class="jumbotron">
                        <center><h1> Teacher Signup </h1></center>
                      </div>
        </div>
		   
        <div class="container" >
           <div class="row" style="margin-left:25%;margin-right:25%">

            <form action="Teacher_Signup.PHP" class="form-horizontal" method="POST">
                    
                    <div class="form-group">
							<div class="form-group">
									<label class="col-sm-3 control-label"for="Id">Teacher Id</label>
									<div class="col-sm-9">
									<input type="text" id='Id' name="id" class="form-control" placeholder="Teacher Id" required="">
									</div>
								  </div>

                            <label class="col-sm-3 control-label"for="Id">Teacher Email_id</label>
                            <div class="col-sm-9">
                            <input type="email" id="Email" name="email" class="form-control" placeholder="xyz@gmail.com" required="">
                            </div>
						  </div>
						  
						  <div class="form-group">
								<label class="col-sm-3 control-label"for="Name">Teacher Name</label>
								<div class="col-sm-9">
								<input type="text" id="Name" name="name" class="form-control" placeholder="Name" required="">
								</div>
							  </div>
							  
							  <div class="form-group">
									<label class="col-sm-3 control-label"for="Password">Enter Password</label>
									<div class="col-sm-9">
									<input type="password" id="Password" name="password" class="form-control" placeholder="Enter Password" required="">
									</div>
								  </div>

								  <div class="form-group">
										<label class="col-sm-3 control-label" for="Key" required="">Security Key </label>
										<div class="col-sm-9">
										<select id="Key" name="key" class="form-control">
										 <option value="" > --- Select your security key --- </option>
                                         <option value="What is your School Name" >What is your School Name</option>
                                         <!-- <option value="What is your Birth Place">What is your Mother Tonguee</option> -->
                                         <option value="What is your best Friend Name">What is your best Friend Name</option>
                                         <option value="Who is your Favourite Teacher">Who is your Favourite Teacher</option>
                                        <option value="What is your Favourite Subject">What is your Favourite Subject</option> 
										</select>
									  </div>
									  </div>
                    

									  <div class="form-group">
											<label class="col-sm-3 control-label" for="Answer">Your Answer</label>
											<div class="col-sm-9">
											<input type="password" id="Answer" autocomplete="off" name="answer" class="form-control" placeholder="Your Answer" required="">
											</div>
										  
										  
										  <label class="col-sm-10 control-label"></label> 
										  <div class="col-sm-2">
										  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
										</div>

									</form>
								</div>
						</div>
						
					  </div>
			  
					</body>
			  </html>
			  