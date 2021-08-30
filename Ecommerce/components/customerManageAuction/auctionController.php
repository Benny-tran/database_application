<?php
session_start();
include('dbAuction.php');


if (isset($_POST['createProduct'])) {
    $customerID = $_POST['customerID'];
    $check_customerID = "SELECT * FROM CUSTOMER WHERE citizenID = '$customerID'";

    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $startingPrice = $_POST['startingPrice'];
    $my_image = $_FILES['my_image'];
    $closeTime = $_POST['closeTime'];
    $field_values_array = $_POST['field_name'];
    
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error === 0){
        if($img_size > 1250000){
            $em = "Sorry, your file is too large.";
            header("Location: index.php?error=$em");
        }else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $res_customerID = mysqli_query($con, $check_customerID);
                if(mysqli_num_rows($res_customerID) > 0){
                    $fetch = mysqli_fetch_assoc($res_customerID);
                    $status = 'active';
                    //Insert into Database
                    $sql = "INSERT INTO AUCTIONPRODUCT (customerID, productName, descriptionProduct, startingPrice, productImageURL, status, closeTime) 
                            VALUES ('$customerID','$productName','$description','$startingPrice','$new_img_name','$status','$closeTime')";
                    $sql_run = mysqli_query($con, $sql);
                    if($sql_run){
                        $_SESSION['status'] = "Data Inserted Successfully";
                        header("Location: auction.php?insertSuccessfully");
                    }else{
                        $_SESSION['status'] = "CitizenID not exist";
                    }
                }else{
                    $_SESSION['status'] = "Data Not Inserted </br>
                                        CitizenID is not exist";
                    header("Location: auction.php?insertFailed");
                }
            }else {
                $em = "You can't upload files of this type";
                header("Location: auction.php?error=$em");
            }
        }
    }else{
        $em = "unknown error occurred";
        header("Location: auction.php?error=$em");
        
    }

}else {
    header("Location: auction.php");
}

// DELETE DATA
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql_delete = "DELETE FROM auctionProduct where productID = $id";
    $result = mysqli_query($con,$sql_delete);
    if(mysqli_affected_rows($result)>0){
      header('auction.php?result=success');
      } else {
         header('auction.php?result=fail');
      }
    }
else {
    header("Location: auction.php");
}
?>

