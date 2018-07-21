<?php
 
 include "connect.php";
 session_start();


if(!$_SESSION['xyz'] || !$_SESSION['pasw'])
{
  header("location:Teacher_Login.php");
}

 $User_Name= $_SESSION['xyz'];
//  echo "..........." . "$_SESSION['xyz']";
  
 if(isset($_POST["delete"]))
{


    $id=$_POST["id"];
    $query=" DELETE FROM  quiz where `quiz_id`='$id'";

    if($result=@mysqli_query($connect, $query))
     {
        echo ' <script> alert("Quiz Delete Succesfully") </script>';
     }

    else
     {
         echo ' <script> alert("Quiz Not Delete") </script>';
     }

     header("Refresh: 0;");
    unset($_POST["delete"]);     
}

if(isset($_POST['logout']))
 {

      $_SESSION['xyz'] = "";
      $_SESSION['pasw'] = "";


      // session_unset();

      // session_destroy();



     //echo "dsfdsfdsafds  dsfadsfasfadsfdsf dsafsdf log out = ".$_SESSION['xyz'] ." ddfdfdff";


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
    <title>Teacher_Home</title>
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



<!-- 
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head> -->


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
                    <li class=active>
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

                            <!-- <i class="glyphicon glyphicon-Log-out"></i> -->
                           <!--  <p><b>Logout</b></p> -->
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
                       <!--  <a class="navbar-brand" href="#pablo">Home</a> -->
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
                                <h5 class="title" align="center">Your Generated Quiz List </h5>
                            </div>
                            <form class="form-horizontal" method="POST" action="teacherhome.php">
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

                                            <div class="col-md-1">
                                            <th> S.No </th>
                                            </div>


                                             <div class="col-md-2">
                                            <th> Quiz_Id </th>
                                            </div>

                                             <div class="col-md-2">
                                               <th> Password </th>
                                               </div>

                                              <div class="col-md-2">
                                                <th> Title </th>
                                                 </div>

                                             <div class="col-md-1">
                                            <th> Date </th>
                                            </div>
                                            

                                             <div class="col-md-2">
                                            <th> View </th>
                                            </div>

                                              <div class="col-md-2">
                                              <th> Delete </th>  
                                              </div> 

                                             </div>                              
                                        </thead>
                            
                             <?php
                               $Uname=$_SESSION['xyz'];
                               // $quiz_id=$_SESSION['quiz_id'];
                              // If Title is not selected
                              if(!isset($_POST['filter']))
                               $query=" SELECT * FROM quiz where `Teacher_id`= '$Uname'";
                             else{               
                                 $title=$_POST["title"];
                                 $query=" SELECT * FROM quiz where `title`='$title' AND `Teacher_id`= '$Uname' ";

                                  }


                               $result=mysqli_query($connect, $query);

                               $cout=mysqli_num_rows($result);

                                  if($cout>0)
                                  {
                                    $count=1;
                                   
                                   while($row=mysqli_fetch_array($result))
                                    {
                                     
                                      

                                        $pass=$row['password'];
                                        $title=$row['title'];
                                        $date=$row['date'];
                                        $quiz_id=$row['quiz_id'];
                                     


                                        echo "<tr>";

                                        echo "<td>" . $count . "</td>";
                                        echo "<td>" . $quiz_id . "</td>";
                                        echo "<td>" . $pass . "</td>";
                                        echo "<td>" . $title . "</td>";
                                        echo "<td>" . $date . "</td>";
                                     //   echo" <form method=\"get\" action=\"update_question.php\">
                                     //      <input type=\"hidden\" name=\"id\" value=\"$question_id\">
                                     // </form>";
                                        // <a href=\" update_question.php?id=$question_id \"> 
                                        echo "<td> <a href=\" view.php?id=$quiz_id \"> <button type=\"submit\" name=\"view\"  class=\"btn btn-info btn-sm form-control form-control\" > View</button></a> </td>";
                                        echo "<td> <button type=\"submit\" name=\"delete\" onclick=\" setid('$quiz_id')\" data-toggle=\"modal\"  data-target=\"#myModal1\" class=\"btn btn-info btn-sm form-control  form-control\" > Delete</button> </td>"; 
                                        
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
                                 
                                     // echo " No Question Added By This User";
                                 }

                                    
                            


                            ?> 
                                 

                         </table>
                   </div>
              </div>
          </div>
      </div>
   </div> 
</div>
   
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title"> Do You really want to delete this Quiz</h4>
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
                        <form action="#" method="POST">
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