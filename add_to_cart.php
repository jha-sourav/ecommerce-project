<?php session_start(); 
	$id   = 	$_REQUEST['x'];
	
		if(isset($_SESSION['cart']) && array_key_exists($id,$_SESSION['cart']) ){
			$_SESSION['cart'][$id] += 1 ;
			header('location:' . $_SERVER['HTTP_REFERER']);
		}
		else if(empty($_SESSION['cart'])){
			
			$_SESSION['cart'][$id]=1;
			header('location:' . $_SERVER['HTTP_REFERER']);
		}
		else{
			echo "<script>window.location.assign('view_cart.php?msg=One data already exists.')</script>";
		}
	
//print_r($_SESSION['cart']);
?>