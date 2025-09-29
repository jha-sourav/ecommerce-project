<?php
session_start();
include("header1.php");
?>
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>User</li>
				</ul>
			</div>
		</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <br><h1>User Register!</h1><br>
            <?php
               if(isset($_REQUEST["msg2"]))
                {
                     echo $_REQUEST["msg2"];
                }
            ?>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="">Name </label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name " required>
                </div>
                <div class="form-group">
                    <label for="">Email </label>
                    <input type="email" class="form-control" name="user_email" placeholder="Enter Email " required>
                </div>
                <div class="form-group">
                    <label for="">Password </label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password " required>
                </div>
                <div class="form-group">
                    <label for="">Contact </label>
                    <input type="number" class="form-control" name="contact" placeholder="Enter Your Contact " required>
                </div>
                <div class="form-group">
                    <label for="">Address </label>
                    <textarea name="address" cols="30" rows="4" class="form-control" placeholder="Enter Address Here..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="">City </label>
                    <input type="text" class="form-control" name="city" placeholder="Enter City " required>
                </div>
                <div class="form-group">
                    <label for="">State </label>
                    <input type="text" class="form-control" name="state" placeholder="Enter State " required>
                </div>
                <div class="form-group">
                    <label for="">Pincode </label>
                    <input type="number" class="form-control" name="pincode" placeholder="Enter Pincode " required>
                </div>
                
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <br><h1>User Login!</h1><br>
            <?php
               if(isset($_REQUEST["msg1"]))
                {
                     echo $_REQUEST["msg1"];
                }
            ?>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="user_email" placeholder="Enter Email Address" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" name = "login" class="btn btn-primary">Login</button>
                </div>

            </form>
        </div>
        <div class="col-md-1"></div>
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

    $name = $_REQUEST["name"];
    $email = $_REQUEST["user_email"];
    $password = ($_REQUEST["password"]);
    $contact = $_REQUEST["contact"];
    $address = $_REQUEST["address"];
    $city = $_REQUEST["city"];
    $state = $_REQUEST["state"];
    $pincode = $_REQUEST["pincode"];

    $query = "INSERT INTO users (`name`,`user_email`,`password`,`contact`,`address`,`city`,`state`,`pincode`,`status`)
    VALUES ('$name','$email','$password','$contact','$address','$city','$state','$pincode','Active')";

    $result = mysqli_query($conn,$query);
    if($result>0){

        echo "<script>window.location.assign('add_user.php?msg2=Values inserted successfully')</script>";
    }
    else{
        echo "<script>window.location.assign('add_user.php?msg2=Something went wrong.<br>Please inseart again.')</script>";
    }
}
?>

<?php
if(isset($_REQUEST["login"]))
{
    //connection
    include("conn_database.php");

    $email = $_REQUEST["user_email"];
    $password = ($_REQUEST["password"]);

    $query = "select * from users where user_email='$email' and password='$password'";

    $result = mysqli_query($conn,$query);
    if($data = mysqli_fetch_array($result)){

        // session create 
        $_SESSION["user_email"] = $data['user_email'];
        // echo $_SESSION["email"];
        echo "<script>window.location.assign('welcome_user.php')</script>";
    }
    else{
        echo "<script>window.location.assign('add_user.php?msg1=Invalid email or password')</script>";
    }
}
?>