<?php
session_start();
include('db.php');

// DELETE DATA
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql_delete = "DELETE FROM TRANSACTION where orderID = $id";
    $result = mysqli_query($con,$sql_delete);
    if(mysqli_affected_rows($result)>0){
    $_SESSION['status'] = "Data Deleted Fail";
      header('auction.php?result=fail');
      } else {
        $_SESSION['status'] = "Data Deleted Successfully";
        header('auction.php?result=success');
      }
    }
else {
    header("Location: transaction.php");
}
?>