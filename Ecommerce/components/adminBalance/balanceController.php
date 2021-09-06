<?php 
session_start();
include ('db.php');

// UPDATE DATA
if(isset($_POST['update'])){
$id=$_POST['update_id'];

$balance=$_POST['update_balance'];
$query="UPDATE CUSTOMER SET accountBalance='$balance' WHERE citizenID='$id'  ";
$query_run=mysqli_query($con,$query);


if($query_run){
    $_SESSION['balance'] = "Data Updated Successfully";
    header('location:balance.php?=success');
}
else{
    $_SESSION['balance'] = "Data Updated Failed";
    header('location:balance.php?=success');
}

}
?>