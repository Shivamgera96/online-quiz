<?php
 
 include "connect.php";
 
 

 session_start();

 if(!$_SESSION['Reg'])
      {
        header("location:Student_Signup.php");
      }

$quizid= $_SESSION['qid'];
$studentid = $_SESSION['Reg'];



//
 
if(isset($_POST['submit']))
{
  $correctAnswer=$_POST["correct"];
  $totalQuestions=$_POST["tque"];
  $attemptQuestion=$_POST["aque"];
  $incorrect=$_POST["incorrect"]; 
 	

  $query="Insert INTO `result` VALUES('$quizid','$studentid', '$totalQuestions', '$correctAnswer', '$incorrect', '$attemptQuestion')";

  if($result=mysqli_query($connect,$query))
  {
  	 // echo '<script>alert("Your Reponse Record Sucessfully")</script>';
  	 header("location:finish.php");
  }

}
else
{
  $correctAnswer=$_GET["countAnswer"];
  $totalQuestions=$_GET["no_of_question"];
  $attemptQuestion=$_GET["noofAttempted"];
  $incorrect=$attemptQuestion-$correctAnswer;
}

?>




<!DOCTYPE html>
<html>
	 <head>
          <title></title>
          <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <!--  <link rel="stylesheet" href="contain.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
        html, body {
            height: 100%;
            margin: 0px;
            
        }
        </style>

       </head>
     
       <body  style="background-color:#F2F2F2;">
              
           
       <div class="container con" >      

        <div class="container">
                <div class="jumbotron">
                        <center><h1> Your Response </h1></center>
                      </div>
        </div>
		   
        <div class="container" >
           <div class="row" style="margin-left:25%;margin-right:25%">

            <form action="result.php?countAnswer=$countAnswer & noofAttempted=$attemptQuestion & no_of_question=$totalQuestions" class="form-horizontal" method="POST">
                    
                   
							<div class="form-group">
									<label class="col-sm-4 control-label" for="Id">Total Questions</label>
									<div class="col-sm-8">
									<input type="text" id='Tque' name="tque" class="form-control" value= "<?php echo $totalQuestions ?>" readonly >
									</div>
								  </div>
                            
                            <div class="form-group">
                            <label class="col-sm-4 control-label" for="Id">Attempted Questions</label>
                            <div class="col-sm-8">
                            <input type="text" id="Aque" name="aque" class="form-control" value= "<?php echo $attemptQuestion ?>" readonly >
                            </div>
						    </div>

						  <div class="form-group">
								<label class="col-sm-4 control-label" for="Name">Correct Questions</label>
								<div class="col-sm-8">
								<input type="text" id="Correct" name="correct" class="form-control" value= "<?php echo $correctAnswer ?>" readonly  >
								</div>
							  </div>
							  
							  <div class="form-group">
									<label class="col-sm-4 control-label" for="incorrect">Incorrect Questions </label>
									<div class="col-sm-8">
									<input type="text" id="Incorrect" name="incorrect" class="form-control" value= "<?php echo $incorrect ?>" readonly >
									</div>
								  </div>

										  
										 <div class="form-group">
										  <label class="col-sm-10 control-label"></label> 
										  <div class="col-sm-2">
										  <button type="submit" name="submit" class="btn btn-info btn-lg">OK</button>
										</div>
                                        </div>
									</form>
								</div>
						</div>
						
					  </div>
			  
					</body>
			  </html>
			  