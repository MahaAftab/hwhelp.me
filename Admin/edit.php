<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Quiz</title>
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
    $id = $_POST['id'];
    $course_id= $_POST['course_id'];
    $uni_id = $_POST['uni_id'];
    $quiz_title=$_POST['quiz_title'];
   
    $quiz_id=$_POST['quiz_id'];
   
    $quiz_tran=$_POST['quiz_tran'];
    
    $upload_quiz_img=$_FILES["upload_quiz_img"]["name"];
    $quiz_ques = $_FILES['quiz_ques']['name'];
    $quiz_ans = $_FILES['quiz_ans']['name'];

    //Query for data updation
     $query=mysqli_query($con, "UPDATE `quiz` SET UniversityID='$uni_id',courseid='$course_id',quizId='$quiz_id',quiztittle='$quiz_title',quiztranslation='$quiz_tran' WHERE id='$eid'");
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='add_quiz.php'; </script>";
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
$ret=mysqli_query($con,"select * from quiz where ID='$eid'");
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
                      <label>Quiz Id</label>
                      <input type="text" class="form-control" id="quiz_id" name="quiz_id"value="<?php  echo $row['quizId'];?>">
                    </div> 
                    <div class="form-group">
                      <label>Quiz Title</label>
                      <input type="text" class="form-control"  id="quiz_title" name="quiz_title"value="<?php  echo $row['quiztittle'];?>">
                    </div>
                    <div class="form-group">
                      <label>Upload Quiz Image</label>
                      <input type="text" class="form-control"  value="<?php  echo $row['quizdimg'];?>"readonly>
                  
                      <!-- <img src="img/<?php  echo $row['quizdimg'];?>" width="120" height="120"> -->
                  
                      <a href="include/change-quiz-image.php?userid=<?php echo $row['id'];?>">Change Image</a>

                    </div> 
                 
                    <div class="form-group">
                      <label>Quiz Question</label>
                      <input type="text" class="form-control"  value="<?php  echo $row['quizquestion'];?>"readonly>
                   
                  
                  <a href="include/change-image2.php?userid=<?php echo $row['id'];?>">Change Image</a>

                    
                    </div>
                
                    <div class="form-group">
                      <label>Quiz Answer</label>
                      <input type="text" class="form-control"  value="<?php  echo $row['quizanswer'];?>"readonly>
                  
                  
                  <a href="include/change-image3.php?userid=<?php echo $row['id'];?>">Change Image</a>

                    </div>
                    <div class="form-group">
                      <label>Quiz Translation</label>
                      <input type="text" class="form-control" id="quiz_tran" name="quiz_tran" value="<?php  echo $row['quiztranslation'];?>">
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
