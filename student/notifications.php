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
?>
<?php
    include "header.php";
?>
            <!--Start Main Content-->
            <div id="main-content">
                <h2 class="text-center">Notifications</h2>
                <div class="container-fluid">
                    <div class="row">
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
                                        <th>Notification Title</th>
                                        <th>Notification Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count=1;
                                    while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
                                ?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row[2];?></td>
                                        <td><?php echo $row[4];?></td>
                                        <td><?php echo $row[5];?></td>
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