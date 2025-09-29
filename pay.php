<?php
include"header1.php";
session_start();
if(isset($_SESSION["user_email"]))
{
	$email = $_SESSION["user_email"];
}
else{
	echo "<script>window.location.assign('add_user.php?msg=Session Out!! Login First')</script>";
}
?>

<style>
	.contact-left input[type="date"] {
    width: 50%;
    margin: 0px;
    color: #5e345e;
    background: none;
    padding: 15px 10px;
    outline: none;
    border: 1px solid #5e345e;
    font-family: 'Lato', sans-serif;
}
</style>
<link href="date/jquery-ui.css" rel="stylesheet">
<script src="date/jquery-ui.js"></script>
    	<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>Pay</li>
				</ul>
			</div>
		</div>
</div>
</section>
<div class="contact"><div class="agileinfo_bottom_section">
		<div class="container">
		
			<div class="contact-top heading">
		
			</div>
			<div class="contact-bottom">
			<?php
				
				$e = $_SESSION['user_email'];
include"conn_database.php";
$a = ram();
$oid = checkorder($a);
function ram(){
	 $a=1;
	for ($i = 0; $i<6; $i++) 
	{
		$a .= mt_rand(0,9);
	}
//echo $a;
	return $a;
}
function checkorder($a){
	include"conn_database.php";
	$q1="select * from `orders` where id=$a";
	$k1=mysqli_query($conn,$q1);
	if($r = mysqli_fetch_array($k1)){
		$b = $ram();
		checkorder($b);
	}
	else{
		return $a;
	}
}				$pid = $_REQUEST['pid'];
				$amount = $_REQUEST['amount'];
		
				$email = $_REQUEST['email'];
                $p_name = $_REQUEST['product_name'];
                $quantity = $_REQUEST['quantity'];
                $cat = $_REQUEST['category'];
				$date=date('d-m-Y');
		
include("conn_database.php");				
				$services=0;$total=0;
				if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
				foreach($_SESSION['cart'] as $id=>$quantity){
					$services = $services. ",".$id;
					
				$q="select * from product where `id`='$id'";
				$result=mysqli_query($conn,$q);
				if($row=mysqli_fetch_array($result))
				{
					$total += ($row['cost']*$quantity);
				}
				
				}
				}
				
						include "conn_database.php";
						$qry="INSERT INTO `orders`(`order_id`,`category`,`product`, `user_email`, `order_date`, `amount`,`payment_mode`,`order_status`,`quantity`) VALUES ('$a','$cat','$p_name','$_SESSION[user_email]','$date','$amount','Cash on Delivery','pending','$quantity')";
						$k = mysqli_query($conn,$qry);	
						if($k>0){
							$qry1 = "select * from `orders` where user_email='$_SESSION[user_email]'";
    						$result = mysqli_query($conn,$qry1);
                            
							while($row = mysqli_fetch_array($result))
							{
                                // print_r($row);
								$o = $row[1];
								$pid = $row['product'];
							}
						}
					
					else{
						//header("location:index.php");
						echo mysqli_error($obj);
					}

				?>
				<div class="container">
					<div class="row">
						<div class="col-md-12 mt-5">
							<div id="a">
							  <h3>  Thanks For Ordering The Product </h3><br/><br/>

							</h1>
							<h3>Your Order is Under Processing...
								<?php echo "Order Id is <a href='orders.php?x=$o'>$o </a> It is Accepted Wait Till Approved"; ?>
							<br/><br/>	<?php echo "Be Ready the Payment of Rs. $total"; ?>
								
							</h3><br/>
							</div>
						</div>
					</div>
				</div>
            
					
			</div>
		</div>
	</div>
	</div>
	</div>
	<?php
		
				include_once"footer.php";
				?>
				
	