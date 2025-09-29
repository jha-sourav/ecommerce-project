<?php
session_start();
//check session
if(isset($_SESSION["user_email"]))
{
    //store session
    $email = $_SESSION['user_email'];
    // echo $_SESSION["email"];
}
else{
    //url redirection 
    echo "<script>window.location.assign('add_user.php?msg1=Invalid login or password')</script>";
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
                    <a href="#">Welcome User</a><br>
                </li>
            </ul>
        </div>
    </div>
</div>
<h1>Welcome User</h1>

<a href="logout_user.php" class="btn btn-danger">Logout</a>
<?php
include_once("footer.php");
?>