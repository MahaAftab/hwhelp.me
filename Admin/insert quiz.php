<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $course_id = $_POST['course_id'];
    $uni_id = $_POST['uni_id'];
    $quiz_title = $_POST['quiz_title'];
    $quiz_id = $_POST['quiz_id'];
    $quiz_tran = $_POST['quiz_tran'];

    // Define the target directories where the images will be uploaded
    $quiz_img_dir = "img/quiz/";
  

    // Check if all three files were uploaded successfully
    if (isset($_FILES['upload_quiz_img']) && isset($_FILES['quiz_ques']) && isset($_FILES['quiz_ans'])) {
        // Get the original name of the uploaded quiz image
        $quiz_img_name = $_FILES['upload_quiz_img']['name'];

        // Get the original name of the uploaded quiz question image
        $quiz_ques_name = $_FILES['quiz_ques']['name'];

        // Get the original name of the uploaded quiz answer image
        $quiz_ans_name = $_FILES['quiz_ans']['name'];

        // Allowed extensions
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        // Get the extension of each file
        $quiz_img_ext = strtolower(pathinfo($quiz_img_name, PATHINFO_EXTENSION));
        $quiz_ques_ext = strtolower(pathinfo($quiz_ques_name, PATHINFO_EXTENSION));
        $quiz_ans_ext = strtolower(pathinfo($quiz_ans_name, PATHINFO_EXTENSION));

        // Validate the file extensions
        if (in_array($quiz_img_ext, $allowed_extensions) &&
            in_array($quiz_ques_ext, $allowed_extensions) &&
            in_array($quiz_ans_ext, $allowed_extensions)) {
            
            // Move the uploaded images to the target directories with the original file names
            move_uploaded_file($_FILES['upload_quiz_img']['tmp_name'], $quiz_img_dir . $quiz_img_name);
            move_uploaded_file($_FILES['quiz_ques']['tmp_name'], $quiz_img_dir . $quiz_ques_name);
            move_uploaded_file($_FILES['quiz_ans']['tmp_name'], $quiz_img_dir . $quiz_ans_name);

            // Save the image file names to the database
            $query = "INSERT INTO `quiz` (`courseid`, `UniversityID`, `quiztittle`, `quizdimg`, `quizId`, `quizquestion`, `quizanswer`, `quiztranslation`, `id`)
                      VALUES ('$course_id', '$uni_id', '$quiz_title', '$quiz_img_name', '$quiz_id', '$quiz_ques_name', '$quiz_ans_name', '$quiz_tran', NULL)";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                echo '<script> alert("Data Saved"); </script>';
                header('Location: add_quiz.php');
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



