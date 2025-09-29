<?php
session_start();
//check session
if(isset($_SESSION["email"]))
{
    //store session
    $email = $_SESSION['email'];
    // echo $_SESSION["email"];
}
else{
    //url redirection 
    echo "<script>window.location.assign('admin_login.php?msg=Please login first to proceed')</script>";
}
include_once("header1.php");
?>
</div>
<!-- breadcrumbs -->
<div class="crumbs text-center">
    <div class="container">
        <div class="row">
            <ul class="btn-group btn-breadcrumb bc-list">
                <li class="btn btn1">
                    <a href="index.php">
                        <i class="glyphicon glyphicon-home"></i>
                    </a>
                </li>
                <li class="btn btn2">
                    <a href="#">Welcome</a><br>
                </li>
            </ul>
        </div>
    </div>
</div>
<h1>Welcome </h1>

<a href="logout.php" class="btn btn-danger">Logout</a>
<?php
include_once("footer.php");
?>