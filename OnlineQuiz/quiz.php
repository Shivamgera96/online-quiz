<?php

include "connect.php";
 session_start();
 $User_Name=  $_SESSION['xyz'];

 if(!$_SESSION['xyz'] || !$_SESSION['pasw'])
{
  header("location:Teacher_Login.php");
}

 if(isset($_POST["submit"]))
{
   
   $quiz_id=uniqid();
    $num=$_POST["que"];
    $time=$_POST["time"];
    $date=$_POST["date"];
    $title=$_POST["title"];
    $password=$_POST["quizpass"];
   

    $query="INSERT INTO quiz (`quiz_id`,`noofque`,  `time`, `date`, `title`, `password`, `teacher_id`) VALUES ('$quiz_id','$num', '$time', '$date', '$title', '$password','$User_Name')";
    
   if( $result= mysqli_query($connect, $query))
   {

   
    $_SESSION['quiz_id']=$quiz_id;
    $_SESSION['title']=$_POST['title'];
    $_SESSION['nque']=$_POST['que'];


    echo '<script> if(!alert("Data Added Sucessfully")) document.location = ' .' "Select_Question.php"</script>';

   }

   else
   {
      echo '<script>alert("Can not Added Data")</script>'; 

   }

 }

if(isset($_POST['logout']))
 {
    session_destroy();
    header("location:Teacher_Login.php");
 }
 
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Generate Quiz</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>




     <div class="sidebar" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
             <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                 
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                <?php     echo "Welcome" . "," . " " .$User_Name;    ?>
                </a>
            </div> 
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li >
                        <a href="teacherhome.php">
                            <i class="glyphicon glyphicon-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="Add_Question.php">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            <p>Add Question</p>
                        </a>
                    </li>
                    <li>
                        <a href="update.php">
                            <i class="glyphicon glyphicon-pencil"></i>
                            <p>Update / Delete Question</p>
                        </a>
                    </li>
                    <li>
                        <a href="View_Result.php">
                            <i class="glyphicon glyphicon-file"></i>
                            <p>View Result</p>
                        </a>
                    </li>

                     <li  class=active>
                        <a href="quiz.php">
                            <i class="glyphicon glyphicon-tasks"></i>
                            <p>Generate Quiz</p>
                        </a>
                    </li>

                    <li>
                        <a href="Edit_Profile.php">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Edit Profile</p>
                        </a>
                    </li>
                    <li class="active-pro">
                         <button type="button" style =" margin-left: 18%" class="btn btn-info btn-lg" data-toggle="modal"  data-target="#myModal" >Log Out</button>
                            <i class="glyphicon glyphicon-Log-out"></i>
                           
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    


<div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Generate Your Quiz Here</a>
                    </div>
                                    </div>
            </nav>
        
            <div class="panel-header panel-header-sm">
            </div>

 <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <h5 class="title">Select Questions </h5> -->
                            </div>
                            <div class="card-body">
                                
<form  action="#" class="form-horizontal" method="POST">

                    <div class="form-group">
                            <label class="col-sm-3 control-label" for="Que"> Total Question </label>
                            <div class="col-sm-9">
                            <input type="text" id="Que" name="que"   autocomplete="off" class="form-control" placeholder="Enter Number of Question" required="">
                            </div>
                          </div>
                
                          <div class="form-group">
                                <label class="col-sm-3 control-label" for="Time"> Time </label>
                                <div class="col-sm-9">
                                <input type="text" id="Time" name="time" class="form-control" placeholder=" Quiz Time in minutes" required="">
                              </div>
                              </div>
                  
                              <div class="form-group">
                                  <label class="col-sm-3 control-label" for="Quizdate ">Date</label>
                                  <div class="col-sm-9">
                                  <input type="date" id="Date" name="date" class="form-control" placeholder="mm/dd/yyyy" required="">
                                </div>
                                </div>
                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Quiztitle">Quiz Title </label>
                                    <div class="col-sm-9">
                                    <input type="text" id="Title" name="title" class="form-control" placeholder=" Quiz Title" required="">
                                  </div>
                                  </div>
                
                                  <div class="form-group">
                                      <label class="col-sm-3 control-label" for="quizpass">Quiz Password:</label>
                                      <div class="col-sm-9">
                                      <input type="text" id="Quizpass" name="quizpass" autocomplete="off" class="form-control" placeholder="Generate Quiz Password" required="">
                                    </div>
                                    </div>
                    
                        
                      <div class="col-sm-12 col-lg-12" style="display: flex;flex-direction: row;justify-content: space-around;" >
                      <button type="submit" name="submit" style="max-width: 40%;padding: 0px;" class="btn btn-info btn-lg form-control"> Submit </button>
                      </div>
                      <br> <br> <br>

                 </div>
                   
                  </form>

         </div>
            </div>
              </div>
               </div>
        </div> 

         <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Update Password</h4> -->
        </div>
        
        <div class="modal-body">
            <p style="color: #f96413;">Do You Really Want to Log Out ?</p>
        </div>
          
                     <div class="modal-footer">
                        <form action="Teacher_Login.php" method="POST">
          <button type="submit" class="btn btn-info btn-md" name= "logout" >Yes</button>
         </form>

        </div>
       
      </div>
  </div>
</div>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
</html>