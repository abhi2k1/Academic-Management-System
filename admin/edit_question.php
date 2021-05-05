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
        if($_SESSION['userType']=="Employee") {
?>
            <script type="text/javascript">
                alert("You do not have permission to access this section. Redirecting to Employee Dashboard...");
                window.location="../employee/dashboard.php";
            </script>
<?php
        }
        elseif($_SESSION['userType']=="Student") {
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
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <form action="" id="form-edit" method="POST">
                                <div class="form-group">
                                    <label for="input-question">Question</label>
                                    <input id="input-question" class="form-control" type="text" name="question" value="<?php echo $question;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-opt1">Option 1</label>
                                    <input id="input-opt1" class="form-control" type="text" name="opt1" value="<?php echo $opt1;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-opt2">Option 2</label>
                                    <input id="input-opt2" class="form-control" type="text" name="opt2" value="<?php echo $opt2;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-opt3">Option 3</label>
                                    <input id="input-opt3" class="form-control" type="text" name="opt3" value="<?php echo $opt3;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-opt4">Option 4</label>
                                    <input id="input-opt4" class="form-control" type="text" name="opt4" value="<?php echo $opt4;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-answer">Correct Answer</label>
                                    <input id="input-answer" class="form-control" type="text" name="answer" value="<?php echo $answer;?>" required>
                                </div>
                            </form>
                            <button type="submit" name="edit-question-submit" form="form-edit" class="btn btn-success"><i class="fas fa-plus"></i> Edit Question</button>
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
    $sql="UPDATE question set question='$_POST[question]' ,option1='$_POST[opt1]',option2='$_POST[opt2]' ,option3='$_POST[opt3]' ,option4='$_POST[opt4]' ,answer='$_POST[answer]' WHERE id='$id'";
    $result=$mysqli->query($sql);
    if ($result === TRUE) {
?>
        <script type="text/javascript">
            window.location.href="exam_questions.php?id=<?php echo $id1;?>";
        </script>
<?php
        }
        else {
            echo "Error: ".$sql."<br>".$mysqli->error;
        }

 }
?>
