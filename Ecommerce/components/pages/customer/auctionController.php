<!-- NO NEED THIS FILE -->

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
    $closeTime = $fetch_info['closeTime'];
}

// $result = mysqli_query($connection,"SELECT * FROM auctionProducts");
// $all_property = array();  //declare an array for saving property

// //showing property
// echo '<table class="data-table">
//         <tr class="data-heading">';  //initialize table tag
// while ($property = mysqli_fetch_field($result)) {
//     echo '<td>' . $property->name . '</td>';  //get field name for header
//     array_push($all_property, $property->name);  //save those to array
// }
// echo '</tr>'; //end tr tag

// //showing all data
// while ($row = mysqli_fetch_array($result)) {
//     echo "<tr>";
//     foreach ($all_property as $item) {
//         echo '<td>' . $row[$item] . '</td>'; //get items using property value
//     }
//     echo '</tr>';
// }
// echo "</table>";

// ?>

<?php require '../layout/header.php'?>


<?php require 'footer.php'?>