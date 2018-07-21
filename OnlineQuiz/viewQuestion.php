
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>View_Questions</title>
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

<!--<form style="align-items: center;" method="POST" action="#">-->
	

<?php

include 'connect.php';
session_start();

if(!$_SESSION['Reg'])
      {
        header("location:Student_Signup.php");
      }
// echo "shivam".$_SESSION['Reg']. "dsgkhsdkjdsj ds dkjsj,djsjdsdj dfjkhdkj";

$str=$_SESSION['questions'];
$time=$_SESSION['time'];

$result=explode(',',$str);
// $i=0;

  // $correct=$_POST["correct"];
  // $attempt=$_POST["atm"];

  // echo "sbdm,dsjdsj sdj,". $correct . "shivam" . $attempt . "gera";
  
  

    echo"
    
      

           <div style=\"display:flex;flex-direction:row;justify-content:flex-end;\">
              <div id=\"timer\" style=\"margin-right:480px;\">

              </div>
         <button  onclick=\"finishTest(0)\" class=\"btn btn-success\" style=\"margin-right:15px;\">finish Quiz</button>
                  </div>";
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
				// echo "Question ".$s. ":";
			    $pp= $row['Question'] ;
			    $opt1=$row['Opt1'];
			    $opt2=$row['Opt2'];
			    $opt3=$row['Opt3'];
			    $opt4=$row['Opt4'];
			    $copt=$row['C_opt'];
                

			    if($copt==$opt1)
			    	$copt=1;
			    else if($copt==$opt2)
			    	$copt=2;
                 else if($copt==$opt3)
			    	$copt=3;
			    else
			    	$copt=4;


				     echo"
					<hr style=\"color: black; height: 1px; background-color: black;\">
					<h3 style=\"margin-top: 0px;\">Question: ".$s."</h3>
					<p style=\"margin-bottom: 20px; font-size: 1.2em;\" id=".$s."> ".$pp."</p>
                    <hr style=\"color: black; height: 1px; background-color: black;\">
				  
				    <div style=\"margin: 10px 0px;   \">
				
				        <input type=\"radio\" name='question-answers[".$s."]'  value=\"1\" id='r1".$s."' />
				        <label for=\"question-1-answers-A\">A)
				        ".$opt1."
				        </label>
				    </div>
				    
				    <div style=\"margin: 10px 0px; \">
				        <input type=\"radio\" name='question-answers[".$s."]' value=\"2\" id='r2".$s."'/>
				        <label for=\"question-1-answers-B\">B)  ".$opt2."</label>
				    </div>
				    
				    <div style=\"margin: 10px 0px; \">
				        <input type=\"radio\" name='question-answers[".$s."]' value=\"3\" id='r3".$s."'/>
				        <label for=\"question-1-answers-C\">C)  ".$opt3."</label>
				    </div>
				    
				    <div style=\"margin: 10px 0px; \">
				        <input type=\"radio\" name='question-answers[".$s."]' value=\"4\" id='r4".$s."'/>
				        <label for=\"question-1-answers-D\">D)  ".$opt4."</label>
				    </div>" ;

				             echo" <button  onclick=\"saveAnswer(".$s.",".$copt.")\" class=\"btn btn-primary\">save</button>";
					   }

                             
                              $s++;
					   	
					   
}
      

                     echo "<br>";
 
?>


<script>

        var Result = [];
        var no_of_question="<?php echo $s ?>";
       // <?php  $time ?>;
       // $time=$_SESSION['time'];

       // console.log("time " + $time);


        // console.log("no of question " + <?php $s ?>);
	function saveAnswer(question_no,correctAnswer){
                              console.log("within function0");

                              document.getElementById(question_no).style.backgroundColor="grey";
                              document.getElementById(question_no).style.color="white";

                    
		var selected;
		   var r1="r1"+question_no;
		   var r2="r2"+question_no;
		   var r3="r3"+question_no;
		   var r4="r4"+question_no;

		    console.log("r11 " + r1+ r2 + r3 + r4);
		     
		     

		  if(document.getElementById(r1).checked)
		  {
		  	   selected=document.getElementById(r1).value;

		  }else if(document.getElementById(r2).checked){
		  		selected=document.getElementById(r2).value;

		  	}
		  else if(document.getElementById(r3).checked){
		  		selected=document.getElementById(r3).value;

		  	}
		  	else
		  	    if(document.getElementById(r4).checked){
		  		selected=document.getElementById(r4).value;

		  	}

		  	console.log("within save answer " + question_no + " " + correctAnswer + " " + "selected " + selected);
             resultJson={
             	  question_no:question_no,
             	  correct: correctAnswer,
             	  selected:selected
             }
             var found = Result.find(element=>{

             	   return element.question_no == question_no
             })
             if(found == undefined)
             {
                     Result.push(resultJson);
             }
             else{
                   
                   found.question_no=question_no,
                   found.correct = correctAnswer,
                   found.selected=selected
             }

             console.log("result json " + Result);
         }


             function finishTest(x){
                     
                     if(x==0){
             	    var answer = confirm("Are your sure to leave the test");
             	}
             	else
             	{
             		answer=1;
             	}

             	    if(answer){

             	    	   countAnswer=0;
             	    	   var correctAnswer=0;
             	    	   var noofAttempted=0;

             	    	   Result.forEach((elem)=>{

             	    	   	console.log("correct answer "+elem.correct);

             	    	   	     if(elem.correct == elem.selected){
             	    	   	     	    countAnswer++;
             	    	   	     }
             	    	   	     noofAttempted++;

             	    	   });
             	    //	  document.querySelector('#correctanswer').value=countAnswer;
             	     //      document.querySelector('#attempted').value=noofAttempted;
             	     //      document.querySelector('#noofque').value=no_of_question-2;

             	     no_of_question-=2;

             	  var str='result.php?countAnswer='+countAnswer+'&noofAttempted='+noofAttempted+'&no_of_question='+no_of_question;

             	           window.open(str,'_self');

             	  //    document.querySelector('#findResult').submit();
             	    }
                    else{
             	console.log("not sure");
             }

             }
             
                      
       var val = "<?php echo $time ?>";
       
            
       document.getElementById('timer').innerHTML=`<h3>Quiz will ends in ${val}min</h3>`;

         function decMinute(){
                       val=val-1;
                          
                    var minute = setInterval(function(){
                          val=val-1;
                    	  var second=59;
                    	      var ss = setInterval(function(){
                                    
                                     document.getElementById('timer').innerHTML=` <h3> Quiz will ends in ${val}min${second}sec </h3>`;
                                    second--;
                                    if(second==0)
                                    {
                                    	clearInterval(ss);
                                    }
                    	      },1000)
                      
                          if(val==-1)
                          {
                          	  clearInterval(minute);
                          	  finishTest(1);

                          	  //document.querySelector('#findResult').submit();
                          }
                    },60000)
         };

         decMinute();
       
	
</script>

</body>

</html>

