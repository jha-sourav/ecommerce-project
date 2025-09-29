<?php 
session_start();
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
include "header1.php";?>
<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>Cart</li>
				</ul>
			</div>
		</div>
</div>
<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <br><h1 align=center>Cart !</h1><br>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
            }
        ?>
            <table class="table table-bordered table-striped">
                <tr class="danger">
                    <th>S.No.</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
                <?php 
						$t =0;$total=0;$pid=0;
if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
	foreach($_SESSION['cart'] as $id=>$quantity){

				
			$t++;
			
			include"conn_database.php";
$res  = mysqli_query($conn,"select * from product where `id`='$id'");



if($row=mysqli_fetch_array($res))
{
$pid=$row['id'];
?> 
                            <tr class="rem1">
                                <td class="invert"><?php echo $t; ?></td>
                                <td class="invert-image">
                                    <a href="single_product.php">
                                        <img style="height:100px;width:100px;" src="product/<?php echo $row['image']; ?>" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <form action="update_cart.php">
												<input type="hidden" value="<?php echo $id; ?>" name="id"/>
                                                <input type="hidden" value="<?php echo $row['category']; ?>" name="category"/>
												<input type="number" style="width:50px" value="<?php echo $quantity; ?>" name="qty" min="0"/><input type="submit" value="update">
											</form>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert"><?php echo $row['product_name']; ?></td>

                                <td class="invert"><?php $total += ($row['cost']*$quantity); echo ($row['cost']*$quantity)."<br/>"; ?></td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1"><a href='remove_cart.php?x=<?php echo $id; ?>' class="btn btn-secondary ml-4"><i class="fa fa-trash"></i></a> </div>
                                    </div>

                                </td>
                            </tr>
<?php } } }
else{
?>
							<tr>
								<td colspan="6">No item in cart</td>
							</tr>
<?php
 } ?>
  </table>
                </div>
                <div class="row checkout-left mt-5">
                    <div class="col-md-4 checkout-left-basket">
                        <h4>Your total amount to be paid is</h4>
                        <ul>
                            <li>Total
                                <i>-</i>
                                <span>Rs. <?php echo $total; ?> /-</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 address_form">
                        <h4>Billing Address</h4>
                        <form action="pay.php" method="post" class="creditly-card-form shopf-sear-headinfo_form">
                            <div class="creditly-wrapper wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Full name: </label>
                                            <input class="billing-address-name form-control" type="hidden" name="pid" placeholder="Product Id" value="<?php echo $pid;?>">
                                            <input class="billing-address-name form-control" type="hidden" name="quantity" placeholder="Quantity" value="<?php echo $quantity;?>">
                                            <input class="billing-address-name form-control" type="hidden" name="product_name" placeholder="Product Id" value="<?php echo $row['product_name'];?>">
											<input class="billing-address-name form-control" type="hidden" name="amount" placeholder="amount" value="<?php echo $total;?>">
                                            <input class="billing-address-name form-control" type="hidden" name="category" value="<?php echo $row['category']; ?>">
											<input class="billing-address-name form-control" type="hidden" name="email" placeholder="email" value="<?php echo $email;?>">
											<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                                        </div>
                                        
                                            <div class="card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">Landmark: </label>
                                                    <input class="form-control" type="text" placeholder="Landmark">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Address type: </label>
                                            <select class="form-control option-fieldf">
                                                <option>Office</option>
                                                <option>Home</option>
                                                <option>Commercial</option>

                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    if($total!="0"){
                                    ?>
                                    <button class="btn formbtn1 btn-primary mt-4">Place Order</button>
                                    <?php }?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//checkout-->
 <?php include"footer.php";?>