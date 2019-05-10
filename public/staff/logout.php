<?php
require_once('../../private/initialize.php');
unset($_SESSION['username']);
// log_out_admin();
redirect_to(url_for('/staff/login.php'));

?>
