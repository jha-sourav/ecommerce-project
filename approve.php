<?php
if(isset($_GET["order_id"]))
{
    include("conn_database.php");
    // echo $_GET["order_id"];
    $query2 = "UPDATE `orders` set `order_status`= 'Approved' where `order_id`='".$_GET["order_id"]."'";
    $sql2 = mysqli_query($conn,$query2);
    if($sql2>0)
    {
        echo "<script>window.location.assign('manage_order_admin.php')</script>";
    }else{
        echo mysqli_error($conn);
    }
    
}
?>