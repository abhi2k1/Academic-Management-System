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
                <h2 class="text-center">Contact Us</h2>
                <div class="container-fluid">
                    <div class="row">
                        <div id="contact-general" class="col-12 text-center">
                            <h4>Jaypee University of Engineering and Technology</h4>
                            <h5>A-B Road, Raghogarh, Guna 473226, Madhya Pradesh, India</h5>
                            <p>Toll-free helpline number: <a href="tel:180030701556">1800 3070 1556</a><br>
                                Phone Number: <a href="tel:+917544267051">+91 75442 67051</a>, <a href="tel:+91267310314">267310 314</a><br>
                                Fax: <a href="fax:+917544267011">+91 75442 67011</a><br>
                                Email: <a href="mailto:contact@juet.ac.in">contact@juet.ac.in</a>
                            </p>
                        </div>
                        <div class="col-12 text-center">
                            <h3>Important Contacts</h3>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-start">Designation</th>
                                            <th>Name</th>
                                            <th>E-mail ID</th>
                                            <th>EPBAX Extension Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Vice Chancellor</td>
                                            <td>Prof. J.S.P. Rai</td>
                                            <td><a href="mailto:vc@juet.ac.in">vc@juet.ac.in</a></td>
                                            <td>101</td>
                                        </tr>
                                        <tr>
                                            <td>Dean (Academics & Research)</td>
                                            <td>Prof. Shishir Kumar</td>
                                            <td><a href="mailto:dean@juet.ac.in">dean@juet.ac.in</a></td>
                                            <td>107</td>
                                        </tr>
                                        <tr>
                                            <td>Registrar</td>
                                            <td>Brig. Arjun Rawat (Retd)</td>
                                            <td><a href="mailto:arjun.rawat@juet.ac.in">arjun.rawat@juet.ac.in</a></td>
                                            <td>103</td>
                                        </tr>
                                        <tr>
                                            <td>Chief Finance Controller</td>
                                            <td>Mr. V.C. Pandey</td>
                                            <td><a href="mailto:vc.pandey@juet.ac.in">vc.pandey@juet.ac.in</a></td>
                                            <td>111</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                                <h3>Head of Departments</h3>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-start">Designation</th>
                                            <th>Name</th>
                                            <th>E-mail ID</th>
                                            <th>EPBAX Extension Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Chemical Engineering</td>
                                            <td>Prof. P.K. Singh</td>
                                            <td><a href="mailto:pk.singh@juet.ac.in">pk.singh@juet.ac.in</a></td>
                                            <td>108</td>
                                        </tr>
                                        <tr>
                                            <td>Civil Engineering</td>
                                            <td>Dr. Sumit Gandhi</td>
                                            <td><a href="mailto:sumit.gandhi@juet.ac.in">sumit.gandhi@juet.ac.in</a></td>
                                            <td>109</td>
                                        </tr>
                                        <tr>
                                            <td>Computer Science & Engineering</td>
                                            <td>Prof. Shishir Kumar</td>
                                            <td><a href="mailto:shishir.kumar@juet.ac.in">shishir.kumar@juet.ac.in</a></td>
                                            <td>107</td>
                                        </tr>
                                        <tr>
                                            <td>Electronics & Communications Engineering</td>
                                            <td>Dr. Narendra Singh</td>
                                            <td><a href="mailto:narendra.singh@juet.ac.in">narendra.singh@juet.ac.in</a></td>
                                            <td>105</td>
                                        </tr>
                                        <tr>
                                            <td>Mechanical Engineering</td>
                                            <td>Prof. Ghanshyam Singh</td>
                                            <td><a href="mailto:ghanshyam.singh@juet.ac.in">ghanshyam.singh@juet.ac.in</a></td>
                                            <td>230</td>
                                        </tr>
                                        <tr>
                                            <td>Chemistry</td>
                                            <td>Prof. P.K. Singh</td>
                                            <td><a href="mailto:pk.singh@juet.ac.in">pk.singh@juet.ac.in</a></td>
                                            <td>108</td>
                                        </tr>
                                        <tr>
                                            <td>Humanities & Social Sciences</td>
                                            <td>Dr. Sandeep Srivastava</td>
                                            <td><a href="mailto:sandeep.srivastava@juet.ac.in">sandeep.srivastava@juet.ac.in</a></td>
                                            <td>328</td>
                                        </tr>
                                        <tr>
                                            <td>Mathematics</td>
                                            <td>Prof. Vipin Tyagi</td>
                                            <td><a href="mailto:vipin.tyagi@juet.ac.in">vipin.tyagi@juet.ac.in</a></td>
                                            <td>104</td>
                                        </tr>
                                        <tr>
                                            <td>Physics</td>
                                            <td>Dr. Rajneesh Atre</td>
                                            <td><a href="mailto:rajneesh.atre@juet.ac.in">rajneesh.atre@juet.ac.in</a></td>
                                            <td>124</td>
                                        </tr>
                                        <tr>
                                            <td>Faculty of Mathematical Sciences</td>
                                            <td>Prof. Vipin Tyagi</td>
                                            <td><a href="mailto:vipin.tyagi@juet.ac.in">vipin.tyagi@juet.ac.in</a></td>
                                            <td>104</td>
                                        </tr>
                                        <tr>
                                            <td>Incharge - Server Room</td>
                                            <td>Mr. Vikas Dixit</td>
                                            <td><a href="mailto:vikas.dixit@juet.ac.in">vikas.dixit@juet.ac.in</a></td>
                                            <td>119</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
