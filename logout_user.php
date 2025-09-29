<?php
session_start();
unset($_SESSION['user_email']);
echo "<script>window.location.assign('add_user.php?msg=logout successfully')</script>";
?>