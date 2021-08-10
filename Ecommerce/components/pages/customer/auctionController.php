<?php
session_start();
require "db.php";
$email = "";
$name = "";
$username = "";
$errors = array();
// we using MySQLi Procedural
$sql = 'SELECT * FROM auctionProduct';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'layout/header.php'?>


<?php require 'footer.php'?>