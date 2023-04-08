<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'hwhelp');

if(isset($_POST['addcourse']))
{
    $course_id = $_POST['course_id'];
    $uni_id = $_POST['uni_id'];
    $course_name = $_POST['course_name'];
    $uni_name = $_POST['uni_name'];
    $id = $_POST['id'];
    
    
    $query = "INSERT INTO `courses`  (`courseid`, `UniversityID`, `coursename`, `universityname`, `id`) VALUES ('$course_id','$uni_id', ' $course_name','$uni_name',NULL)";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
       
        header('Location: add_course.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>