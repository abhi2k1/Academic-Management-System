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
                    <h2>Previous Examination Results</h2>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                        <?php
                            $count=0;
                            $sql="SELECT * FROM exam_result order by id desc";
                            $result=$mysqli->query($sql);
                            $count=mysqli_num_rows($result);
                            if($count==0){
                        ?>
                            <h4>No results to display!</h4>
                        <?php
                            }
                            else {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-start">Student Username</th>
                                        <th>Examination Name</th>
                                        <th>Total Questions</th>
                                        <th>Correct Answers</th>
                                        <th>Incorrect Answers</th>
                                        <th>Exam Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($row=mysqli_fetch_array($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row[1];?></td>
                                        <td><?php echo $row[2];?></td>
                                        <td><?php echo $row[3];?></td>
                                        <td><?php echo $row[4];?></td>
                                        <td><?php echo $row[5];?></td>
                                        <td><?php echo $row[6];?></td>
                                    </tr>
                                <?php
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