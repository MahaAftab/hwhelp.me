<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $course_id = $_POST['course_id'];
    $uni_id = $_POST['uni_id'];
    $exam_id = $_POST['exam_id'];
    $exam_title = $_POST['exam_title'];



    // Define the target directories where the images will be uploaded
    $exam_img_dir = "img/pastexam/";
  

    // Check if all three files were uploaded successfully
    if (isset($_FILES['upload_exam_img']) && isset($_FILES['exam_ques']) && isset($_FILES['exam_ans'])) {
        // Get the original name of the uploaded exam image
        $exam_img_name = $_FILES['upload_exam_img']['name'];

        // Get the original name of the uploaded exam question image
        $exam_ques_name = $_FILES['exam_ques']['name'];

        // Get the original name of the uploaded exam answer image
        $exam_ans_name = $_FILES['exam_ans']['name'];

        // Allowed extensions
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        // Get the extension of each file
        $exam_img_ext = strtolower(pathinfo($exam_img_name, PATHINFO_EXTENSION));
        $exam_ques_ext = strtolower(pathinfo($exam_ques_name, PATHINFO_EXTENSION));
        $exam_ans_ext = strtolower(pathinfo($exam_ans_name, PATHINFO_EXTENSION));

        // Validate the file extensions
        if (in_array($exam_img_ext, $allowed_extensions) &&
            in_array($exam_ques_ext, $allowed_extensions) &&
            in_array($exam_ans_ext, $allowed_extensions)) {
            
            // Move the uploaded images to the target directories with the original file names
            move_uploaded_file($_FILES['upload_exam_img']['tmp_name'], $exam_img_dir.$exam_img_name);
            move_uploaded_file($_FILES['exam_ques']['tmp_name'], $exam_img_dir . $exam_ques_name);
            move_uploaded_file($_FILES['exam_ans']['tmp_name'], $exam_img_dir . $exam_ans_name);

            // Save the image file names to the database
            $query = "INSERT INTO `pastexam` 
            (`id`, `courseid`, `UniversityID`, `examid`, `examtittle`, `examdimg`, `examanswer`, `examquesimg`)
         VALUES (NULL,'$course_id', '$uni_id','$exam_id', '$exam_title', '$exam_img_name', '$exam_ques_name', '$exam_ans_name')";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                echo '<script> alert("Data Saved"); </script>';
                header('Location: add_past_paper.php');
            } else {
                echo '<script> alert("Data Not Saved"); </script>';
            }
        } else {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
    } else {
        echo "<script>alert('All three images are required.');</script>";
    }
}

?>
