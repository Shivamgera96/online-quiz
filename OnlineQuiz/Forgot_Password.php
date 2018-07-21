<?php

include "connect.php";

if(isset($_POST["submit"]))
{
    $Id=$_POST["id"];
    $Name=$_POST["name"];
    $Key=$_POST["key"];
    $Answer=$_POST["answer"];
    $Npass=$_POST["npas"];

    $query= " SELECT * FROM teacher_signup WHERE `Id`='$Id' and `S_key`='$Key' and `Answer`='$Answer' ";

    $result= @mysqli_query($connect, $query);

    $count= @mysqli_num_rows($result);

    if($count > 0)
    {


        
        $query= "UPDATE teacher_signup SET `password`='$Npass' WHERE `Id`='$Id' and `S_key`='$Key' and `Answer`='$Answer'";

        $result= @mysqli_query($connect, $query);
        
         echo "<script>"."if".'(!alert("Password Changed Sucessfully")) document.location = ' .'"Teacher_Login.php"</script>';
    }
    else
    {
        echo '<script>alert("Invalid key/answer")</script>';
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
                        <center><h1> Forgot Password  </h1></center>
                      </div>
        </div>
		   
        <div class="container" >
           <div class="row" style="margin-left:20%;margin-right:25%">

				<form action="Forgot_Password.php" class="form-horizontal" method="POST">
                    
						<div class="form-group">
								<label class="col-sm-3 control-label"for="Id">Teacher Id</label>
								<div class="col-sm-9">
								<input type="text" id="Id"  name="id" class="form-control" placeholder="Teacher Id" required="">
								</div>
							  </div>
	
							  <div class="form-group">
									<label class="col-sm-3 control-label" for="Name">Teacher Name</label>
									<div class="col-sm-9">
									<input type="text" id="Name" name="name" class="form-control" placeholder="Teacher Name"required="">
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
											<label class="col-sm-3 control-label" for="Answer">Answer</label>
											<div class="col-sm-9">
											<input type="password" autocomplete="off" id="Answer" name="answer" class="form-control" placeholder="Your Answer"required="">
										  </div>
										  </div>
	

							  <div class="form-group">
									<label class="col-sm-3 control-label"for="Npas" required="">New Password</label>
									<div class="col-sm-9">
									<input type="password" id="Npas" name="npas" class="form-control" placeholder="Enter New Password">
									</div>
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
