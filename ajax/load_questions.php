<?php
    session_start();
    include "../connection.php";

    $question_no="";
    $question="";
    $opt1="";
    $opt2="";
    $opt3="";
    $opt4="";
    $answer="";
    $count=0;
    $ans="";

    $queno=$_GET["questionno"];
    if(isset($_SESSION["answer"][$queno])){
        $ans=$_SESSION["answer"][$queno];
    }

    $sql="SELECT * FROM question WHERE category='$_SESSION[exam_category]' && question_no='$_GET[questionno]'";
    $result=$mysqli->query($sql);
    $count=mysqli_num_rows($result);

    if($count==0){
        echo "over";
    }
    else{
        while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
            $question_no=$row[1];
            $question=$row[2];
            $opt1=$row[3];
            $opt2=$row[4];
            $opt3=$row[5];
            $opt4=$row[6];
        }
        ?>
        <h5><?php echo $question_no?>.  <?php echo $question?></h5>
        <input type="radio" name="ri" value="<?php echo $opt1;?>" onclick="radioclick(this.value,<?php echo $question_no?>)"
        <?php
            if($ans==$opt1){
                echo "checked";
            }
        ?>>
        <?php
            if(strpos($opt1,'images/')!=false){
                ?>
                <img src="../employee/<?php echo $opt1; ?>" height="30" width="30">
                <?php
            }else{
                echo $opt1;
            }
        ?>
        <br>
        <input type="radio" name="ri" value="<?php echo $opt2;?>" onclick="radioclick(this.value,<?php echo $question_no?>)"
        <?php
            if($ans==$opt2){
                echo "checked";
            }
        ?>>
        <?php
            if(strpos($opt2,'images/')!=false){
                ?>
                <img src="../employee/<?php echo $opt2; ?>" height="30" width="30">
                <?php
            }else{
                echo $opt2;
            }
        ?>
        <br>
        <input type="radio" name="ri" value="<?php echo $opt3;?>" onclick="radioclick(this.value,<?php echo $question_no?>)"
        <?php
            if($ans==$opt3){
                echo "checked";
            }
        ?>>
        <?php
            if(strpos($opt3,'images/')!=false){
                ?>
                <img src="../employee/<?php echo $opt3; ?>" height="30" width="30">
                <?php
            }else{
                echo $opt3;
            }
        ?>
        <br>
        <input type="radio" name="ri" value="<?php echo $opt4;?>" onclick="radioclick(this.value,<?php echo $question_no?>)"
        <?php
            if($ans==$opt4){
                echo "checked";
            }
        ?>>
        <?php
            if(strpos($opt4,'images/')!=false){
                ?>
                <img src="../employee/<?php echo $opt4; ?>" height="30" width="30">
                <?php
            }else{
                echo $opt4;
            }
        ?>
        <?php
    }
?>