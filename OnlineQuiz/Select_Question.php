<?php
include "connect.php";

session_start();

$Uname=$_SESSION['xyz'];
$title=$_SESSION['title'];
$quiz_id=$_SESSION['quiz_id'];

if(!$_SESSION['xyz'] || !$_SESSION['pasw'])
{
  header("location:Teacher_Login.php");
}

 if(isset($_POST["submit"]) )
 {
 	if(!empty($_POST["check_list"]))
 	{
 		$c=0;
 		$num=$_SESSION['nque'];
 		$val="";
        
 		foreach($_POST["check_list"] as $selected)
 		{
 			$val=$val.$selected.",";
 			$c++;
 		}
 		
 		// $val=implode(',', $val);
 		// echo $val;
 		if($c == $num){
 			
 			$query=" UPDATE `quiz` set `question_id`='$val'  where `quiz_id`='$quiz_id'";
 			$res=mysqli_query($connect,$query);
 			// echo'<script> alert("Your Quiz Created Sucessfully") </script>';
 			echo '<script> if(!alert("Your Quiz Created Sucessfully")) document.location = ' .'"teacherhome.php"</script>';

 		}
 		    
 		else
 		{
 			$var="please select ". $num . " Questions only";
 			echo '<script type="text/javascript">alert("'.$var.'")</script>';
 		}
 	}
 	else
 		{
 			$var="please select ". $num . " Questions only";
 			echo '<script type="text/javascript">alert("'.$var.'")</script>';
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
  <!-- <link rel="stylesheet" href="contain.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



       </head>
     	
       <body >
       <script>
       	var count=0;

       // var checkbox = document.getElementsByName('check_list[]')
       // var ln = checkbox.length
       // alert(ln)

       </script>      
           
       <div class="container con" >      

        <div class="container">
                <div class="jumbotron">
                        <center><h1> Select Questions For Your Quiz </h1></center>
                      </div>
        </div>
		  
		   <form action:"Select_Question.php" method="POST">
            <div class="row">
             <div class="col-sm-11">
 			<h1>Select Question: <span id="count"></span></h1>
 		    </div>
 		 

 		    <div class="col-sm-1">
            <button type="submit" class="btn btn-info btn-md" name ="submit" style="height: 40px; width: 70px"> Submit</button>
            </div>
            </div>
           
                    

										 <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <div class="row">

                                             <div class="col-md-2">
                                            <th> S.No </th>
                                            </div>

                                             <div class="col-md-9">
                                               <th> Question </th>
                                               </div>

                                              <div class="col-md-1">
                                                <th> Select </th>
                                                 </div>
                                             

                                             </div>                              
                                        </thead>
                                        <tbody>
                                         <?php

                               $query=" SELECT * FROM add_question where `Teacher_id`= '$Uname' AND `Title`='$title' ";

                               $result=@mysqli_query($connect, $query);

                               $cout=@mysqli_num_rows($result);

                                  if($cout>0)
                                  {
                                    $count=1;
                                   while( $row=mysqli_fetch_array($result))
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
                                       
                                    
                                        echo "<td> <input type=\"checkbox\" id='Select' name=\"check_list[]\"  value=\"$question_id\"   onclick=\"myFunction(this)\">Select<br> </td>";
                                        echo "<p id=\"text\" style=\"display:none\">Checkbox is CHECKED!</p>";
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
                                        echo "<td> No Question Added By User of Title : ". $title;
                                        echo "</tr>";
                                 
                                     
                                 }

                                    
                            


                            ?> 
                            	</tbody>
                            </table>
									</form>
								</div>
						</div>
						
					  </div>

					  <script>
function myFunction(value) {

    
    if (value.checked == true){
        count=count+1;
    } else {
       count=count-1;
    }
   

    var text = document.getElementById("count");
    text.innerHTML=count;
}
</script>
			  
					</body>
			  </html>