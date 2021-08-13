<!-- NO NEED THIS FILE -->

<?php
// require "db.php";

// $servername = "localhost";
// $database = "assessment";
// $username = "admin";
// $password = "admin123";

// // Create connection

// $conn = mysqli_connect($servername, $username, $password, $database);

// // Check connection

// if ($conn->connect_error) {
// die("Connection failed: " . $conn->connect_error);
// }

// echo 'Connected successfully';

// mysqli_close($conn);


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