<?php
    include "../connection.php";
    session_start();
    $exam_category=$_GET["exam_category"];
    $_SESSION["exam_category"]=$exam_category;
    $sql="SELECT * FROM exam_category WHERE category='$exam_category'";
    $result=$mysqli->query($sql);
    while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
        $_SESSION["exam_time"]=$row[2];
    }
    $date=date("Y-m-d H:i:s");
    $_SESSION["end_time"]=date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
    $_SESSION["exam_start"]="yes";
?>