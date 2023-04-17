<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit lectures</title>
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
if(isset($_POST['editbtn']))
{
    $eid=$_POST['editidlec'];
    //Getting Post Values
    $course_id = $_POST['course_id'];
    $uni_id = $_POST['uni_id'];
    $lec_title = $_POST['lec_title'];
    $lec_desc = $_POST['lec_desc'];

    //Query for data updation
    $query = mysqli_query($con, "UPDATE `lecture` SET UniversityID='$uni_id',courseid='$course_id',lectittle='$lec_title',lecdescription='$lec_desc' WHERE id='$eid'");
    
    if ($query) {
        echo "<script>alert('You have successfully updated the data');</script>";
        echo "<script type='text/javascript'> document.location ='Add_lectures.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}

?>
<!-- Modal - EDIT LECTURE -->
<?php
$eid = $_GET['editidlec'];
$ret = mysqli_query($con,"SELECT * FROM lecture WHERE id='$eid'");
while ($row = mysqli_fetch_array($ret)) {
?>
<div class="signup-form">
    <form action="" autocomplete="off" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" class="form-control" id="editidlec" name="editidlec" value="<?php echo $row['id']; ?>">
        </div>
        <div class="form-group">
            <label>Course Id</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php echo $row['courseid']; ?>">
        </div>
        <div class="form-group">
            <label>University Id</label>
            <input type="text" class="form-control" id="uni_id" name="uni_id" value="<?php echo $row['UniversityID']; ?>">
        </div>
        <div class="form-group">
            <label>Lecture Title</label>
            <input type="text" class="form-control" id="lec_title" name="lec_title" value="<?php echo $row['lectittle']; ?>">
        </div>
        <!-- <div class="form-group">
                    <label>Upload Lecture Image</label>
                    <input type="text" class="form-control"  id="upload_lec_img" name="upload_lec_img"value="<?php  echo $row['lecdimg'];?>">
                    <a href="include/change-img-lec.php?userid=<?php echo $row['id'];?>">Change Image</a>
                  </div> -->
                  <div class="form-group">
                    <label>Upload Lecture Documents</label>
                    <input type="text" class="form-control"  id="upload_doc" name="upload_doc"value="<?php  echo $row['lecdocuments'];?>">
                    <a href="include/change-doc-lec.php?userid=<?php echo $row['id'];?>">Change Image</a>
                  </div>
        <div class="form-group">
            <label>Lecture Description</label>
            <textarea class="form-control" id="lec_desc" name="lec_desc"><?php echo $row['lecdescription']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary m-t-15 waves-effect" value="Update" id="editbtn" name="editbtn">Update</button>
    </form>
</div>
<?php } ?>
</body>
</html>
  
  