<?php
// session_start();
// require "db.php";
// $email = "";
// $name = "";
// $username = "";
// $errors = array();
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

// we using MySQLi Procedural

$sql = 'SELECT * FROM auctionProduct';
// $statement = $connection->prepare($sql);
// $statement->execute();
// $people = $statement->fetchAll(PDO::FETCH_OBJ);
$run_sql = mysqli_query($con,$sql);
if($run_sql){
    $fetch_info = mysqli_fetch_assoc($run_sql);
    $productID = $fetch_info['productID'];
    $customerID = $fetch_info['customerID'];
    $productName = $fetch_info['productName'];
    $description = $fetch_info['description'];
    $startingPrice = $fetch_info['startingPrice'];
    $maximumPrice = $fetch_info['maximumPrice'];
    $productImageURL = $fetch_info['productImageURL'];
    $status = $fetch_info['status'];
    $createTime = $fetch_info['createTime'];
    // createTime
    $closeTime = $fetch_info['closeTime'];

}

?>

<?php require '../layout/header.php'?>


<?php require 'footer.php'?>