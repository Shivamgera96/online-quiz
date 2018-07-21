<?php

session_start();
include("connect.php");

if(!$_SESSION['Reg'])
      {
        header("location:Student_Signup.php");
      }

if(isset($POST["submit"]))
{
  
 header("Location:viewQuestion.php");
}

?>



<!DOCTYPE html>
<html>
	 <head>
          <title></title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  

       </head>
     
       <body >
              
           
            

        <div class="container">
                <div class="jumbotron">
                        <center><h1> General Instructions </h1></center>

                      </div>

        <form class="form-horizontal" method="POST" action="viewQuestion.php">
        </div>    
        <div class="container">
        <div class="card " style="background-color:#f2f2f2">
            
                <div class="card-body">
                    
                        <ul style="list-style-type:circle">
                            <li>The Quiz consits of questions carefully designed to help you self-assess your comprehension.</li>
                            <li>Each question of the quiz is of multiple-choice or "True/False" format.</li>
                            <li>Click on the button next to your response that is based on the question<./li>
                            <li>If you select an incorrect response for a question ,you can try again until you get the correct response.</li>
                            <li>After responding all questions you can finish the quiz before the time by clicking on finish test.</li>
                            <li>The total score of your quiz is based on your response to all questions. </li>
                            <li>After Finishing the quiz you will get the result </li>
                        </ul>
                
                        <label class="col-sm-10 control-label"></label> 
                        <div class="col-sm-2">
                        <button type="submit" name="submit" class="btn btn-success">Start Quiz</button>
                      </div>
                </div>
              </div>
            </div>     
        </form>
 
            </body>
            </html>