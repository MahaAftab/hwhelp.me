<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'hwhelp');

if(isset($_POST['addBtn']))
{
    $id = $_POST['id'];
    $course_id= $_POST['course_id'];
    $uni_id = $_POST['uni_id'];
    $lec_title=$_POST['lec_title'];
    $lec_id=$_POST['lec_id'];
    $lec_desc=$_POST['lec_desc'];

    // File upload handling
    $upload_doc = $_FILES['upload_doc']['name'];
    $upload_lec_img = $_FILES['upload_lec_img']['name'];
    $quiz_img_dir = "img/lec/";

    // Check if all files were uploaded successfully
    if (!empty($upload_doc) && !empty($upload_lec_img)) {
        // Allowed extensions
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        // Get the extension of each file
        $upload_doc_ext = strtolower(pathinfo($upload_doc, PATHINFO_EXTENSION));
        $upload_lec_img_ext = strtolower(pathinfo($upload_lec_img, PATHINFO_EXTENSION));

        // Validate the file extensions
        if (in_array($upload_doc_ext, $allowed_extensions) &&
            in_array($upload_lec_img_ext, $allowed_extensions))
        {
            // Move the uploaded images to the target directories with the original file names
            move_uploaded_file($_FILES['upload_lec_img']['tmp_name'], $quiz_img_dir . $upload_lec_img);
            move_uploaded_file($_FILES['upload_doc']['tmp_name'], $quiz_img_dir . $upload_doc);

            // Save the file names to the database
            $query = "INSERT INTO `lecture` (`courseid`, `UniversityID`, `lecdimg`, `lecId`, `lecdocuments`, `lectittle`, `lecdescription`,`id`) 
            VALUES  ('$course_id','$uni_id', '$upload_lec_img','$lec_id','$upload_doc','$lec_title','$lec_desc',NULL)";

            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
                echo '<script> alert("Data Saved"); </script>';
                header('Location:Add_lectures.php');
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
