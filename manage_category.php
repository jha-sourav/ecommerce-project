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
include("header1.php");
?>
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>Manage Category</li>
				</ul>
			</div>
		</div>
</div>
<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <br><h1 align=center>Category Table !</h1><br>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo $_REQUEST["msg"];
            }
            ?>
            <table class="table table-bordered table-striped">
                <tr class="danger">
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Thumbnail</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $sno = 1; 
                    include("conn_database.php");
                    $query = "SELECT * FROM `category`";
                    $result = mysqli_query($conn,$query);
                    while($data = mysqli_fetch_array($result))
                    {
                ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $data['category_name']; ?></td>
                        <td>
                            <img src="category/<?php echo $data['thumbnail']; ?>" alt="" class="img img-thumbnail" width="150px">
                            
                        </td>
                        <td>
                        <a href="edit_category.php?id=<?php echo $data['id']; ?>">
                            <i class="fa fa-edit text-success fa-2x"></i>
                        </td>
                        <td>
                            <a href="delete_category.php?id=<?php echo $data['id']; ?>">
                                <i class="fa fa-trash text-danger fa-2x"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                    $sno++;
                    }
                ?>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>

</div>
<?php
include("footer.php");
?>