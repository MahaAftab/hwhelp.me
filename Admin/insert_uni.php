<?php 
  require 'config.php';

if(isset($_POST['addButton']))
{
       $id = $_POST['id'];
       $uni_id = $_POST['uni_id'];
       $uni_name = $_POST['uni_name'];
       $uni_details = $_POST['uni_details'];
     
    
   
    
    $uni_img=$_FILES["uni_img"]["name"];
    $main_img=$_FILES["main_img"]["name"];

 
    $uni_img_dir = "img/uni/";

    // Check if all files were uploaded successfully
    if (!empty($uni_img) && !empty($main_img)) {
        // Allowed extensions
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        // Get the extension of each file
     
        $uni_img_ext = strtolower(pathinfo($uni_img, PATHINFO_EXTENSION));
        $main_img_ext = strtolower(pathinfo($main_img, PATHINFO_EXTENSION));

        // Validate the file extensions
        if (
            in_array($uni_img_ext, $allowed_extensions)&&
            in_array($main_img_ext, $allowed_extensions))
        {
            // Move the uploaded images to the target directories with the original file names
            move_uploaded_file($_FILES["uni_img"]['tmp_name'], $uni_img_dir . $uni_img);
            move_uploaded_file($_FILES["main_img"]['tmp_name'], $uni_img_dir. $main_img);
      // Save the file names to the database
            $query = "INSERT INTO `university` (`UniversityID`, `Universityname`, `Universitydetail`, `Universityimg`,`Universitymainimg`,`id`) 
            VALUES  ('$uni_id','$uni_name','$uni_details','$uni_img','$main_img',NULL)";

            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                echo '<script> alert("Data Saved"); </script>';
                header('Location:add_uni.php');
            }
            else
            {
                echo '<script> alert("Data Not Saved"); </script>';
            }
        } else {
            echo "<script>alert('Invalid file format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
    } else {
        echo "<script>alert('All files are required.');</script>";
    }
}
?>
