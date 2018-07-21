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
    
    $Email=$_POST["email"];
    $Fname=$_POST["fname"];
    $Lname=$_POST["lname"];
    $Contact=$_POST["contact"];
    $Address=$_POST["address"];
    $City=$_POST["city"]; 
    $Country=$_POST["country"];
    $Pin=$_POST["pin"];

    $query="UPDATE teacher_signup SET `Email`='$Email', `F_name`='$Fname', `L_name`='$Lname', `Contact`='$Contact', `Address`='$Address', `City`='$City', `Country`='$Country', `Pin`='$Pin' where `Id`= '$User_Name'";
    
   if( $result= mysqli_query($connect, $query))
   {

    echo '<script>alert("Profile Updated Sucessfully")</script>'; 


   }

   else
   {
      echo '<script>alert("Can not Update Profile")</script>'; 

   }

 }

 $query="SELECT * FROM teacher_signup where `Id` = '$User_Name' ";

    $result=mysqli_query($connect, $query);

     $count= @mysqli_num_rows($result);

    if($count>0)
    {
        $row=mysqli_fetch_array($result);

        $pass=$row['password'];
        $email=$row['Email'];
        $fname=$row['F_name'];
        $lname=$row['L_name'];
        $contact=$row['Contact'];
        $address=$row['Address'];
        $country=$row['Country'];
        $city=$row['City'];
        $pin=$row['Pin'];

    }
    else
    {
        echo ' <script> alert("Some Problem in Database") </script>';
    } 



if(isset($_POST["change"]))
 {
    $Old=$_POST["old"];
    $New=$_POST["new"];
    $Confirm=$_POST["confirm"];

    if($pass == $Old)
    {

    $query= " UPDATE teacher_signup SET `password`='$New' where `Id`='$User_Name'";

    $result=mysqli_query($connect, $query);

    echo '<script> alert("Password Change Sucessfully") </script>';
    }
    else
    {
        echo '<script> alert(" Password Can not Change due to Invalid Old Password") </script>';
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
    <title>Edit Profile</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
   
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
                    <li >
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
                    
                    <li class=active>
                        <a href="#">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Edit Profile</p>
                        </a>
                    </li>
                    <li class="active-pro">
                       
                        <button type="button" style =" margin-left: 18%" class="btn btn-info btn-lg" data-toggle="modal"  data-target="#myModal" >Log Out</button>
                            <i class="glyphicon glyphicon-Log-out"></i>
                            <!-- <p><b>Logout</b></p> -->
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
                        <a class="navbar-brand" href="#pablo">Update Your Profile Here</a>
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
                            <div class="row">
                            <div class="col-md-9">
                                <h5 class="title">Edit Profile</h5>
                            </div>

                             <div class="col-md-3">
                             <div class="form-group">
                              <!-- <label> Change Password</label> -->
                                 <button type="button" class="btn btn-info btn-lg" data-toggle="modal"  data-target="#myModal1" >Change Password</button>
                                 </div> 
                            </div>
                            </div>

                            </div>
                            <div class="card-body">
                                
                            <form action ="#" class="form-horizontal" method="POST">
                            <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Username</label>
                                            </div>
                                        </div>
                                                <input type="text" name = "uname" class="form-control" disabled="true"  placeholder="Username" value=" <?php echo $User_Name ?>">
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name= "email"  required="" class="form-control" placeholder="Email" value=" <?php echo $email ?>">
                                            </div>
                                        </div>
                                        </div>
                                    
                                        
                                 
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="fname" required="" class="form-control" placeholder="First Name" value=" <?php echo $fname ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lname" required="" class="form-control" placeholder="Last Name" value=" <?php echo $lname ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6  pr-1">
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input type="text" name="contact" required="" class="form-control" placeholder="Mob.No" value=" <?php echo $contact ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" required="" class="form-control" placeholder="Address" value=" <?php echo $address ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" required="" class="form-control" placeholder="City" value=" <?php echo $city ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country" required="" class="form-control" placeholder="Country" value=" <?php echo $country ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="text" name="pin" required="" class="form-control" placeholder="Pin Code" value=" <?php echo $pin ?>">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <label class="col-sm-10 control-label"></label> 
                                       <div class="col-sm-2">
                                         <button type="submit" name="submit" class="btn btn-info btn-md">Submit</button>
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




         <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Password</h4>
        </div>
        
        <div class="modal-body">
          <form action="#" method="POST">
              <div class="col-md-12 px-1">
                 <div class="form-group">
                    <label>Old Password</label>
                        <input type="password" class="form-control" name="old" placeholder=" Enter old password" required="" >
                                            </div>
                                        </div>

                 <div class="col-md-12 px-1">
                 <div class="form-group">
                    <label>New Password</label>
                        <input type="password" class="form-control" name="new" id="password" placeholder="Enter new password" required="">
                                            </div>
                                        </div>
                
             <div class="col-md-12 px-1">
                 <div class="form-group">
                    <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm" id="confirm_password" placeholder="Confirm password" required="">
                                            </div>
                                        </div>

                     <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-md" name= "change" >Change</button>
        </div>
         </form>

        </div>
       
      </div>
      
    </div>
  </div>


 

  <script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
</html>