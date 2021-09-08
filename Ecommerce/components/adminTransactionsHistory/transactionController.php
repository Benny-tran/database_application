<?php
session_start();
include('dbAdmin.php');

// DELETE DATA
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql_delete = "DELETE FROM TRANSACTION where orderID = $id";
    $result = mysqli_query($con,$sql_delete);
    if(mysqli_affected_rows($result)>0){
    $_SESSION['status'] = "Data Deleted Fail";
      header('Location: transaction.php?result=fail');
      } else {
        $_SESSION['status'] = "Data Deleted Successfully";
        header('Location: transaction.php?result=success');
      }
    }
else {
    header("Location: transaction.php");
}
?>