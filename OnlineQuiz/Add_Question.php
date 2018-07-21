<?php
 
 session_start();
 $User_Name=  $_SESSION['xyz'];

  include "connect.php";

  if(!$_SESSION['xyz'] || !$_SESSION['pasw'])
{
  header("location:Teacher_Login.php");
}

  if(isset($_POST['submit']))
  {
      // session_start();

      $Teacher_id=$_SESSION['xyz'];
      $Que=$_POST["que"];
      $Opt1=$_POST["opt1"];
      $Opt2=$_POST["opt2"];
      $Opt3=$_POST["opt3"];
      $Opt4=$_POST["opt4"];
      $Correct=$_POST["correctOpt"];
      $Title=$_POST["title"];

     // echo "................................................................." . $_SESSION['xyz'];
     //    // echo "SDGHJDhhhhhhhhhhhhhhhhhhhhJ......." . "$Teacher_id" . "..............jjjjjJKSDJ";

    $correctAnswer = $_POST["correctOpt"];

    if($correctAnswer == "1")
        $correctAnswer = $Opt1;
    else if($correctAnswer == "2")
        $correctAnswer = $Opt2;
    else if($correctAnswer == "3")
        $correctAnswer = $Opt3;
    else if($correctAnswer == "4")
         $correctAnswer = $Opt4;

    $query="INSERT INTO add_question (`Question`, `Opt1`, `Opt2`, `Opt3`, `Opt4`, `C_opt`, `Title`,`Teacher_id`) VALUES('$Que', '$Opt1', '$Opt2', '$Opt3', '$Opt4','$correctAnswer','$Title', '$Teacher_id')";
    
    $result=@mysqli_query($connect, $query);

    echo '<script> if(!alert("Question Add Sucessfully")) document.location = ' .'"Add_Question.php"</script>';
       // header("Location:Add_Question.php");
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
    <title>Add_Question</title>
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
                    <li class=active>
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

                     <li>
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
                        <a class="navbar-brand" href="#pablo">Add Your New Question Here</a>
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
                                <h5 class="title">Add Question</h5>
                            </div>
                            <div class="card-body">
                                
<form  action="#" class="form-horizontal" method="POST">
                    
                    <div class="form-group">
                            <label class="col-sm-3 control-label"for="Que">Question</label>
                            <div class="col-sm-9">
                            <input type="text" id="Que" name="que" class="form-control" placeholder="Enter New Question" required="">
                            </div>
                          </div>
                
                          <div class="form-group">
                                <label class="col-sm-3 control-label" for="Opt1">Option 1:</label>
                                <div class="col-sm-9">
                                <input type="text" id="Opt1" name="opt1" class="form-control" placeholder="First Option"required="">
                              </div>
                              </div>
                  
                              <div class="form-group">
                                  <label class="col-sm-3 control-label" for="Opt2">Option 2:</label>
                                  <div class="col-sm-9">
                                  <input type="text" id="Opt2" name="opt2" class="form-control" placeholder="Second Option"required="">
                                </div>
                                </div>
                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Opt3">Option 3:</label>
                                    <div class="col-sm-9">
                                    <input type="text" id="Opt3" name="opt3" class="form-control" placeholder="Third Option"required="">
                                  </div>
                                  </div>
                
                                  <div class="form-group">
                                      <label class="col-sm-3 control-label" for="Opt4">Option 4:</label>
                                      <div class="col-sm-9">
                                      <input type="text" id="Opt4" name="opt4" class="form-control" placeholder="Fourth Option"required="">
                                    </div>
                                    </div>
                    
                  
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="CorrectOpt" name="correct" required="">Correct Option </label>
                        <div class="col-sm-9">
                        <label class="radio-inline">
                           <input type="radio" name="correctOpt" value = "1" >Option 1
                        </label>
                         <label class="radio-inline">
                             <input type="radio" name="correctOpt" value = "2" >Option 2
                        </label>
                         <label class="radio-inline">
                           <input type="radio" name="correctOpt" value = "3" >Option 3
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="correctOpt" value = "4">Option 4
                      </label>

                      </div>
                      </div>
                
                      <div class="form-group">
                                      <label class="col-sm-3 control-label" for="Title">Quiz Title:</label>
                                      <div class="col-sm-9">
                                      <input type="text" id="Title" name="title" class="form-control" placeholder="Quiz Title"required="">
                                    </div>
                                    </div>

                      <div class="row">
                        
                      <div class="col-sm-12 col-lg-12" style="display: flex;flex-direction: row;justify-content: space-around;" >
                      <button type="submit" name="submit" style="max-width: 40%;padding: 0px;" class="btn btn-info btn-lg form-control">Submit</button>
                      </div>
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