<?php

include('db.php');

if (isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $startingPrice = $_POST['startingPrice'];
    $my_image = $_FILES['my_image'];
    $closeTime = $_POST['closeTime'];
    
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error === 0){
        if($img_size > 125000){
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

                //Insert into Database
                $sql = "INSERT INTO images (productName, descriptionProduct, startingPrice, image_url, closeTime) 
                        VALUES ('$productName','$description','$startingPrice','$new_img_name','$closeTime')";
                mysqli_query($con, $sql);
                header("Location: index.php");
            }else {
                $em = "You can't upload files of this type";
                header("Location: index.php?error=$em");
            }
        }
    }else{
        $em = "unknown error occurred";
        header("Location: index.php?error=$em");
        
    }

}else {
    header("Location: index.php");
}

// if (isset($_POST['submit']) && isset($_FILES['my_image'])){
//     echo "<pre>";
//     print_r($_FILES['my_image']);
//     echo "</pre>";

//     $img_name = $_FILES['my_image']['name'];
//     $img_size = $_FILES['my_image']['size'];
//     $tmp_image = $_FILES['my_image']['tmp_name'];
//     $error = $_FILES['my_image']['error'];

// } else {
//     header("Location: index.php");
// }