<?php
include ("header1.php");
include("conn_database.php");
 $query = "SELECT * FROM `product` where `id`='$_REQUEST[id]'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_array($result);
$cat_name=$data['category'];
?>
    <div class="services-breadcrumb_w3ls_agileinfo">
		<div class="inner_breadcrumb_agileits_w3">

			<ul class="short">
				<li><a href="index.php">Home</a><i>|</i></li>
				<li>Single</li>
			</ul>   
		</div>
	</div> 
</div>
<div class="container-fluid">
    <div class="row">
        <!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
            <div class="col-md-3"></div>
			<div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">

						<div class="slides">
								<div class="thumb-image"> <img src="product/<?php echo $data['image']; ?>" data-imagezoom="true" class="img-responsive"> </div><br>
                        </div>
                        <div class="occasion-cart">
                            <div class="shoe single-item single_page_b">
                                    <a href="add_to_cart.php?x=<?php echo $data['id'];?>" class="button add"> Add to Cart</a>
                                    <!-- <input type="submit" name="submit" value="Add to cart" class="button add"> -->
                               
                            </div>
                        </div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-4 single-right-left simpleCart_shelfItem">
				<h3><?php echo $data['product_name']; ?></h3>
				<p><span class="item_price"><?php echo $data['cost']; ?></span>	</p>
                <div class="color-quality">
					<div class="color-quality-right">
						<h5>Qualntity :</h5>
						<select id="country1" value="" class="frm-field required sect">
                        <?php
                            include("conn_database.php");
                            $query = "SELECT * FROM `product` where `id`='$_REQUEST[id]'";
                            $result = mysqli_query($conn,$query);
                            while($data1 = mysqli_fetch_array($result))
                            {
                                $quan = 1;
                                while($quan<=$data1['quantity'])
                                {echo "<option>".$quan."</option>";
                                $quan++;}
                            }
                        ?>								
							</select>
					</div>
				</div><br>
                <ul class="social-nav model-3d-0 footer-social social single_page">
                        <li class="share">Share On : </li>
                        <li>
                            <a href="#" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="pinterest">
                                <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                            </a>
                        </li>
                </ul>
				
			</div>
			<div class="clearfix"> </div>
			<!--/tabs-->
            
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#Description">Description</a></li>
            </ul>

            <div class="tab-content">
                <div id="Description" class="tab-pane fade in active">
                    <h3>Description</h3>
                    <p><?php echo $data['description']; ?></p>
                </div>
            </div>
			<!--//tabs-->
			<!-- /new_arrivals -->
            <div class="new_arrivals">
            <div class="col-md-3"></div>
                <h3>Featured Products</h3>
                
                <!-- /womens -->
                <?php
                    include("conn_database.php");
                    $query = "SELECT * FROM `product` where `category`='$cat_name'";
                    $result = mysqli_query($conn,$query);
                    while($data = mysqli_fetch_array($result))
                    {
                        ?>
                <div class="col-md-3 product-men women_two">
                    
                    <div class="product-shoe-info shoe">
                        <div class="men-pro-item">
                            <div class="men-thumb-item">
                            <img src="product/<?php echo $data['image']; ?>" alt="" class="img  img-thumbnail img-height" >
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
                                                <span class="money "><?php echo $data['cost']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shoe single-item hvr-outline-out">
                                        <a href="add_to_cart.php?x=<?php echo $data['id'];?>" class="button add"> <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
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

                <!-- //womens -->
                <div class="clearfix"></div>
            </div>
			<!--//new_arrivals-->


		</div>
	</div>
	<!-- //top products -->
    </div>
</div>

<?php
include("footer.php");
?>

