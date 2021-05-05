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
                        <div class="col-12">
                            <div class="float-left">Question: <span id="current_que"></span>/<span id="total_que"></span></div>
                            <div class="float-right text-right">Examination Name: <?php echo $_SESSION["exam_category"];?><br>Remaining Time: <span id="countdowntimer"></span></div>
                        </div>
                        <div class="col-12 text-justify question" id="load_question"></div>
                        <div class="col-12"><br><br></div>
                        <div class="col-12 text-center">
                            <button class="btn btn-secondary" type="button" onclick="load_previous()">Previous Question</button>
                            <button class="btn btn-primary" type="button" onclick="load_next()">Next Question</button>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    setInterval(() => {
                        timer();
                    },1000);
                    function timer(){
                        var xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function(){
                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                                if(xmlhttp.responseText=="00:00:01"){
                                    window.location="exam_result.php";
                                }
                                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET","../ajax/load_timer.php",true);
                        xmlhttp.send(null);
                    }
                </script>
                <script type="text/javascript">
                    function load_total_que(){
                        var xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function(){
                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                                document.getElementById("total_que").innerHTML=xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET","../ajax/load_total_que.php",true);
                        xmlhttp.send(null);
                    }
                    var questionno="1";
                    load_questions(questionno);
                    function load_questions(questionno){
                        document.getElementById("current_que").innerHTML=questionno;
                        var xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function(){
                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                                //alert(xmlhttp.responseText);
                                if(xmlhttp.responseText=="over") {
                                    window.location="exam_result.php";
                                }
                                else {
                                    document.getElementById("load_question").innerHTML=xmlhttp.responseText;
                                    load_total_que();
                                }
                            }
                        };
                        xmlhttp.open("GET","../ajax/load_questions.php?questionno="+questionno,true);
                        xmlhttp.send(null);
                    }
                    function radioclick(radiovalue,questionno){
                        var xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function(){
                            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                                //alert(xmlhttp.responseText);
                            }
                        };
                        xmlhttp.open("GET","../ajax/save_answer_in_session.php?questionno="+questionno+"&value1="+radiovalue,true);
                        xmlhttp.send(null);
                    }
                    function load_previous(){
                        if(questionno==1){
                            load_questions(questionno);
                        }
                        else{
                            questionno=eval(questionno)-1;
                            load_questions(questionno);
                        }
                    }
                    function load_next(){
                        questionno=eval(questionno)+1;
                        load_questions(questionno);
                    }
                </script>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>