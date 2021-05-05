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
    $sql="SELECT category FROM exam_category  WHERE id='$id'";
    $result=$mysqli->query($sql);
    while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
        $exam_category=$row[0];
    }
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
                <div class="text-center">
                    <h2>Add/Edit Questions</h2>
                    <h4>Examination Name: <?php echo $exam_category;?></h4>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                        <hr>
                        <button class="btn btn-primary rounded-pill" type="button" data-toggle="modal" data-target="#modal-addnewquestion">Add a Question</button>
                        <br><br>
                            <div id="modal-addnewquestion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="modal-title-login" class="modal-title">Add New Question</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form action="" name="form1" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="input-question-type">Question Type</label>
                                                    <select id="input-question-type" class="form-control custom-select" name="question-type">
                                                        <option disabled selected>Select Question Type</option>
                                                        <option>Question with text options</option>
                                                        <option>Question with image options</option>
                                                    </select>
                                                </div>
                                                <div id="form-group-question" class="form-group">
                                                    <label for="input-question">Question</label>
                                                    <input id="input-question" class="form-control" type="" name="question" required>
                                                </div>
                                                <div id="form-group-option1" class="form-group">
                                                    <label for="input-option1">Option 1</label>
                                                    <input id="input-option1" class="form-control" type="" name="opt1" required>
                                                </div>
                                                <div id="form-group-option2" class="form-group">
                                                    <label for="input-option2">Option 2</label>
                                                    <input id="input-option2" class="form-control" type="" name="opt2" required>
                                                </div>
                                                <div id="form-group-option3" class="form-group">
                                                    <label for="input-option3">Option 3</label>
                                                    <input id="input-option3" class="form-control" type="" name="opt3" required>
                                                </div>
                                                <div id="form-group-option4" class="form-group">
                                                    <label for="input-option4">Option 4</label>
                                                    <input id="input-option4" class="form-control" type="" name="opt4" required>
                                                </div>
                                                <div id="form-group-correct" class="form-group">
                                                    <label for="input-correct">Correct Answer</label>
                                                    <input id="input-correct" class="form-control" type="" name="answer" required>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                    <button type="submit" name="submit-question" class="btn btn-success"><i class="fas fa-plus"></i> Add New Question</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center col-12">
                        <?php
                            $sql="SELECT * FROM question WHERE category='$exam_category' ORDER BY question_no ASC";
                            $result=$mysqli->query($sql);
                            $row_count=mysqli_num_rows($result);
                            if($row_count==0) {
                        ?>
                            <h4>No results to display!</h4>
                        <?php
                            }
                            else {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-start">#</th>
                                        <th>Question</th>
                                        <th>Option 1</th>
                                        <th>Option 2</th>
                                        <th>Option 3</th>
                                        <th>Option 4</th>
                                        <th>Correct Answer</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count=1;
                                    while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
                                ?>
                                    <tr>
                                        <td><?php echo $row[1];?></td>
                                        <td><?php echo $row[2];?></td>
                                        <td><?php
                                        if(strpos($row[3],'opt_images/')!==FALSE){
                                            ?>
                                              <img src="<?php echo $row[3]; ?>" height="50" width="50">
                                            <?php
                                        }
                                        else{

                                            echo $row[3];
                                        }?></td>
                                        <td><?php
                                        if(strpos($row[4],'opt_images/')!==FALSE){
                                            ?>
                                              <img src="<?php echo $row[4]; ?>" height="50" width="50">
                                            <?php
                                        }
                                        else{

                                            echo $row[4];
                                        }?></td>
                                        <td><?php
                                        if(strpos($row[5],'opt_images/')!==FALSE){
                                            ?>
                                              <img src="<?php echo $row[5]; ?>" height="50" width="50">
                                            <?php
                                        }
                                        else{

                                            echo $row[5];
                                        }?></td>
                                        <td><?php
                                        if(strpos($row[6],'opt_images/')!==FALSE){
                                            ?>
                                              <img src="<?php echo $row[6]; ?>" height="50" width="50">
                                            <?php
                                        }
                                        else{

                                            echo $row[6];
                                        }?></td>
                                        <td><?php
                                        if(strpos($row[7],'opt_images/')!==FALSE){
                                            ?>
                                              <img src="<?php echo $row[7]; ?>" height="50" width="50">
                                            <?php
                                        }
                                        else{

                                            echo $row[7];
                                        }?></td>
                                        <td><?php
                                        if(strpos($row[7],'opt_images/')!==FALSE){
                                            ?>
                                              <a type="button" class="btn btn-outline-warning" href="edit_image_question.php?id=<?php echo $row[0];?>&id1=<?php echo $id;?>">Edit</a>
                                            <?php
                                        }
                                        else{

                                            ?>
                                              <a type="button" class="btn btn-outline-warning" href="edit_question.php?id=<?php echo $row[0];?>&id1=<?php echo $id;?>">Edit</a>
                                            <?php


                                        }?></td>
                                        <td><a type="button" class="btn btn-outline-danger" href="delete_question.php?id=<?php echo $row[0];?>&id1=<?php echo $id;?>">Delete</a></td>
                                    </tr>
                                <?php
                                        $count=$count+1;
                                    }
                                ?>
                                </tbody>
                        <?php
                            }
                        ?>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>
<?php
    if(isset($_POST['submit-question']) and ($_POST['question-type']=='Question with text options')){
        $loop=0;
        $count=0;
        $sql="SELECT * FROM question WHERE category='$exam_category' ORDER BY id ASC";
        $result=$mysqli->query($sql);
        $count=mysqli_num_rows($result);
        if($count==0){

        }else{
            while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
                $loop=$loop+1;
                $sql="UPDATE question SET question_no='$loop' WHERE id ='$row[0]'";
                $r1=$mysqli->query($sql);

            }
        }
        $loop=$loop+1;
        $sql="INSERT INTO question VALUES(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')";
        $result=$mysqli->query($sql);
        if($result==TRUE){
            ?>
            <script type="text/javascript">
                window.location=window.location;
            </script>
            <?php
        }else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
    elseif(isset($_POST['submit-question']) and ($_POST['question-type']=="Question with image options")){
        $loop=0;
        $count=0;
        $sql="SELECT * FROM question WHERE category='$exam_category' ORDER BY id ASC";
        $result=$mysqli->query($sql);
        $count=mysqli_num_rows($result);
        if($count==0){

        }else{
            while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
                $loop=$loop+1;
                $sql="UPDATE question SET question_no='$loop' WHERE id ='$row[0]'";
                $r1=$mysqli->query($sql);

            }
        }
        $loop=$loop+1;
        $tm=md5(time());

        $fnm1=$_FILES["opt1"]["name"];
        $dst1="opt_images/".$tm.$fnm1;
        $dst_db1="opt_images/".$tm.$fnm1;
        move_uploaded_file($_FILES["opt1"]["tmp_name"],$dst1);

        $fnm2=$_FILES["opt2"]["name"];
        $dst2="opt_images/".$tm.$fnm2;
        $dst_db2="opt_images/".$tm.$fnm2;
        move_uploaded_file($_FILES["opt2"]["tmp_name"],$dst2);

        $fnm3=$_FILES["opt3"]["name"];
        $dst3="opt_images/".$tm.$fnm3;
        $dst_db3="opt_images/".$tm.$fnm3;
        move_uploaded_file($_FILES["opt3"]["tmp_name"],$dst3);

        $fnm4=$_FILES["opt4"]["name"];
        $dst4="opt_images/".$tm.$fnm4;
        $dst_db4="opt_images/".$tm.$fnm4;
        move_uploaded_file($_FILES["opt4"]["tmp_name"],$dst4);

        $fnm5=$_FILES["answer"]["name"];
        $dst5="opt_images/".$tm.$fnm5;
        $dst_db5="opt_images/".$tm.$fnm5;
        move_uploaded_file($_FILES["answer"]["tmp_name"],$dst5);

        $sql="INSERT INTO question VALUES(NULL,'$loop','$_POST[question]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5','$exam_category')";
        $result=$mysqli->query($sql);
        if($result==TRUE){
            ?>
            <script type="text/javascript">
                window.location=window.location;
            </script>
            <?php
        }else {
            echo "Error: ".$sql."<br>".$mysqli->error;
        }
    }
?>