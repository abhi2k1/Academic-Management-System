<?php
    include "../connection.php";
    $id=$_GET["id"];
    $user=$_GET["user"];
    if($user==1) {
        $sql="DELETE FROM registration where id=$id";
        $res=$mysqli->query($sql);
        if($res==TRUE){
        }else{
            echo "Error: ".$sql."<br>".$mysqli->error;
        }
?>
        <script type="text/javascript">
            window.location="students.php";
        </script>
<?php
    }
    elseif($user==0) {
        $sql="DELETE FROM admin_login where id=$id";
        $res=$mysqli->query($sql);
        if($res==TRUE){
        }else{
            echo "Error: ".$sql."<br>".$mysqli->error;
        }
?>
        <script type="text/javascript">
            window.location="employees.php";
        </script>
<?php
    }
?>