<?php
session_start();
include "../connection.php";
$total_que=0;
$sql="SELECT * FROM question where category='$_SESSION[exam_category]'";
$result=$mysqli->query($sql);
$total_que=mysqli_num_rows($result);
echo $total_que;
?>