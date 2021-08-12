<?php 
include_once('connection.php');
$connection=mysqli_connect('localhost','root','Swezan0724','cbse_notes');
$class_name = $_GET['class'];
$topic_id = $_GET['topic_id'];
$query="select * from file_info_${class_name} where id=${topic_id}";
$result=mysqli_query($connection, $query);
$data = mysqli_fetch_array($result);

$file = 'Notes/'.$data['name'];

if(file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="'.basename($file).'"');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($file));
    readfile($file);
}
?>