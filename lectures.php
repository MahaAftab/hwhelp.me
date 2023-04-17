
<?php 
$lecdocuments = $_GET['lecdocuments'];
$file = 'Admin/img/lec/'.$lecdocuments.'';

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . basename($file) . '"');
header('Content-Length: ' . filesize($file));

readfile($file);

?>