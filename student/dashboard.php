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
                <h2 class="text-center">Welcome, <?php echo $_SESSION['userName']?>!</h2>
            </div>
            <!--End Main Content-->
<?php
    include "footer.php";
?>