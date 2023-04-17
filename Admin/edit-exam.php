<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Pastpaper</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <!-- <link rel="stylesheet" href="assets/css/custom.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <link rel="stylesheet" href="assets/css/changeimg.css">
</head>


<body>
<?php 

require 'config.php';
if(isset($_POST['submit']))
  {
  
  	$eid=$_GET['editid'];
  	//Getting Post Values
    
      $course_id = $_POST['course_id'];
      $uni_id = $_POST['uni_id'];
      $exam_title = $_POST['exam_title'];
      $exam_id = $_POST['exam_id'];
      $exam_ques = $_POST['exam_ques'];
      
      //Query for data updation
   
      $query = mysqli_query($con, "UPDATE `pastexam` SET UniversityID='$uni_id', courseid='$course_id', examid='$exam_id', examtittle='$exam_title',examquesimg='$exam_ques' WHERE id='$eid'");

    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='add_past_paper.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!-- Modal - EDIT COURSE-->
<?php

$eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from pastexam where ID='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
<div class="signup-form">

                  <form action="" autocomplete="off" enctype="multipart/form-data" method="POST">
            
                    <input type="hidden" class="form-control"  id="id" name='id'>
                   
                  <div class="form-group">
                      <label>Course Id</label>
                      
                      <input type="text" class="form-control" id="course_id" name="course_id" value="<?php  echo $row['courseid'];?>">
                  </div>
                    <div class="form-group">
                      <label>University Id</label>
                      <input type="text" class="form-control" id="uni_id" name="uni_id" value="<?php  echo $row['UniversityID'];?>">
                    </div>
                    <div class="form-group">
                      <label>Exam Id</label>
                      <input type="text" class="form-control" name="exam_id"value="<?php  echo $row['examid'];?>">
                    </div> 
                    <div class="form-group">
                      <label>Exam Title</label>
                      <input type="text" class="form-control"   name="exam_title"value="<?php  echo $row['examtittle'];?>">
                    </div>
                    <div class="form-group">
                      <label>Exam thumbnail</label>
                      <input type="text" class="form-control"  value="<?php  echo $row['examdimg'];?>"readonly>
                  
                
                  
                  

                    </div> 
                 
                    <div class="form-group">
                      <label>Exam Description</label>
                      <input type="text" class="form-control" name="exam_ques"  value="<?php  echo $row['examquesimg'];?>">
                   
                   </div>
                
                 
                  
                    <button type="submit" class="btn btn-success btn-lg btn-block " name="submit">Update</button>
                  </div>            
                  <?php 
}?>
    
         
      </div>

                </form>
                  </div>
                </div>
              </div>
            </div>
</body>
</html>

  