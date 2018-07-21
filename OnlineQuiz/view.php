<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Quiz view</title>
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

<form style="align-items: center;" method="POST" action="view.php">

<?php

include 'connect.php';

$quiz_id=$_GET["id"];



 $query="SELECT * FROM quiz where `quiz_id`='$quiz_id'";

 if($res=mysqli_query($connect, $query))
 {
    $count=mysqli_num_rows($res);

    if($count>0)
    {
        $row=mysqli_fetch_array($res);

        $str=$row['question_id'];
 
    }

 }





$result=explode(',',$str);

$s=1;
foreach ($result as $key) 
{
             // echo $key[0];
			$query=" SELECT * from add_question where `Id`='$key'";

			$result=mysqli_query($connect,$query);

			$count=mysqli_num_rows($result);
			if($count>0)
			{
				$row=mysqli_fetch_array($result);
				
			    $pp= $row['Question'] ;
			    $opt1=$row['Opt1'];
			    $opt2=$row['Opt2'];
			    $opt3=$row['Opt3'];
			    $opt4=$row['Opt4'];
			    $copt=$row['C_opt'];

			    
			    
                       

			    
				     echo"
					<hr style=\"color: black; height: 1px; background-color: black;\">
					<h3 style=\"margin-top: 0px;\">Question: ".$s."</h3>
					<p style=\"margin-bottom: 20px; font-size: 1.2em;\"> ".$pp.";</p>
                    <hr style=\"color: black; height: 1px; background-color: black;\">";
				   echo " 
				    <div style=\"margin: 10px 0px; \">
				
				        <input type=\"radio\" name='question-answers[".$s."]'  value=\"A\" />
				        <label for=\"question-1-answers-A\">A)
				        ".$opt1."
				        </label>
				    </div>
				    
				    <div style=\"margin: 10px 0px;\">
				        <input type=\"radio\" name='question-answers[".$s."]' value=\"B\" />
				        <label for=\"question-1-answers-B\">B)  ".$opt2."</label>
				    </div>
				    
				    <div style=\"margin: 10px 0px; \">
				        <input type=\"radio\" name='question-answers[".$s."]' value=\"C\" />
				        <label for=\"question-1-answers-C\">C)  ".$opt3."</label>
				    </div>
				    
				    <div style=\"margin: 10px 0px;  \">
				        <input type=\"radio\" name='question-answers[".$s."]' value=\"D\" />
				        <label for=\"question-1-answers-D\">D)  ".$opt4."</label>
				    </div> ";
					   }


					   $s++;	
					   
}

                     
                     echo "<br>";
 
                 
?>
</form>
</body>
</html>
