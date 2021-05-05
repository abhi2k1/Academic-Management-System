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
                <div class="text-center">
                    <h2>Add/Edit Employees</h2>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                        <hr>
                        <button class="btn btn-primary rounded-pill" type="button" data-toggle="modal" data-target="#modal-addnewemployee">Add an Employee</button>
                        <br><br>
                            <div id="modal-addnewemployee" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add New Employee</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form action="" name="form1" method="POST">
                                                <div id="form-group-username" class="form-group">
                                                    <label for="input-username">Employee Name</label>
                                                    <input id="input-username" class="form-control" type="text" name="username" required>
                                                </div>
                                                <div id="form-group-password" class="form-group">
                                                    <label for="input-password">Employee Password</label>
                                                    <input id="input-password" class="form-control" type="password" name="password" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                    <button type="submit" name="submit-employee" class="btn btn-success"><i class="fas fa-plus"></i> Add New Employee</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <?php
                            $sql="SELECT * FROM admin_login WHERE admin=0 ORDER BY id ASC";
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
                                        <th>Employee Username</th>
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
                                        <td><a type="button" class="btn btn-outline-warning" href="edit_employee.php?id=<?php echo $row[0];?>">Edit</a></td>
                                        <td><a type="button" class="btn btn-outline-danger" href="delete_user.php?id=<?php echo $row[0];?>&user=0">Delete</a></td>
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
    if(isset($_POST["submit-employee"])) {
        $sql="INSERT INTO admin_login VALUE(NULL,'$_POST[username]','$_POST[password]',0)";
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