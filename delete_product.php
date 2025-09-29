<?php
include("conn_database.php");
$query = "DELETE FROM `product` WHERE `id`='$_REQUEST[id]'";
$result = mysqli_query($conn,$query);
if($result>0)
{
    echo "<script>window.location.assign('manage_product.php?msg=Record Deleted')</script>";
}
else{
    echo "<script>window.location.assign('manage_product.php?msg=Try again')</script>";
}
?>