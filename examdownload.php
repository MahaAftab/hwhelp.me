
<?php 
$examdimg = $_GET['examdimg'];
$file = 'Admin/img/pastexam/'.$examdimg.'';

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . basename($file) . '"');
header('Content-Length: ' . filesize($file));

readfile($file);

?>