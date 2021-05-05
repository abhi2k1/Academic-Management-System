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
                    <h2>Add/Edit Questions</h2>
                </div>
                <div class="container-fluid">
                    <div class="row">
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
                                        <th>Select</th>
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
                                        <td><a type="button" class="btn btn-outline-primary" href="exam_questions.php?id=<?php echo $row[0];?>">Select</a></td>
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