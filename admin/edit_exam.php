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
    $sql="SELECT * FROM exam_category where id=$id";
    $result=$mysqli->query($sql);
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $exam_category=$row[1];
        $exam_Time=$row[2];
    }
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
                <div class="text-center">
                    <h2>Edit Subject</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <form action="" id="form-edit" method="POST">
                                <div id="form-group-examname" class="form-group">
                                    <label for="input-examname">Subject Name</label>
                                    <input id="input-examname" class="form-control" type="text" name="examCategory" value="<?php echo $exam_category;?>" required>
                                </div>
                                <div id="form-group-examduration" class="form-group">
                                    <label for="input-examduration">Examination Duration (in minutes)</label>
                                    <input id="input-examduration" class="form-control" type="text" name="examTime" value="<?php echo $exam_Time;?>" required>
                                </div>
                            </form>
                            <button type="submit" name="edit-exam-submit" form="form-edit" class="btn btn-success"><i class="fas fa-plus"></i> Edit Subject</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>
<?php
 if(isset($_POST["edit-exam-submit"])){
    $sql="UPDATE exam_category set category='$_POST[examCategory]' ,exam_time_in_minutes='$_POST[examTime]' WHERE id='$id'";
    $result=$mysqli->query($sql);
    if ($result === TRUE) {
?>
        <script type="text/javascript">
            window.location.href="exam-category.php";
        </script>
<?php
    }
    else {
            echo "Error: ".$sql."<br>".$mysqli->error;
    }

 }
?>