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
    echo "<script>window.location.assign('add_user.php?msg=Please login first to proceed')</script>";
}
include("header1.php");
?>
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>Category</li>
				</ul>
			</div>
		</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <?php
            if(isset($_REQUEST["msg"]))
            {
                echo $_REQUEST["msg"];
            }
        ?>
            <br><h1>Category !</h1><br>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Category Name </label>
                    <input type="text" class="form-control" name="category" placeholder="Enter Category Name " required>
                </div>
                <div class="form-group">
                    <label for="">Thumbnail</label>
                    <input type="file" class="form-control" name="thumbnail" placeholder="Enter Thumbnail" required>
                </div>
                
                <div class="form-group">
                    <button type="submit"  class="btn btn-primary" name="submit">Submit</button>
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
    $category_name = $_REQUEST["category"];
    
    $file_name = $_FILES["thumbnail"]["name"];
    $file_tmp_path = $_FILES["thumbnail"]["tmp_name"];
    $file_type = $_FILES["thumbnail"]["type"];
    $file_sizes = $_FILES["thumbnail"]["size"];

    $new_name = rand().$file_name;
    
    //connect with database
    include("conn_database.php");

    //insert query
    $query = "INSERT INTO `category`(`category_name`, `thumbnail`, `status`) VALUES ('$category_name','$new_name','Active')";

    //Execute 
    $result = mysqli_query($conn,$query);

    if($result>0)
    {
        move_uploaded_file($file_tmp_path,'category/'.$new_name);
        echo "<script>window.location.assign('add_category.php?msg=Record Inserted')</script>";
    }
    else{
        echo mysqli_error($conn);
        echo "<script>window.location.assign('add_category.php?msg=Try again')</script>";
    }
}
?>