<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'students');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];

    $query = "INSERT INTO student (`fname`,`lname`,`contact`) VALUES ('$fname','$lname','$contact')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: dee.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>