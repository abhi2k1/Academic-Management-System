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
    else {
        if($_SESSION['userType']=="Student") {
?>
            <script type="text/javascript">
                alert("You do not have permission to access this section. Redirecting to Student Dashboard...");
                window.location="../student/dashboard.php";
            </script>
<?php
        }
    }
    $id=$_GET["id"];
    $id1=$_GET["id1"];
    $sql="SELECT * FROM question WHERE id='$id'";
    $result=$mysqli->query($sql);
    $question="";
    $opt1="";
    $opt2="";
    $opt3="";
    $opt4="";
    $answer="";
    while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
        $question=$row[2];
        $opt1=$row[3];
        $opt2=$row[4];
        $opt3=$row[5];
        $opt4=$row[6];
        $answer=$row[7];
    }
?>
<?php
    include "header.php";
?>
<!--Start Main Content-->
<div id="main-content">
                <div class="text-center">
                    <h2>Edit Question</h2>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <form action="" id="edit-question" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="input-question">Question</label>
                                    <input id="input-question" class="form-control" type="text" name="question" value="<?php echo $question;?>" required>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo $opt1;?>" height="50" width="50"><br>
                                    <label for="input-opt1">Option 1</label>
                                    <input id="input-opt1" class="form-control-file" type="file" name="opt1" required>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo $opt2;?>" height="50" width="50"><br>
                                    <label for="input-opt2">Option 2</label>
                                    <input id="input-opt2" class="form-control-file" type="file" name="opt2" required>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo $opt3;?>" height="50" width="50"><br>
                                    <label for="input-opt3">Option 3</label>
                                    <input id="input-opt3" class="form-control-file" type="file" name="opt3" required>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo $opt4;?>" height="50" width="50"><br>
                                    <label for="input-opt4">Option 4</label>
                                    <input id="input-opt4" class="form-control-file" type="file" name="opt4" required>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo $answer;?>" height="50" width="50"><br>
                                    <label for="input-answer">Correct Answer</label>
                                    <input id="input-answer" class="form-control-file" type="file" name="answer" required>
                                </div>
                            </form>
                            <button type="submit" name="edit-question-submit" form="edit-question" class="btn btn-success"><i class="fas fa-plus"></i> Edit Question</button>

                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>
<?php
    if(isset($_POST["edit-question-submit"])){
        $fnm1=$_FILES["opt1"]["name"];
        $fnm2=$_FILES["opt2"]["name"];
        $fnm3=$_FILES["opt3"]["name"];
        $fnm4=$_FILES["opt4"]["name"];
        $fnm5=$_FILES["answer"]["name"];
        $tm=md5(time());
        if($fnm1!=""){
            $dst1="opt_images/".$tm.$fnm1;
            $dst_db1="opt_images/".$tm.$fnm1;
            move_uploaded_file($_FILES["opt1"]["tmp_name"],$dst1);
            $sql="UPDATE question SET question='$_POST[question]',option1='$dst_db1' WHERE id='$id'";
            $result=$mysqli->query($sql);
            if ($result === TRUE) {
            }
            else {
                echo "Error: ".$sql."<br>".$mysqli->error;
            }
        }
        if($fnm2!=""){
            $dst2="opt_images/".$tm.$fnm2;
            $dst_db2="opt_images/".$tm.$fnm2;
            move_uploaded_file($_FILES["opt2"]["tmp_name"],$dst2);
            $sql="UPDATE question SET question='$_POST[question]',option2='$dst_db2' WHERE id='$id'";
            $result=$mysqli->query($sql);
            if ($result === TRUE) {
            }
            else {
                echo "Error: ".$sql."<br>".$mysqli->error;
            }
        }
        if($fnm3!=""){
            $dst3="opt_images/".$tm.$fnm3;
            $dst_db3="opt_images/".$tm.$fnm3;
            move_uploaded_file($_FILES["opt3"]["tmp_name"],$dst3);
            $sql="UPDATE question SET question='$_POST[question]',option3='$dst_db3' WHERE id='$id'";
            $result=$mysqli->query($sql);
            if ($result === TRUE) {
            }
            else {
                echo "Error: ".$sql."<br>".$mysqli->error;
            }
        }
        if($fnm4!=""){
            $dst4="opt_images/".$tm.$fnm4;
            $dst_db4="opt_images/".$tm.$fnm4;
            move_uploaded_file($_FILES["opt4"]["tmp_name"],$dst4);
            $sql="UPDATE question SET question='$_POST[question]',option4='$dst_db4' WHERE id='$id'";
            $result=$mysqli->query($sql);
            if ($result === TRUE) {
            }
            else {
                echo "Error: ".$sql."<br>".$mysqli->error;
            }
        }
        if($fnm5!=""){
            $dst5="opt_images/".$tm.$fnm5;
            $dst_db5="opt_images/".$tm.$fnm5;
            move_uploaded_file($_FILES["answer"]["tmp_name"],$dst5);
            $sql="UPDATE question SET question='$_POST[question]',answer='$dst_db5' WHERE id='$id'";
            $result=$mysqli->query($sql);
            if ($result === TRUE) {
            }
            else {
                echo "Error: ".$sql."<br>".$mysqli->error;
            }
        }
        $sql="UPDATE question SET question='$_POST[question]' WHERE id='$id'";
        $result=$mysqli->query($sql);
        if ($result === TRUE) {
            ?>
            <script type="text/javascript">
                alert("exam updated successfully");
                window.location.href="exam_questions.php?id=<?php echo $id1;?>";
            </script>
            <?php
        }
        else {
            echo "Error: ".$sql."<br>".$mysqli->error;
        }
    }
?>