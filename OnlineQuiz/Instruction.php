<?php
       
      include "connect.php";
      session_start();

      if(!$_SESSION['Reg'])
      {
        header("location:Student_Signup.php");
      }

       if(isset($_POST["submit"]))
       {
             $qid=$_POST["qid"];
             $pass=$_POST["password"];
             // $_SESSION['pass']=$pass;
             // echo "dbjb,dnx dskj.jdshds dshl.";

            // echo $qid . " dghkdsk,dshds, dshjjk" . $pass;
             $query="SELECT *FROM quiz where `quiz_id`='$qid' AND `password`='$pass'";
             

            if($result=mysqli_query($connect, $query))
             {
              


              $row=mysqli_num_rows($result);
              
              if($row>0){
              
              $count=mysqli_fetch_array($result);

              $_SESSION['questions']= $count['question_id'];
              $_SESSION['time']= $count['time'];
              $_SESSION['qid']= $count['quiz_id'];

              header("Location:InstructionRead.php");
              }
               else
            {
              
              echo '<script>alert("Invalid QuizId Or Password")</script>';
                
            }
            }
          
            
         // unset($_POST["submit"]);
        
       }


      



?>
<!DOCTYPE html>
<html>
	  <head>
        <title></title>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     </head>
    
    <body background="images/pass.jpg">


        <div class="container" >
          <div class="row" style="margin-left:25%;margin-right:25%; margin-top:25%">

      <form class="form-horizontal" action="" method="POST">
        
          <div class="form-group mx-sm-3 mb-9">
            <label for="password" class="sr-only"  >Password</label>
            <input type="text"  class="form-control" id="Qid" required="" name="qid" placeholder= "Enter Quiz Id">
          </div>
          <div class="form-group mx-sm-3 mb-9">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="password" class="form-control" id="Password" name="password" required="" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-info btn-lg" name ="submit"  >submit</button>

        </form>

       
        
</div>
</div>
             
    </body>   
</html>

