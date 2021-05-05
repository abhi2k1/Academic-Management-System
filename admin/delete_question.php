<?php
    include "../connection.php";
    $id = $_GET["id"];
    $id1=$_GET["id1"];
    $sql="DELETE FROM question where id =$id";
    $res=$mysqli->query($sql);
    if($res==TRUE){
    }
    else{
        echo "Error: ".$sql."<br>".$mysqli->error;
    }
?>
<script type="text/javascript">
   window.location="exam_questions.php?id=<?php echo $id1;?>";
</script>