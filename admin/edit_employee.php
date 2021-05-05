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
    $sql="SELECT * FROM admin_login where id=$id";
    $result=$mysqli->query($sql);
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $employee_id=$row[1];
        $employee_password=$row[2];
    }
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
                <div class="text-center">
                    <h2>Edit Employee</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <form action="" id="form-edit" method="POST">
                                <div id="form-group-employeeid" class="form-group">
                                    <label for="input-employeeid">Employee ID</label>
                                    <input id="input-employeeid" class="form-control" type="text" name="employeeid" value="<?php echo $employee_id;?>" required>
                                </div>
                                <div id="form-group-employeepassword" class="form-group">
                                    <label for="input-employeepassword">Password</label>
                                    <input id="input-employeepassword" class="form-control" type="text" name="employeepassword" placeholder="New Password" required>
                                </div>
                            </form>
                            <button type="submit" name="edit-employee-submit" form="form-edit" class="btn btn-success"><i class="fas fa-plus"></i> Edit Employee</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>
<?php
 if(isset($_POST["edit-employee-submit"])){
    $sql="UPDATE admin_login set userName='$_POST[employeeid]' ,password='$_POST[employeepassword]' WHERE id='$id'";
    $result=$mysqli->query($sql);
    if ($result === TRUE) {
?>
        <script type="text/javascript">
            window.location.href="employees.php";
        </script>
<?php
    }
    else {
            echo "Error: ".$sql."<br>".$mysqli->error;
    }

 }
?>