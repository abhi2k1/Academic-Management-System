<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/stylesheet_index.css">
            <link rel="stylesheet" href="../css/stylesheet_student.css">
            <script src="../js/jquery-3.5.1.min.js"></script>
            <script src="../js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="../css/webfonts/all.css">
            <link rel="icon" href="../img/amslogofavicon.png">
            <title>Academic Management System - Student</title>
        </head>
        <body>
            <!--Start Header-->
            <header>
                <!--Start Navigation Bar-->
                <nav class="navbar navbar-expand-md navbar-light">
                    <!--Brand Logo-->
                    <div id="nav-brandlogo"></div>
                    <!--Brand Name-->
                    <a class="navbar-brand" href="dashboard.php"><span id="nav-brandname">Academic Management System JUET</span></a>
                    <!--Start Navigation Bar Toggler-->
                    <button id="nav-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsable-navbar" aria-controls="collapsable-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="collapsable-navbar" class="collapse navbar-collapse text-center">
                        <!--Start Navigation Bar Menu-->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item nav-sm-size">
                            <a class="nav-link" href="dashboard.php"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="nav-item nav-sm-size">
                                <a class="nav-link" href="notifications.php"><i class="fas fa-bell"></i> Notifications</a>
                            </li>
                            <li class="nav-item nav-sm-size">
                                <a class="nav-link" href="select_exam.php">Select an Exam</a>
                            </li>
                            <li class="nav-item nav-sm-size">
                                <a class="nav-link" href="previous_results.php">Previous Results</a>
                            </li>
                            <li class="nav-item dropdown nav-sm-size">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="rounded-circle" src="../img/avatar.png" height="30px" width="30px" alt=""/>
                                        <span class="admin-name"><?php echo $_SESSION["userName"];?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right text-center">
                                    <a class="dropdown-item nav-sm-size" href="logout.php">Logout</a>
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