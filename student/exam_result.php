<?php
    include "../connection.php";
    session_start();
    if(!isset($_SESSION["userName"])){
?>
        <script type="text/javascript">
            window.location="../index.php";
        </script>
<?php
    }
    $date=date("Y-m-d H:i:s");
    $_SESSION["end_time"]=date("Y-m-d H:i");
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
            <?php
                $correct=0;
                $wrong=0;
                if(isset($_SESSION["answer"])){
                    for($i=1; $i<=sizeof($_SESSION["answer"]); $i++){
                        $answer="";
                        $sql="SELECT * FROM question WHERE category='$_SESSION[exam_category]' && question_no=$i";
                        $result=$mysqli->query($sql);
                        while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
                            $answer=$row[7];
                        }
                        if(isset($_SESSION["answer"][$i])){
                            if($answer==$_SESSION["answer"][$i]){
                                $correct=$correct+1;
                            }
                            else{
                                $wrong=$wrong+1;
                            }
                        }
                        else{
                            $wrong=$wrong+1;
                        }
                    }
                }
                $count=0;
                $sql="SELECT * FROM question WHERE category='$_SESSION[exam_category]'";
                $result=$mysqli->query($sql);
                $count=mysqli_num_rows($result);
                $wrong=$count-$correct;
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Examination Result</h2>
                    </div>
                    <div class="col-12 text-center">
                        <p>Examination Name: <br>
                            Total Questions: <?php echo $count; ?> <i class="fas fa-question-circle"></i><br>
                            Correct Answers: <?php echo $correct; ?> <i class="fas fa-check-circle"></i><br>
                            Incorrect Answers: <?php echo $wrong; ?> <i class="fas fa-times-circle"></i>
                        </p>
                    </div>
                </div>
            </div>
            <?php
                if(isset($_SESSION["exam_start"])){
                    date_default_timezone_set("Asia/Kolkata");
                    $date=date("d-m-Y H:i");
                    $sql="INSERT INTO exam_result(id,userName,exam_type,total_question,correct_answer,wrong_answer,exam_time) values(NULL,'$_SESSION[userName]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')";
                    $result1=$mysqli->query($sql);
                    if ($result1 === TRUE) {
                    }
                    else {
                        echo "Error: ".$sql."<br>".$mysqli->error;
                    }
                }
                if(isset($_SESSION["exam_start"])){
                    unset($_SESSION["exam_start"]);
            ?>
                    <script type="text/javascript">
                        window.location.href=window.location.href;
                    </script>
            <?php
                }
            ?>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>