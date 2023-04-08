<?php 
//Database Connection
require 'config.php';
if(isset($_POST['submit']))
  {
  	$uid=$_GET['userid'];
  	//getting the post values
  $upload_quiz_img=$_FILES["upload_quiz_img"]["name"];
  $quiz_ques = $_FILES['quiz_ques']['name'];
  $quiz_ans = $_FILES['quiz_ans']['name'];
   $oldppic=$_POST['oldpic'];
   $quiz_ques= $_POST['quiz_ques'];
   $quiz_ans=$_POST['quiz_ans'];
$oldupload_quiz_img="img"."/".$oldppic;
// get the image extension
$extension = substr($upload_quiz_img,strlen($upload_quiz_img)-4,strlen($upload_quiz_img));
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
$imgnewfile = $_FILES['upload_quiz_img']['name']; 
// $imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["upload_quiz_img"]["tmp_name"],"img/".$imgnewfile);
  // Query for data insertion
     $query=mysqli_query($con, "update quiz set quizdimg='$imgnewfile' where id='$uid' ");
    if ($query) {
    	//Old pic
    	unlink($oldupload_quiz_img);
    echo "<script>alert('Profile pic updated successfully');</script>";
    echo "<script type='text/javascript'> document.location ='add_quiz.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
//2nd
$oldquiz_ques="img"."/".$oldquiz_ques;
// get the image extension
$extension = substr($quiz_ques,strlen($quiz_ques)-4,strlen($quiz_ques));
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
$imgnewquiz_ques = $_FILES['quiz_ques']['name']; 
// $imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["quiz_ques"]["tmp_name"],"img/".$imgnewquiz_ques);
  // Query for data insertion
     $query=mysqli_query($con, "update quiz set quizquestion='$imgnewquiz_ques' where id='$uid' ");
    if ($query) {
    	//Old pic
    	unlink($oldquiz_ques);
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
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
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
<input type="hidden" name="oldpic" value="<?php  echo $row['quizdimg'];?>">
	<div class="form-group">
<img src="img/<?php  echo $row['quizdimg'];?>" width="120" height="120">
		</div>

         <div class="form-group">
        	<input type="file" class="form-control" name="upload_quiz_img"  required="true">
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