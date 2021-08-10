<?php
// require "db.php";
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

$sql = 'SELECT * FROM bidReport';
$run_sql = mysqli_query($con,$sql);
if($run_sql){
    $fetch_info = mysqli_fetch_assoc($run_sql);
    $bidID = $fetch_info['bidID'];
    $productID = $fetch_info['productID'];
    $bidderID = $fetch_info['bidderID'];
    $bidDateTime = $fetch_info['bidDateTime'];
    $bidamount = $fetch_info['bidamount'];
}
?>