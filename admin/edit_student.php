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
    $sql="SELECT * FROM registration where id=$id";
    $result=$mysqli->query($sql);
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $student_id=$row[1];
        $student_password=$row[2];
    }
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
                <div class="text-center">
                    <h2>Edit Student</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <form action="" id="form-edit" method="POST">
                                <div id="form-group-studentid" class="form-group">
                                    <label for="input-studentid">Student Enrollment Number</label>
                                    <input id="input-studentid" class="form-control" type="text" name="studentid" value="<?php echo $student_id;?>" required>
                                </div>
                                <div id="form-group-studentpassword" class="form-group">
                                    <label for="input-studentpassword">Password</label>
                                    <input id="input-studentpassword" class="form-control" type="text" name="studentpassword" placeholder="New Password" required>
                                </div>
                            </form>
                            <button type="submit" name="edit-student-submit" form="form-edit" class="btn btn-success"><i class="fas fa-plus"></i> Edit Student</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>
<?php
 if(isset($_POST["edit-student-submit"])){
    $sql="UPDATE registration set userName='$_POST[studentid]' ,password='$_POST[studentpassword]' WHERE id='$id'";
    $result=$mysqli->query($sql);
    if ($result === TRUE) {
?>
        <script type="text/javascript">
            window.location.href="students.php";
        </script>
<?php
    }
    else {
            echo "Error: ".$sql."<br>".$mysqli->error;
    }

 }
?>