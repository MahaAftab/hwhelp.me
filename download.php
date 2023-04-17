

<?php 
$Homeworkdocuments = $_GET['Homeworkdocuments'];
$file = 'Admin/img/hw/'.$Homeworkdocuments.'';

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . basename($file) . '"');
header('Content-Length: ' . filesize($file));

readfile($file);

?>