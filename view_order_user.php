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
					<li>View User Order</li>
				</ul>
			</div>
		</div>
</div>
<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <br><h1 align=center>My Orders !</h1><br>
            <table class="table table-bordered  table-striped">
                <tr class="danger">
                    <th>#</th>
                    <th>Order ID</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Order Date</th>
                    <th>Amount</th>
                    <th>Quantity</th>
                    <th>Order Status</th>
                </tr>
                <?php
                    $sno = 1; 
                    include("conn_database.php");
                    $query = "SELECT * FROM `orders` where `user_email` = '$_SESSION[user_email]'";
                    $result = mysqli_query($conn,$query);
                    while($data = mysqli_fetch_array($result))
                    {
                ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $data['order_id']; ?></td>
                        <td><?php echo $data['category']; ?></td>
                        <td><?php echo $data['product']; ?></td>
                        <td><?php echo $data['order_date']; ?></td>
                        <td><?php echo $data['amount']; ?></td>
                        <td><?php echo $data['quantity']; ?></td>
                        <td><?php if(($data['order_status'])=="Approved"){
                            ?><button class="btn btn-success"><?php echo $data['order_status']; ?></button><?php }
                            else if(($data['order_status'])=="Declined")
                            {?><button class="btn btn-danger"><?php echo $data['order_status']; ?></button>
                            <?php }
                            else
                            {?><button class="btn btn-warning"><?php echo $data['order_status']; ?></button><?php } ?></td>
                    </tr>
                <?php
                    $sno++;
                    }
                ?>
                
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>
<?php
include("footer.php");
?>