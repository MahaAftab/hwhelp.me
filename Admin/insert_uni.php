<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'hwhelp');

if(isset($_POST['addButton']))
{
    $id = $_POST['id'];
    $uni_id = $_POST['uni_id'];
    $uni_name = $_POST['uni_name'];
    // $contact = $_POST['contact'];
    // INSERT INTO `university` (`UniversityID`, `Universityname`, `id`) VALUES ('45', 'NEW', NULL);
    $query = "INSERT INTO `university` (`UniversityID`, `Universityname`, `id`) VALUES ('$uni_id','$uni_name', NULL)";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: add_uni.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>