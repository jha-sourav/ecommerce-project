<?php
session_start();
unset($_SESSION['email']);
echo "<script>window.location.assign('admin_login.php?msg=logout successfully')</script>";
?>