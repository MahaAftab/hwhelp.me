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
if(isset($_POST['submit']))
{
    $eid=$_POST['editid'];
    //Getting Post Values
    $uni_id = $_POST['uni_id'];
    $uni_name = $_POST['uni_name'];
    $uni_details = $_POST['uni_details'];
  

    //Query for data updation
    $query = mysqli_query($con, "UPDATE `university` SET UniversityID='$uni_id',Universityname='$uni_name',Universitydetail='$uni_details' WHERE id='$eid'");
    
    if ($query) {
        echo "<script>alert('You have successfully updated the data');</script>";
        echo "<script type='text/javascript'> document.location ='add_uni.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}

?>
<!-- Modal - EDIT LECTURE -->
<?php
$eid = $_GET['editid'];
$ret = mysqli_query($con,"SELECT * FROM university WHERE id='$eid'");
while ($row = mysqli_fetch_array($ret)) {
?>

    <div class="signup-form">
    <form action="" autocomplete="off" method="POST" enctype="multipart/form-data">
    <input type="hidden" class="form-control"  id="id" name='id'>
      
        <div class="form-group">
            <label>University Id</label>
            <input type="text" class="form-control" id="uni_id" name="uni_id" value="<?php echo $row['UniversityID']; ?>">
        </div>
        <div class="form-group">
            <label>University Name</label>
            <input type="text" class="form-control" id="uni_name" name="uni_name" value="<?php echo $row['Universityname']; ?>">
        </div>
        <div class="form-group">
            <label>University Details</label>
            <input type="text" class="form-control" id="uni_details" name="uni_details" value="<?php echo $row['Universitydetail']; ?>">
        </div>
        <div class="form-group">
                    <label>Change university Image</label>
                    <input type="text" class="form-control"  id="uni_img" name="uni_img"value="<?php  echo $row['Universityimg'];?>">
                    <a href="include/change-uni-img.php?userid=<?php echo $row['id'];?>">Change Image</a>
                  </div>
        <button type="submit" class="btn btn-primary m-t-15 waves-effect" value="Update" name="submit">Update</button>
    </form>
</div>
<?php } ?>
</body>
</html>
  
  