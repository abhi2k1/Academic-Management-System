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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Select an Examination</h2>
                            <p>Please select an exam to continue.</p>
                        </div>
                        <?php
                            $sql="SELECT * FROM exam_category";
                            $result=$mysqli->query($sql);
                            while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
                        ?>
                            <div class="col-12 exam-row text-center">
                                <button role=button class="btn btn-outline-primary exam-name-row text-center" onclick="set_exam_type_session(this.innerHTML)"><?php echo $row[1];?></button>
                                <p>Examination Duration: <?php echo $row[2];?> minutes</p>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <script type="text/javascript">
                    function set_exam_type_session(exam_category){
                        var xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function(){
                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                                window.location="attempt_exam.php";
                            }
                        };
                        xmlhttp.open("GET","../ajax/set_exam_type_session.php?exam_category="+exam_category,true);
                        xmlhttp.send(null);
                    }
                </script>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>