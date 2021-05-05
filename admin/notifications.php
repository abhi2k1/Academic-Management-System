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
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
                <h2 class="text-center">Notifications</h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                        <hr>
                        <button class="btn btn-primary rounded-pill" type="button" data-toggle="modal" data-target="#modal-createnewnotif">Create New Notification</button>
                        <br><br>
                            <div id="modal-createnewnotif" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create New Notification</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form action="" name="form1" method="POST">
                                                <label for="target">Target Audience</label>
                                                <div id="target">
                                                    <div class="form-check">
                                                        <input id="input-target1" class="form-check-input" value="employee" type="checkbox" name="target-employee">
                                                        <label for="input-target1" class="form-check-label">Employee</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input id="input-target2" class="form-check-input" value="student" type="checkbox" name="target-student">
                                                        <label for="input-target2" class="form-check-label">Student</label>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="input-notiftitle">Notification Title</label>
                                                    <input id="input-notiftitle" class="form-control" type="text" name="notiftitle">
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-notifdesc">Notification Description</label>
                                                    <input id="input-notifdesc" class="form-control" type="text" name="notifdesc">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                    <button type="submit" name="submit-notif" class="btn btn-success"><i class="fas fa-plus"></i> Create New Notification</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <?php
                            $sql="SELECT * FROM notification ORDER BY id DESC";
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
                                        <th>Notifier</th>
                                        <th>Notified</th>
                                        <th>Notification Title</th>
                                        <th>Notification Description</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count=1;
                                    while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
                                ?>
                                    <tr>
                                        <?php
                                            $target="";
                                            if($row[3]==1){
                                                $target="Employee, Student";
                                            }
                                            elseif($row[3]==2){
                                                $target="Employee";
                                            }
                                            elseif($row[3]==3){
                                                $target="Student";
                                            }
                                        ?>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row[2];?></td>
                                        <td><?php echo $target;?></td>
                                        <td><?php echo $row[4];?></td>
                                        <td><?php echo $row[5];?></td>
                                        <?php
                                            if($row[1]==1){
                                        ?>
                                                <td><a type="button" class="btn btn-outline-danger" href="delete_notification.php?id=<?php echo $row[0];?>">Delete</a></td>
                                        <?php
                                            }
                                            else{
                                        ?>
                                                <td></td>
                                        <?php
                                            }
                                        ?>

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
    if(isset($_POST["submit-notif"])){
        $student=isset($_POST['target-student']);
        $employee=isset($_POST['target-employee']);
        $sql="";
        if($student==1 and $employee==1){
            $sql="INSERT INTO notification VALUE(NULL,'1','$_SESSION[userName]','1','$_POST[notiftitle]','$_POST[notifdesc]')";
        }
        elseif($employee==1){
            $sql="INSERT INTO notification VALUE(NULL,'1','$_SESSION[userName]','2','$_POST[notiftitle]','$_POST[notifdesc]')";
        }
        elseif($student==1){
            $sql="INSERT INTO notification VALUE(NULL,'1','$_SESSION[userName]','3','$_POST[notiftitle]','$_POST[notifdesc]')";
        }
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
