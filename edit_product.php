<?php
include_once("header1.php");
include("conn_database.php");
 $query = "SELECT * FROM `product` where `id`='$_REQUEST[id]'";
$result = mysqli_query($conn,$query);
if($data = mysqli_fetch_array($result))
{
    $pro_name = $data['product_name'];
    $img = $data['image'];
    $cat = $data['category'];
    $quan = $data['quantity'];
    $cst = $data['cost'];
}
?>
</div>
<h1 class="text-center mt-2">Edit Product</h1>
<!--//breadcrumbs ends here-->
<div class="container-fluid">
    <div class="row my-2">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php
                if(isset($_REQUEST["msg"]))
                {
                    echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
                }
            ?>
            <form action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $_REQUEST['id'];?>">
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" class="form-control" name="category" value="<?php echo $cat; ?>"  required>
                </div>
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="<?php echo $pro_name; ?>"  required>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                    <input type="hidden" name="old_image" value="<?php echo $img?>">
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quan; ?>"  required>
                </div>
                <div class="form-group">
                    <label for="">Cost</label>
                    <input type="text" class="form-control" name="cost" value="<?php echo $cst; ?>"  required>
                </div>
                <button type="submit" class="btn btn-primary my-2" name="submit">Submit</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php
include_once("footer.php");
?>

<?php
if(isset($_REQUEST["submit"]))
{
    $id = $_REQUEST["id"];
    $category = $_REQUEST["category"];
    $product_name = $_REQUEST["product_name"];
    $quantity = $_REQUEST["quantity"];
    $cost = $_REQUEST["cost"];

    if($_FILES['image']['name'])
    {
        $file_name = $_FILES["image"]["name"];
        $file_tmp_path = $_FILES["image"]["tmp_name"];
        $file_type = $_FILES["image"]["type"];
        $file_sizes = $_FILES["image"]["size"];
    
        $new_name = rand().$file_name;
        move_uploaded_file($file_tmp_path,'product/'.$new_name);
    }else{
        $new_name = $_REQUEST['old_image'];
    }

    //connect with database
    include("config.php");

    //insert query
    $query = "UPDATE `product` set `product_name`='$product_name', `image`='$new_name', `category`='$category', `quantity`='$quantity', `cost`='$cost' where `id`='$id'";

    //Execute 
    $result = mysqli_query($conn,$query);

    if($result>0)
    {
        echo "<script>window.location.assign('manage_product.php?msg=Record Updated')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_product.php?msg=Try again')</script>";
    }
}
?>