<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
   <!--  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Result List</title>
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

<form style="align-items: center;" method="POST" action="Result_List.php">

<?php
session_start();

include 'connect.php';

$quiz_id=$_GET["id"];


?> 








 <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <div class="row">

                                            <div class="col-md-1">
                                            <th> S.No </th>
                                            </div>


                                             <div class="col-md-1">
                                            <th> Reg_No </th>
                                            </div>

                                             <div class="col-md-2">
                                               <th> Name </th>
                                               </div>

                                              <div class="col-md-2">
                                                <th> Course </th>
                                                 </div>

                                            
                                             <div class="col-md-1">
                                            <th> Semester </th>
                                            </div>

                                             <div class="col-md-1">
                                            <th> Total Question </th>
                                            </div>
                                            
                                            <div class="col-md-1">
                                            <th> Attempted </th>
                                            </div>
                                             
                                             <div class="col-md-1">
                                            <th> Correct </th>
                                            </div>

                                             <div class="col-md-1">
                                            <th> Incorrect </th>
                                            </div>

                                             </div>                              
                                        </thead>
                            
                             <?php

                               $Uname=$_SESSION['xyz'];
                             
                                $query="SELECT * FROM result where `qid`='$quiz_id'";

                                  $s = 1;
                                $res=mysqli_query($connect, $query);

                                $cont=mysqli_num_rows($res);

                               if($cont>0)
                                 {
    
                                     while($row=mysqli_fetch_array($res))
                                       {
                                           $sid=$row['student_id'];
                                           $total=$row['total'];
                                           $attempt=$row['attempt'];
                                           $correct=$row['correct'];
                                           $incorrect=$row['incorrect'];

                                           $query=" SELECT * from student_signup where `Registration_no`='$sid'";

			                               $result=mysqli_query($connect,$query);

			                               $count=mysqli_num_rows($result);
			                               if($count>0)
			                                {
				                               $row=mysqli_fetch_array($result);
				
			                                   $name= $row['S_Name'];
			                                   $course=$row['Course'];
                                               $sem=$row['Semester'];
                                            }
                                          
                                         echo "<tr>";

                                         echo "<td>" . $s . "</td>";
                                         echo "<td>" . $sid . "</td>";
                                         echo "<td>" . $name . "</td>";

                                         echo "<td>" . $course . "</td>";
                                         echo "<td>" .  $sem . "</td>";

                                         echo "<td>" . $total . "</td>";
                                         echo "<td>" . $attempt . "</td>";
                                         echo "<td>" . $correct . "</td>";
                                         echo "<td>" . $incorrect . "</td>";
                                  
                                       
                                       
                                        echo "</tr>";

                                         $s++;
                                    }
                                 }
                        
                                 else
                                 {
                                        echo "<tr>";
                                        echo "<td> </td>";
                                        echo "<td> No Result Corresponding to this Quiz ";
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
   
</form>
</body>
</html>
