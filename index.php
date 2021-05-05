<?php
    include "connection.php";
    session_start();
    if((isset($_SESSION["userName"])) and ($_SESSION["userType"]=="Admin")) {
?>
        <script type="text/javascript">
            window.location="admin/dashboard.php";
        </script>
<?php
    }
    elseif((isset($_SESSION["userName"])) and ($_SESSION["userType"]=="Employee")) {
?>
        <script type="text/javascript">
            window.location="employee/dashboard.php";
        </script>
<?php
    }
    elseif((isset($_SESSION["userName"])) and ($_SESSION["userType"]=="Student")) {
?>
        <script type="text/javascript">
            window.location="student/dashboard.php";
        </script>
<?php
    }
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/stylesheet_index.css">
            <script src="js/jquery-3.5.1.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/script_index.js"></script>
            <link rel="stylesheet" href="css/webfonts/all.css">
            <link rel="icon" href="img/amslogofavicon.png">
            <title>Academic Management System</title>
        </head>
        <body>
            <!--Start Header-->
            <header>
                <!--Start Navigation Bar-->
                <nav class="navbar navbar-expand-md navbar-light">
                    <!--Brand Logo-->
                    <div id="nav-brandlogo"></div>
                    <!--Brand Name-->
                    <a class="navbar-brand" href="index.php"><span id="nav-brandname">Academic Management System JUET</span></a>
                    <!--Start Navigation Bar Toggler-->
                    <button id="nav-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsable-navbar" aria-controls="collapsable-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="collapsable-navbar" class="collapse navbar-collapse text-center">
                        <!--Login Button-->
                        <button class="btn btn-primary navbar-btn nav-sm-size ml-auto" type="button" data-toggle="modal" data-target="#modal-login"><i class="fas fa-sign-in-alt"></i> Login</button>
                        <!--Start Modal-->
                        <div id="modal-login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title-login" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <!--Start Modal Header-->
                                    <div class="modal-header">
                                        <h5 id="modal-title-login" class="modal-title">Login to AMS JUET</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!--End Modal Header-->
                                    <!--Start Modal Body-->
                                    <div class="modal-body text-left">
                                        <form action="" id="loginForm" method="POST">
                                            <div class="form-group">
                                                <label for="input-member-type">Member Type</label>
                                                <select id="input-member-type" class="form-control custom-select" name="userType">
                                                    <option disabled selected>Select Member Type</option>
                                                    <option>Admin</option>
                                                    <option>Employee</option>
                                                    <option>Student</option>
                                                </select>
                                            </div>
                                            <div id="form-group-id" class="form-group">
                                                <label id="input-label-id" for="input-id"></label>
                                                <input id="input-id" class="form-control" type="text" name="userName" required>
                                            </div>
                                            <div id="form-group-dob" class="form-group">
                                                <label for="input-dob"><a data-toggle="tooltip" title="" data-original-title="DD-MM-YYYY">Date of Birth</a>
                                                </label>
                                                <input id="input-dob" class="form-control" type="date" placeholder="DD-MM-YYYY">
                                            </div>
                                            <div id="form-group-password" class="form-group">
                                                <label for="input-password">Password</label>
                                                <input id="input-password" class="form-control" type="password"  placeholder="Password" name="password" required>
                                                <a href="">Forgot Password?</a>
                                            </div>
                                            <span id="login-fields-mandatory">All fields are mandatory!</span>
                                        </form>
                                    </div>
                                    <!--End Modal Body-->
                                    <!--Start Modal Footer-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                        <button type="submit" name="login" form="loginForm" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Login</button>
                                    </div>
                                    <!--End Modal Footer-->
                                </div>
                            </div>
                        </div>
                        <!--End Modal-->
                        <!--Start Navigation Bar Menu-->
                        <ul class="navbar-nav">
                            <!--<li class="nav-item active nav-sm-size">
                            <a class="nav-link" href="index.html"><i class="fas fa-home"></i> Home</a>
                            </li>-->
                            <li class="nav-item dropdown nav-sm-size">
                                <a id="nav-dropdown" class="nav-link dropdown-toggle" href="index.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    More
                                </a>
                                <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="nav-dropdown">
                                    <a class="dropdown-item nav-sm-size" href="about.php"><i class="fas fa-info-circle"></i> About Us</a>
                                    <a class="dropdown-item nav-sm-size" href="contact.php"><i class="fas fa-envelope"></i> Contact Us</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item nav-sm-size" href="#"><i class="fas fa-question-circle"></i> Having issues? Report to us!</a>
                                </div>
                            </li>
                        </ul>
                        <!--End Navigation Bar Menu-->
                    </div>
                    <!--End Navigation Bar Toggler-->
                </nav>
                <!--End Navigation Bar-->
            </header>
            <!--End Header-->
            <!--Start Main Content-->
            <div id="main-content">
                <!--Start Carousel-->
                <div id="carousel-photos-juet" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-photos-juet" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-photos-juet" data-slide-to="1"></li>
                        <li data-target="#carousel-photos-juet" data-slide-to="2"></li>
                        <li data-target="#carousel-photos-juet" data-slide-to="3"></li>
                        <li data-target="#carousel-photos-juet" data-slide-to="4"></li>
                        <li data-target="#carousel-photos-juet" data-slide-to="5"></li>
                        <li data-target="#carousel-photos-juet" data-slide-to="6"></li>
                        <li data-target="#carousel-photos-juet" data-slide-to="7"></li>
                        <li data-target="#carousel-photos-juet" data-slide-to="8"></li>
                        <li data-target="#carousel-photos-juet" data-slide-to="9"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/juet10.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/juet4.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/juet1.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/juet2.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/juet3.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/juet5.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/juet6.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/juet7.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/juet8.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/juet9.jpg" class="d-block w-100 carousel-image-size" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Jaypee University of Engineering and Technology</h5>
                                <p>Welcome to Academic Management System JUET</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-photos-juet" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-photos-juet" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--End Carousel-->
                <div id="about-ams" class="text-center">
                    <img src="img/amslogo.png" alt="logo" height=100px width=100px>
                    <h4>Academic Management System</h4>
                    <p class="text-justify">This Academic Management System is maintained by Jaypee University of Engineering and Technology. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis optio vero amet veritatis voluptatibus, iure incidunt facere consequatur voluptates, et obcaecati laborum atque quae temporibus distinctio cumque dolore quis eos. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima eum praesentium vero in perspiciatis ipsam debitis rem. Iure eius placeat eaque quidem illo nisi quos? Fuga nisi libero dolorum sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi nam, culpa recusandae, perspiciatis eaque, porro nihil repellat cum repudiandae maiores vero tempora a minima! Explicabo aliquid assumenda asperiores alias velit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo accusamus labore iste illo optio laborum amet, ex neque reiciendis porro? Fuga atque vel sed est voluptates dolorum possimus sequi voluptas?</p>
                </div>
            </div>
            <!--End Main Content-->
            <!--Start Footer-->
            <footer>
            </footer>
            <!--End Footer-->
            <!--Start Copyright-->
            <div class="copyright-size text-center">&copy; Academic Management System 2020</div>
            <!--End Copyright-->
        </body>
    </html>

<?php
    if(isset($_POST['login'])){
        $count=0;
        if($_POST['userType']=='Student'){
            $sql="SELECT * FROM registration WHERE userName='$_POST[userName]' AND password='$_POST[password]'";
            $result=$mysqli->query($sql);
            $count=$result->num_rows;
            if($count!=0){
                $_SESSION["userName"]=$_POST["userName"];
                $_SESSION["userType"]=$_POST["userType"];
?>
                <script type="text/javascript">
                    window.location="student/dashboard.php";
                </script>
<?php
            }
            else {
?>
                <script type="text/javascript">
                    alert("Invalid credentials! Recheck your username and password and try again!");
                </script>
<?php
            }
        }
        elseif($_POST['userType']=='Employee'){
            $userName=mysqli_real_escape_string($mysqli,$_POST['userName']);
            $password=mysqli_real_escape_string ($mysqli,$_POST['password']) ;
            $sql="SELECT * FROM admin_login WHERE userName='$userName' and password='$password' and admin=0";
            $result=$mysqli->query($sql);
            $count=$result->num_rows;
            if($count!=0){
                $_SESSION['userName']=$_POST['userName'];
                $_SESSION["userType"]=$_POST["userType"];
?>
            <script type="text/javascript">
                window.location="employee/dashboard.php";
            </script>
<?php
            }
            else {
?>
                <script type="text/javascript">
                    alert("Invalid credentials! Recheck your username and password and try again!");
                </script>
<?php
            }
        }
        elseif($_POST['userType']=='Admin'){
            $userName=mysqli_real_escape_string($mysqli,$_POST['userName']);
            $password=mysqli_real_escape_string ($mysqli,$_POST['password']);
            $sql="SELECT * FROM admin_login WHERE userName='$userName' and password='$password' and admin=1";
            $result=$mysqli->query($sql);
            $count=$result->num_rows;
            if($count!=0){
                $_SESSION['userName']=$_POST['userName'];
                $_SESSION["userType"]=$_POST["userType"];
?>
            <script type="text/javascript">
                window.location="admin/dashboard.php";
            </script>
<?php
            }
            else {
?>
                <script type="text/javascript">
                    alert("Invalid credentials! Recheck your username and password and try again!");
                </script>
<?php
            }
        }
    }
?>