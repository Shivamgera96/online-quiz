<?php

include "connect.php";

$id=$_GET["id"];

if(isset($_POST["update"]))
{
      
      $Que=$_POST["que"];
      $Opt1=$_POST["opt1"];
      $Opt2=$_POST["opt2"];
      $Opt3=$_POST["opt3"];
      $Opt4=$_POST["opt4"];
      $Correct=$_POST["correctOpt"];
      $Title=$_POST["title"];

     

    $correctAnswer = $_POST["correctOpt"];

    if($correctAnswer == "1")
        $correctAnswer = $Opt1;
    else if($correctAnswer == "2")
        $correctAnswer = $Opt2;
    else if($correctAnswer == "3")
        $correctAnswer = $Opt3;
    else if($correctAnswer == "4")
         $correctAnswer = $Opt4;

    $query="UPDATE add_question SET `Question`='$Que', `Opt1`='$Opt1', `Opt2`='$Opt2', `Opt3`='$Opt3', `Opt4`='$Opt4', `C_opt`='$correctAnswer', `Title`='$Title' where `Id`= '$id'";
    
    $result=mysqli_query($connect, $query);

   
    echo '<script> if(!alert("Question Update Sucessfully")) document.location = ' .'"update.php"</script>';

    
      
    }
  


$query="SELECT * FROM add_question where `Id`='$id'";

if($result=mysqli_query($connect, $query))
{
    $count=mysqli_num_rows($result);

    if($count>0)
    {
        $row=mysqli_fetch_array($result);
    
    $que=$row['Question'];
    $opt1=$row['Opt1'];
    $opt2=$row['Opt2'];
    $opt3=$row['Opt3'];
    $opt4=$row['Opt4'];
    $copt=$row['C_opt'];
    $title=$row['Title'];
   }
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
<body style="background-color: white">

     <div class="container">
                <div class="jumbotron">
                        <center><h1> Update Question </h1></center>
                      </div>
        </div>

    <form  action="#" class="form-horizontal" method="POST">
                    
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="Que">Question</label>
                            <div class="col-sm-10">
                            <input type="text" id="Que"  style="width: 88%" name="que" class="form-control" value= "<?php echo $que ?>" required="">
                            </div>
                          </div>
                
                          <div class="form-group">
                                <label class="col-sm-2 control-label" for="Opt1">Option 1:</label>
                                <div class="col-sm-10">
                                <input type="text" id="Opt1" style="width: 88%" name="opt1" class="form-control" value="<?php echo $opt1 ?>" required="">
                              </div>
                              </div>
                  
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="Opt2">Option 2:</label>
                                  <div class="col-sm-10">
                                  <input type="text" id="Opt2"  style="width: 88%" name="opt2" class="form-control" value="<?php echo $opt2 ?>" " required="">
                                </div>
                                </div>
                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="Opt3">Option 3:</label>
                                    <div class="col-sm-10">
                                    <input type="text" id="Opt3" name="opt3" style="width: 88%"  class="form-control" value="<?php echo $opt3 ?>"  required="">
                                  </div>
                                  </div>
                
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label" for="Opt4">Option 4:</label>
                                      <div class="col-sm-10">
                                      <input type="text" id="Opt4" name="opt4" style="width: 88%"  class="form-control" value="<?php echo $opt4 ?>" required="">
                                    </div>
                                    </div>

                                    
                  
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="CorrectOpt" style="width: 88%"  name="correct" required="">Correct Option </label>
                        <div class="col-sm-10">
                        <label class="radio-inline">
                           <input type="radio" name="correctOpt" <?php if($copt==$opt1) {?> checked="true" <?php } ?> value ="1" >Option 1
                        </label>
                         <label class="radio-inline">
                             <input type="radio" name="correctOpt" <?php if($copt==$opt2) {?> checked="true" <?php } ?> value ="2" >Option 2
                        </label>
                         <label class="radio-inline">
                           <input type="radio" name="correctOpt" <?php if($copt==$opt3) {?> checked="true" <?php } ?> value ="3" >Option 3
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="correctOpt"  <?php if($copt==$opt4) {?> checked="true" <?php } ?> value ="4">Option 4
                      </label>

                      </div>
                      </div>
                
                      <div class="form-group">
                                      <label class="col-sm-2 control-label" for="Title">Quiz Title:</label>
                                      <div class="col-sm-10">
                                      <input type="text" id="Title" name="title" style="width: 88%"  class="form-control" value="<?php echo $title ?>"  required="">
                                    </div>
                                    </div>

                      <div class="row">
                        
                      <div class="col-sm-12 col-lg-12" style="display: flex;flex-direction: row;justify-content: space-around;" >
                      <button type="submit" name="update" style="max-width: 40%;padding: 0px;" class="btn btn-info btn-lg form-control">Update</button>
                      </div>
                 </div>
                   
                  </form>