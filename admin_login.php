<?php
session_start();
include("header1.php");
?>
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>Login</li>
				</ul>
			</div>
		</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <br><h1>Admin Login!</h1><br>
            <?php
               if(isset($_REQUEST["msg"]))
                {
                     echo $_REQUEST["msg"];
                }
            ?>
            <form id="admin_login_form" action="#" method="post">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email Address" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                
                <div class="form-group">
                    <button type="submit"  class="btn btn-primary" name="submit">Login</button>
                </div>

            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php
include("footer.php");
?>

<?php
if(isset($_REQUEST["submit"]))
{
    //connection
    include("conn_database.php");

    $email = $_REQUEST["email"];
    $password = ($_REQUEST["password"]);

    $query = "select * from admin_login where email='$email' and password='$password'";

    $result = mysqli_query($conn,$query);
    if($data = mysqli_fetch_array($result)){

        // session create 
        $_SESSION["email"] = $data['email'];
        // echo $_SESSION["email"];
        echo "<script>window.location.assign('welcome.php')</script>";
    }
    else{
        echo "<script>window.location.assign('admin_login.php?msg=Invalid email or password')</script>";
    }
}
?>