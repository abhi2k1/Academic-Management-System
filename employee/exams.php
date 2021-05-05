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
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
                <div class="text-center">
                    <h2>Add/Edit Subjects</h2>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                        <hr>
                        <button class="btn btn-primary rounded-pill" type="button" data-toggle="modal" data-target="#modal-addnewexam">Add a Subject</button>
                        <br><br>
                            <div id="modal-addnewexam" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="modal-title-login" class="modal-title">Add New Subject</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form action="" name="form1" method="POST">
                                                <div id="form-group-examname" class="form-group">
                                                    <label for="input-examname">Subject Name</label>
                                                    <input id="input-examname" class="form-control" type="text" name="examCategory" required>
                                                </div>
                                                <div id="form-group-examduration" class="form-group">
                                                    <label for="input-examduration">Examination Duration (in minutes)</label>
                                                    <input id="input-examduration" class="form-control" type="text" name="examTime" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                            <button type="submit" name="new-exam-submit" class="btn btn-success"><i class="fas fa-plus"></i> Add New Subject</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <?php
                            $sql="SELECT * FROM exam_category";
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
                                        <th>Subject Name</th>
                                        <th>Examination Duration</th>
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
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row[1];?></td>
                                        <td><?php echo $row[2];?> minutes</td>
                                        <td><a type="button" class="btn btn-outline-warning" href="edit_exam.php?id=<?php echo $row[0];?>">Edit</a></td>
                                        <div id="modal-editexam" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 id="modal-title-login" class="modal-title">Edit Subject</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <form action="" name="form1" method="POST">
                                                            <div id="form-group-examname" class="form-group">
                                                                <label for="input-examname">Subject Name</label>
                                                                <input id="input-examname" class="form-control" type="text" name="examCategory" required>
                                                            </div>
                                                            <div id="form-group-examduration" class="form-group">
                                                                <label for="input-examduration">Examination Duration (in minutes)</label>
                                                                <input id="input-examduration" class="form-control" type="text" name="examTime" required>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                        <button type="submit" name="submit1" class="btn btn-success"><i class="fas fa-plus"></i> Update Subject</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <td><a type="button" class="btn btn-outline-danger" href="delete_exam.php?id=<?php echo $row[0];?>">Delete</a></td>
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
    if(isset($_POST["new-exam-submit"])) {
        $sql="INSERT INTO exam_category VALUE(NULL,'$_POST[examCategory]',$_POST[examTime])";
        $result=$mysqli->query($sql);
        if($result === TRUE) {
?>
            <script type="text/javascript">
                window.location.href=window.location.href;
            </script>
<?php
        }
        else {
            echo "Error: ".$sql."<br>".$mysqli->error;
        }
    }
?>