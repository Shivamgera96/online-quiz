
<?php


include "connect.php";
session_start();

if(isset($_POST['submit']))
{
       

         $Reg=$_POST["reg"];
         $Course=$_POST["course"];
         $Semester=$_POST["semester"];
         $Name=$_POST['name'];
         $Email=$_POST['email'];
         $Branch=$_POST['branch'];

         $query="SELECT * FROM student_signup WHERE `Registration_no`='$Reg' and `Course`='$Course' and `Semester`='$Semester'";

         $result= @mysqli_query($connect, $query);


         $count = @mysqli_num_rows($result);


         if($count>0)
         {

             $query ="UPDATE  student_signup SET `S_name`='$Name', `Email_id`= '$Email', `Branch`='$Branch' WHERE `Registration_no`='$Reg' and `Course`='$Course' and `Semester`='$Semester'";
            
             $result= @mysqli_query($connect,$query);
            

             
             $_SESSION['Reg']=$_POST['reg'];
             $_SESSION['Course']=$_POST['course'];
             $_SESSION['Semester']=$_POST['semester'];
             $_SESSION['Name']=$_POST['name'];
             $_SESSION['Email']=$_POST['email'];
             $_SESSION['Submit']=$_POST['submit'];
             $_SESSION['Branch']=$_POST['branch'];

              

             header("Location:Instruction.php");
         }

         else
         {
            // echo "<center><h1>\n\n\nInvalid User Try Again </h1>\n</center>";
            echo'<script> alert("Invalid User Try Again")</script>';
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
                        <center><h1> Student Signup </h1></center>
                      </div>
        </div>
		   
        <div class="container" >
           <div class="row" style="margin-left:25%;margin-right:25%">

           <form action="Student_Signup.php" class="form-horizontal" method="POST">
                    
                    <div class="form-group">
                            <label class="col-sm-3 control-label" for="Reg">Registration No</label>
                            <div class="col-sm-9">
                            <input type="text" id="Reg" name="reg" class="form-control" placeholder="Student Registration No" required="">
                            </div>
                          </div>

                          <div class="form-group">
                                <label class="col-sm-3 control-label" for="Name">Name</label>
                                <div class="col-sm-9">
                                <input type="text" id="Name" name="name" class="form-control" placeholder="Student Name"required="">
                              </div>
                              </div>
 
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="Course" required="">Course </label>
                        <div class="col-sm-9">
                        <select id="Course" name="course" class="form-control">
                                <option value=""> --- Select Course --- </option>
                                <option value="B_Tech">B_Tech</option>
                                <option value="M_Tech">M_Tech</option>
                                <option value="MCA">MCA</option>
                                <option value="MBA">MBA</option>
                                <option value="MSC">MSC</option>  
                                <option value="Phd">Phd</option>
                        </select>
                      </div>
                      </div>

                      <div class="form-group">
                            <label class="col-sm-3 control-label" for="Branch" required="">Branch</label>
                            <div class="col-sm-9">
                            <select id="Branch" name="branch" class="form-control">
                                    <option value=""> --- Select Branch --- </option>
                                    <option value="Biotechnology">Biotechnology</option>
                                    <option value="Chemical Eng.">Chemical Eng.</option>
                                    <option value="Civil Eng.">Civil Eng.</option>
                                    <option value="CS and Eng.">CS and Eng.</option>
                                    <option value="Electrical Eng.">Electrical Eng.</option>  
                                    <option value="Elec. and com. Eng.">Elec. and com. Eng.</option>    
                                    <option value="Information Tech.">Information Tech.</option>    
                                    <option value="Mechanical Eng.">Mechanical Eng.</option>    
                                    <option value="Applied Mechanics">Applied Mechanics</option>    
                                    <option value="Software Eng.">"Software Eng.</option>    
                                    <option value="Other.">Other</option>   
                            </select>
                          </div>
                          </div>


                      <div class="form-group">
                            <label class="col-sm-3 control-label" for="Semester" required="">Semester</label>
                            <div class="col-sm-9">
                            <select id="Semester" name="semester" class="form-control">
                                    <option value=""> --- Select Semester --- </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                            </select>
                          </div>
                          </div>
                     
                          <div class="form-group">
                                <label class="col-sm-3 control-label"for="Email" required="">Email</label>
                                <div class="col-sm-9">
                                <input type="email" id="Email" name="email" class="form-control" placeholder="XYZ@gmail.com">
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

