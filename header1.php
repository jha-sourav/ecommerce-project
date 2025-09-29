<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Downy Shoes an Ecommerce Category Bootstrap Responsive Website Template | About :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/about.css" type="text/css" media="screen" property="" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- banner -->
<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">
			<div class="header_agileits">
				<div class="logo inner_page_log">
					<h1><a class="navbar-brand" href="index.html"><span>Downy</span> <i>Shoes</i></a></h1>
				</div>
				<div class="overlay overlay-contentpush">
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

					<nav>
					<?php
						if(isset($_SESSION["user_email"]))
						{
							?>
						<ul>
							<li><a href="index.php" class="active">Home</a></li>
							<li><a href="add_category.php">Add Category</a></li>
							<li><a href="view_category.php">Shop Now</a></li>
							<li><a href="add_user.php">Login/Register</a></li>
							<li><a href="add_product.php">Add Product</a></li>
							<li><a href="view_order_user.php">My Orders</a></li>
							<li><a href="welcome_user.php">Logout</a></li>
						</ul>
						<?php
						}
						else if(isset($_SESSION["email"])){
							?>
							<ul>
							<li><a href="index.php" class="active">Home</a></li>
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" 
							aria-expanded="false">Category</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="add_category.php">Add Category</a>
							<a class="dropdown-item" href="manage_category.php">Manage Category</a>
							</div>	</li>	
							<li><a href="view_category.php">Shop Now</a></li>
							<li><a href="admin_login.php">Admin Login</a></li>
							<li><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" 
							aria-expanded="false">Products</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="add_product.php">Add Product</a>
							<a class="dropdown-item" href="manage_product.php">Manage Product</a>
							</div>	</li>	
							<li><a href="manage_order_admin.php">Manage Orders</a></li>
							<li><a href="manage_user.php">Manage User</a></li>
							<li><a href="add_user.php">Login/Register</a></li>
							<li><a href="welcome.php">Logout Admin</a></li>
							<li><a href="welcome_user.php">Logout User</a></li>
						</ul>
						<?php
						} else
						{
						?>
						<ul>
							<li><a href="index.php" class="active">Home</a></li>
							<li><a href="view_category.php">Shop Now</a></li>
							<li><a href="admin_login.php">Admin Login</a></li>
							<li><a href="add_user.php">Login/Register</a></li>
							<li><a href="view_order_user.php">My Orders</a></li>
							<li><a href="welcome_user.php">Logout</a></li>
						</ul>
						<?php
						} ?>
					</nav>
				</div>
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="shoecart shoecart2 cart cart box_1">
						<form action="view_cart.php" method="post" class="last">
							<button class="top_shoe_cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- //cart details -->
		<!-- search -->
		<div class="search_w3ls_agileinfo">
			<div class="cd-main-header">
				<ul class="cd-header-buttons">
					<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
				</ul>
			</div>
			<div id="cd-search" class="cd-search">
				<form action="#" method="post">
					<input name="Search" type="search" placeholder="Click enter after typing...">
				</form>
			</div>
		</div>
		<!-- //search -->
		<div class="clearfix"></div>
		<!-- /banner_inner -->
