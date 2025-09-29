<?php
include ("header1.php")
?>
    <div class="services-breadcrumb_w3ls_agileinfo">
		<div class="inner_breadcrumb_agileits_w3">

			<ul class="short">
				<li><a href="index.php">Home</a><i>|</i></li>
				<li>Category view</li>
			</ul>
		</div>
	</div> 
</div>
<div class="container-fluid">
	<div class="row">
	<h1 align="center" >Category View</h1><br>
	<?php
                    $sno = 1; 
                    include("conn_database.php");
                    $query = "SELECT * FROM `category`";
                    $result = mysqli_query($conn,$query);
                    while($data = mysqli_fetch_array($result))
                    {
                ?>
	<div class="col-md-3 product-men">
		<div class="product-shoe-info shoe">
			<div class="men-pro-item">
			
				<div class="men-thumb-item">
					<img src="category/<?php echo $data['thumbnail']; ?>" alt="" class="img img-thumbnail img.height" width="150px">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="view_product.php?category_name=<?php echo $data['category_name']; ?>" class="link-product-add-cart">Quick View</a>
						</div>
					</div>
				</div>
				<div class="item-info-product">
					<h4>
						<a href="view_product.php?category_name=<?php echo $data['category_name']; ?>"><?php echo $data['category_name']; ?></a>
					</h4>
					
					<div class="info-product-price">
						<div class="grid_meta">
							<div class="product_price">
								<div class="grid-price ">
									<span class="money "><?php echo $data['category_name']; ?></span>
								</div>
							</div>
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