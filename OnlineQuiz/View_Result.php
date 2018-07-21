<?php
 
 include "connect.php";
 session_start();
 $User_Name= $_SESSION['xyz'];

 if(!$_SESSION['xyz'] || !$_SESSION['pasw'])
{
  header("location:Teacher_Login.php");
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
    <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>View_Result</title>
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
                    <li class=active>
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
                        <a class="navbar-brand" href="#pablo">Your Generated Quizes Result List</a>
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
                            
                            <div class="card-body">
                                
                    

                  <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <div class="row">

                                            <div class="col-md-2">
                                            <th> S.No </th>
                                            </div>


                                             <div class="col-md-2">
                                            <th> Quiz_Id </th>
                                            </div>

                                             <div class="col-md-2">
                                               <th>  Title</th>
                                               </div>

                                              <div class="col-md-2">
                                                <th> Date </th>
                                                 </div>

                                            
                                             <div class="col-md-2">
                                            <th> View </th>
                                            </div>

                                             
                                             </div>                              
                                        </thead>
                            
                             <?php
                               $Uname=$_SESSION['xyz'];
                             
                                 $query=" SELECT * FROM quiz where `Teacher_id`= '$Uname' ";


                               $result=mysqli_query($connect, $query);

                               $cout=mysqli_num_rows($result);

                                  if($cout>0)
                                  {
                                    $count=1;
                                   
                                   while($row=mysqli_fetch_array($result))
                                    {
                                     
                                        $title=$row['title'];
                                        $date=$row['date'];
                                        $quiz_id=$row['quiz_id'];
                                     


                                        echo "<tr>";

                                        echo "<td>" . $count . "</td>";
                                        echo "<td>" . $quiz_id . "</td>";
                                        // echo "<td>" . $pass . "</td>";
                                        echo "<td>" . $title . "</td>";

                                        echo "<td>" . $date . "</td>";
                                    
                                  
                                        echo "<td> <a href=\" Result_List.php?id=$quiz_id \"> <button type=\"submit\" name=\"view\"  class=\"btn btn-info btn-sm form-control form-control\" > Get Result </button></a> </td>";
                                       
                                        echo "</tr>";

                                         $count++;
                                    }
                                 }
                        

                               else
                                 {
                                        echo "<tr>";
                                        echo "<td> </td>";
                                        echo "<td> No Quiz Generated By This User ";
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