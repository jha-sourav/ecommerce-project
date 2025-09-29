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
					<li>Product</li>
				</ul>
			</div>
		</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <br><h1>Product !</h1><br>
            <?php
               if(isset($_REQUEST["msg2"]))
                {
                     echo $_REQUEST["msg2"];
                }
            ?>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Category </label>
                    <select name="category" id="category"  class="form-control" >
                    <option value="" selected disabled>Select Category</option>
                    <?php
                        include("conn_database.php");
                        $query = "SELECT * FROM `category`";
                        $result = mysqli_query($conn,$query);
                        while($data = mysqli_fetch_array($result))
                        {
                            echo "<option>".$data['category_name']."</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Product Name </label>
                    <input type="text" class="form-control" name="product" placeholder="Enter Product Name " required>
                </div>
                <div class="form-group">
                    <label for="">Image </label>
                    <input type="file" class="form-control" name="image" placeholder="Browse " required>
                </div>
                <div class="form-group">
                    <label for="">Quantity </label>
                    <input type="text" class="form-control" name="quantity" placeholder="Enter Quantity Here " required>
                </div>
                <div class="form-group">
                    <label for="">Cost </label>
                    <input type="text" class="form-control" name="cost" placeholder="Enter Cost " required>
                </div>
                <div class="form-group">
                    <label for="">Description </label>
                    <textarea name="description" cols="30" rows="4" class="form-control" placeholder="Enter Description..." required></textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

    $category = $_REQUEST["category"];
    $product = $_REQUEST["product"];
    $quantity = $_REQUEST["quantity"];
    $cost = $_REQUEST["cost"];
    $description = $_REQUEST["description"];

    $file_name = $_FILES["image"]["name"];
    $file_tmp_path = $_FILES["image"]["tmp_name"];
    $file_type = $_FILES["image"]["type"];
    $file_sizes = $_FILES["image"]["size"];

    $new_name = rand().$file_name;

    $query = "INSERT INTO product (`category`,`product_name`,`image`,`description`,`quantity`,`cost`,`status`)
    VALUES ('$category','$product','$new_name','$description','$quantity','$cost','Active')";

    $result = mysqli_query($conn,$query);
    if($result>0){
        move_uploaded_file($file_tmp_path,'product/'.$new_name);
        echo "<script>window.location.assign('add_product.php?msg2=Values inserted successfully')</script>";
    }
    else{
        echo "<script>window.location.assign('add_product.php?msg2=Something went wrong.<br>Please inseart again.')</script>";
    }
}
?>