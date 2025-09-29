<?php
include ("header1.php");
include("conn_database.php");
 $query = "SELECT * FROM `product` where `category`='$_REQUEST[category_name]'";
$result = mysqli_query($conn,$query);

?>
<style>
	.img-height{
		height:250px
	}
</style>
    <div class="services-breadcrumb_w3ls_agileinfo">
		<div class="inner_breadcrumb_agileits_w3">

			<ul class="short">
				<li><a href="index.php">Home</a><i>|</i></li>
				<li>Product view</li>
			</ul>
		</div>
	</div> 
</div>
<div class="container-fluid">
	<div class="row">
	<h1 align="center" >Product View</h1><br>
    <?php
        while($data = mysqli_fetch_array($result))
        {
    ?>
	<div class="col-md-3 product-men">
		<div class="product-shoe-info shoe">
			<div class="men-pro-item">
			
				<div class="men-thumb-item">
					<img src="product/<?php echo $data['image']; ?>" alt="" class="img img-thumbnail img-height">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="view_single_product.php?id=<?php echo $data['id']; ?>" class="link-product-add-cart">Quick View</a>
                        </div>
                    </div>
				</div>
				<div class="item-info-product">
					<h4>
						<a href="view_single_product.php?id=<?php echo $data['id']; ?>"><?php echo $data['product_name']; ?></a>
					</h4>
					
					<div class="info-product-price">
						<div class="grid_meta">
							<div class="product_price">
								<div class="grid-price ">
									<span class="money "><?php echo $data['category']; ?></span>
								</div>
							</div>
						</div>
						<div class="shoe single-item hvr-outline-out">
							<a href="add_to_cart.php?x=<?php echo $data['id'];?>" class="button add"> <i class="fa fa-cart-plus"
							 aria-hidden="true"></i></a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
        }
    ?>
	<div class="md-col-1"></div>
	</div>
</div>
<?php
include("footer.php");
?>