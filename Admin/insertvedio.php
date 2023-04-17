<?php
require 'config.php';
if(isset($_POST['addvedio']))
{
    $id=$_POST['id'];
    $course_id=$_POST['course_id'];
    $uni_id=$_POST['uni_id'];
    $video_id=$_POST['video_id'];
    $video_title=$_POST['video_title'];
    $video_dec=$_POST['video_dec'];
   

    // File upload handling
    $upload_video = $_FILES['upload_video']['name'];
  
    $quiz_img_dir = "img/video/";

    // Check if all files were uploaded successfully
    if (!empty($upload_video)) {
        // Allowed extensions
        $allowed_extensions = array("mp4");

        // Get the extension of each file
        $upload_video_ext = strtolower(pathinfo($upload_video, PATHINFO_EXTENSION));
    

        // Validate the file extensions
        if (in_array($upload_video_ext, $allowed_extensions))
        {
            // Move the uploaded images to the target directories with the original file names
         
            move_uploaded_file($_FILES['upload_video']['tmp_name'], $quiz_img_dir . $upload_video);

          
    $query = "INSERT INTO `vedio` (`courseid`,`UniversityId`,`vedioid`,`vediotittle`,`vediodescription`,`vedio`,`id`)
    VALUES ('$course_id','$uni_id','$video_id','$video_title','$video_dec','$upload_video',NULL)";
   $query_run = mysqli_query($con, $query);
            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                echo '<script> alert("Data Saved"); </script>';
                header('Location:add_video.php');
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
