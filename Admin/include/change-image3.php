<?php 
//Database Connection
require '../config.php';
if(isset($_POST['submit']))
  {
  	$uid=$_GET['userid'];
  	//getting the post values

  $quiz_ans = $_FILES['quiz_ans']['name'];

   $oldppic=$_POST['oldpic'];
  

//2nd
$oldquiz_ans="../img/quiz"."/".$oldquiz_ans;
// get the image extension
$extension = substr($quiz_ans,strlen($quiz_ans)-4,strlen($quiz_ans));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewquiz_ans = $_FILES['quiz_ans']['name']; 
// $imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["quiz_ans"]["tmp_name"],"../img/quiz/".$imgnewquiz_ans);
  // Query for data insertion
     $query=mysqli_query($con, "update quiz set quizanswer='$imgnewquiz_ans' where id='$uid' ");
    if ($query) {
    	//Old pic
    	unlink($oldquiz_ans);
    echo "<script>alert('Profile pic updated successfully');</script>";
    echo "<script type='text/javascript'> document.location ='add_quiz.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/css/changeimg.css">

</head>
<body>
<div class="signup-form">
    <form  method="POST" enctype="multipart/form-data">
 <?php
$eid=$_GET['userid'];
$ret=mysqli_query($con,"select * from quiz where id='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update your profile pic.</p>
<input type="hidden" name="oldpic" value="<?php  echo $row['quizanswer'];?>">
	<div class="form-group">
<img src="../img/quiz/<?php  echo $row['quizanswer'];?>" width="120" height="120">
		</div>

         <div class="form-group">
        	<input type="file" class="form-control" name="quiz_ans"  required="true">
        	<span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div> 



		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
              <?php 
}?>
    </form>

</div>
</body>
</html>