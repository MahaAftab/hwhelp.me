<?php 
  require 'config.php';

if(isset($_POST['addButton']))
{
       $id = $_POST['id'];
    $course_id= $_POST['course_id'];
    $uni_id= $_POST['uni_id'];
    $hw_id = $_POST['hw_id'];
    $hw_title=$_POST['hw_title'];
   
    $hw_desc=$_POST['hw_desc'];
   
    
    $hw_img=$_FILES["hw_img"]["name"];
    $hw_doc = $_FILES['hw_doc']['name'];
    $quiz_img_dir = "img/hw/";

    // Check if all files were uploaded successfully
    if (!empty($hw_doc) && !empty($hw_img)) {
        // Allowed extensions
        $allowed_extensions = array("jpg", "jpeg", "png", "gif","pdf","docx","doc");

        // Get the extension of each file
        $hw_doc_ext = strtolower(pathinfo($hw_doc, PATHINFO_EXTENSION));
        $hw_img_ext = strtolower(pathinfo($hw_img, PATHINFO_EXTENSION));

        // Validate the file extensions
        if (in_array($hw_doc_ext, $allowed_extensions) &&
            in_array($hw_img_ext, $allowed_extensions))
        {
            // Move the uploaded images to the target directories with the original file names
            move_uploaded_file($_FILES["hw_img"]['tmp_name'], $quiz_img_dir . $hw_img);
            move_uploaded_file($_FILES['hw_doc']['tmp_name'], $quiz_img_dir . $hw_doc);

            // Save the file names to the database
            $query = "INSERT INTO `homework` (`courseid`, `UniversityID`, `Homeworkdimg`, `HomeworkId`, `Homeworkdocuments`, `hwtittle`, `homeworkdescription`,`id`) 
            VALUES  ('$course_id','$uni_id', '$hw_img','$hw_id','$hw_doc','$hw_title','$hw_desc',NULL)";

            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                echo '<script> alert("Data Saved"); </script>';
                header('Location:add_hw.php');
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
