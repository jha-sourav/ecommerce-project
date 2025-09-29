<?php
include_once("header1.php");
include("conn_database.php");
 $query = "SELECT * FROM `category` where `id`='$_REQUEST[id]'";
$result = mysqli_query($conn,$query);
if($data = mysqli_fetch_array($result))
{
    $cat_name = $data['category_name'];
    $cat_thumb = $data['thumbnail'];
}
?>
</div>
<h1 class="text-center mt-2">Edit Category</h1>
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
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" name="category_name" value="<?php echo $cat_name; ?>"  required>
                </div>
                <div class="form-group">
                    <label for="">Thumbnail</label>
                    <input type="file" class="form-control" name="thumbnail">
                    <input type="hidden" name="old_image" value="<?php echo $cat_thumb?>">
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
    $category_name = $_REQUEST["category_name"];
    if($_FILES['thumbnail']['name'])
    {
        $file_name = $_FILES["thumbnail"]["name"];
        $file_tmp_path = $_FILES["thumbnail"]["tmp_name"];
        $file_type = $_FILES["thumbnail"]["type"];
        $file_sizes = $_FILES["thumbnail"]["size"];
    
        $new_name = rand().$file_name;
        move_uploaded_file($file_tmp_path,'category/'.$new_name);
    }else{
        $new_name = $_REQUEST['old_image'];
    }

    //connect with database
    include("config.php");

    //insert query
    $query = "UPDATE `category` set `category_name`='$category_name', `thumbnail`='$new_name' where `id`='$id'";

    //Execute 
    $result = mysqli_query($conn,$query);

    if($result>0)
    {
        echo "<script>window.location.assign('manage_category.php?msg=Record Updated')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_category.php?msg=Try again')</script>";
    }
}
?>