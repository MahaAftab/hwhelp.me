<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Homework</title>
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
    $hw_id = $_POST['hw_id'];
    $hw_title=$_POST['hw_title'];
   
    $hw_desc=$_POST['hw_desc'];
   
    
    $hw_img=$_FILES["hw_img"]["name"];
    $hw_doc = $_FILES['hw_doc']['name'];
    
    //Query for data updation
     $query=mysqli_query($con, "UPDATE `homework` SET UniversityID='$uni_id',courseid='$course_id',HomeworkId='$hw_id'
     ,hwtittle='$hw_title',Homeworkdimg='$hw_img',Homeworkdocuments='$hw_doc',homeworkdescription='$hw_desc' WHERE id='$eid'");

    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='add_hw.php'; </script>";
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
$ret=mysqli_query($con,"select * from homework where ID='$eid'");
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
                    <input type="text" class="form-control"   id="uni_id" name="uni_id"value="<?php  echo $row['UniversityID'];?>">
                  </div>
                    <div class="form-group">
                      <label>HomeworkId</label>
                      <input type="text" class="form-control" id="hw_id" name="hw_id"value="<?php  echo $row['HomeworkId'];?>">
                    </div> 
                    <div class="form-group">
                      <label>Homework Title</label>
                      <input type="text" class="form-control"  id="hw_title" name="hw_title"value="<?php  echo $row['hwtittle'];?>">
                    </div>
                    
                 
                    <div class="form-group">
                      <label>Homework thumbnail</label>
                      <input type="text" class="form-control" name="hw_img" value="<?php  echo $row['Homeworkdimg'];?>"readonly>
                   
                  
                  <a href="change-image2.php?userid=<?php echo $row['id'];?>">Change Image</a>

                    
                    </div>
                 
                    <div class="form-group">
                      <label>Homework document</label>
                      <input type="text" class="form-control"  value="<?php  echo $row['Homeworkdocuments'];?>"readonly>
                  
                  
                  <a href="change-image3.php?userid=<?php echo $row['id'];?>">Change Image</a>

                    </div>
                    <div class="form-group">
                      <label>Homework Description</label>
                      <input type="text" class="form-control" id="hw_desc" name="hw_desc" value="<?php  echo $row['homeworkdescription'];?>">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block " name="submit">Update</button>
                  </div>            
                  <?php 
}?>
    
         
      </div>

                </form>
                  </div>
              
</body>
</html>
