<?php include("includes/header.php");
session_start();
 ?>
<div id="welcome">	
	<h2>Welcome, <span><?php
            set_error_handler(function ($err_severity, $err_msg, $err_file, $err_line) {
                throw new ErrorException ($err_msg, 0, $err_severity, $err_file, $err_line);
            });
            try {
                print($_SESSION['session_username']);
            }
            catch (Exception $exception) {
                print("Guest. You can login at the link below");
            }
            ?> </span></h2>
	<p><a href="logout.php">Logout</a> Here!</p>
</div>
<?php include("includes/footer.php"); ?>

