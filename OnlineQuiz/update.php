<?php

include "connect.php";

session_start();

$Uname=$_SESSION['xyz'];

if(!$_SESSION['xyz'] || !$_SESSION['pasw'])
{
  header("location:Teacher_Login.php");
}


if(isset($_POST["delete"]))
{
    $id=$_POST["id"];
    $query=" DELETE FROM  add_question where `Id`='$id'";

    if($result=@mysqli_query($connect, $query))
     {
        echo ' <script> alert("Question Delete Succesfully") </script>';

     }

    else
     {
         echo ' <script> alert("Question Not Delete") </script>';
     }
    
    header("Refresh: 0;");
    unset($_POST["delete"]);
     
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
    <title>Update Question</title>
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
                  <?php  echo " Welcome" . ", " . $Uname ?>
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
                    <li class=active>
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
                         <button type="button" style =" margin-left: 18%" class="btn btn-info btn-lg" data-toggle="modal"  data-target="#myModal1" >Log Out</button>
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
                        <a class="navbar-brand" href="#pablo">Update / Delete Question Here </a>
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
                                <h5 class="title" align="center">Your Added Questions List </h5>
                            </div>
                            <form class="form-horizontal" method="POST" action="update.php">
                            <div>
                              <input type"text" style = "width:20%; margin-left :8%" class="form-control" id="Search" placeholder="Title" name="title" required="">
                            </div>
                            <div>
                              <button type="submit" class="btn btn-info btn-md"  style = "margin-left :8%" name= "filter" >Search</button>
                            </div>
                          </form>
                            <div class="card-body">
                                
                    

                  <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <div class="row">

                                             <div class="col-md-2">
                                            <th> S.No </th>
                                            </div>

                                             <div class="col-md-6">
                                               <th> Question </th>
                                               </div>

                                              <div class="col-md-2">
                                                <th> Update </th>
                                                 </div>
                                              <div class="col-md-2">
                                              <th> Delete </th>  
                                              </div> 

                                             </div>                              
                                        </thead>
                            
                             <?php
                               $Uname=$_SESSION['xyz'];
                               
                              // If Title is not selected
                              if(!isset($_POST['filter']))
                               $query=" SELECT * FROM add_question where `Teacher_id`= '$Uname'";
                             else{               
                                 $title=$_POST["title"];
                                 $query=" SELECT * FROM add_question where `Title`='$title' AND `Teacher_id`= '$Uname'";

                                  }

                               $result=mysqli_query($connect, $query);

                               $cout=mysqli_num_rows($result);

                                  if($cout>0)
                                  {
                                    $count=1;
                                   
                                   while($row=mysqli_fetch_array($result))
                                    {
                                     
                                      $question=$row['Question'];
                                      $question_id=$row['Id'];
                                      $opt1=$row['Opt1'];
                                      $opt2=$row['Opt2'];
                                      $opt3=$row['Opt3'];
                                      $opt4=$row['Opt4'];
                                      $copt=$row['C_opt'];

                                      if($copt == $opt1)
                                        $copt ='a';
                                      else if($copt==$opt2)
                                        $copt ='b'; 
                                      else if($copt==$opt3)
                                        $copt ='c';
                                      else
                                        $copt ='d';
                                        
                                        
                                        echo "<tr>";

                                        echo "<td>" . $count . "</td>";
                                        echo "<td>" . $question . "</td>";
                                       
                                     
                                        
                                        echo "<td><a href=\" update_question.php?id=$question_id \">  <button type=\"submit\" name=\"submit\"  class=\"btn btn-info btn-sm form-control form-control\" > Update</button></a> </td>";
                                        echo "<td> <button type=\"submit\" name=\"submit\" onclick=\" setid('$question_id')\" data-toggle=\"modal\"  data-target=\"#myModal\" class=\"btn btn-info btn-sm form-control  form-control\" > Delete</button> </td>"; 
                                        
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td> </td>";
                                        echo "<td> (a)  $opt1 ";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td> </td>";
                                        echo "<td> (b)  $opt2  </td>";
                                         echo "</tr>";

                                        echo "<tr>";
                                        echo "<td> </td>";
                                        echo "<td> (c)  $opt3 </td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td> </td>";
                                        echo "<td> (d)  $opt4 </td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td> </td>";
                                        echo "<td> Correct : $copt </td>";
                                        echo "</tr>";
  
                                        
                                         $count++;
                                    }
                                 }
                        

                               else
                                 {
                                       echo "<tr>";
                                        echo "<td> </td>";
                                        echo "<td> No Question Added By This User ";
                                        echo "</tr>";
                                 
                                    
                                 }

                                    
                            


                            ?> 
                                 

                         </table>
                   </div>
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
          <h4 class="modal-title"> Do You really want to delete this Question</h4>
        </div>
        <div class="modal-body">
          <form action="#" method="POST">
            <div class="form-group">
                <input type="hidden"  class="form-control" name="id" id="qid">
            </div>
                     <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-md" name= "delete" >Delete</button>
        </div>
         </form>

        </div>
       
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal1" role="dialog">
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

  <script type="text/javascript">
      function setid(str)
      {
        //var loo = str;
        //document.cookie = " lo = loo " ;
        // console.log(lo);
        document.getElementById('qid').value = str ;
      }
  </script>



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