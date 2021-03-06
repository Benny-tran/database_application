<?php 
session_start();
require "dbLogin.php";
$email = "";
$name = "";
$username = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $citizenID = mysqli_real_escape_string($con, $_POST['citizenID']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM CUSTOMER WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "not verified";
        // $insert_data = "INSERT INTO CUSTOMER (citizenID, name, email, phone, password, code, status)
        //                 values('$citizenID', '$name', '$email', '$phone', '$encpass', '$code', '$status')";
        // Use Procedure for Signup Customer
        $insert_data = "CALL signupCustomer('$citizenID','$name','$email','$phone','$encpass','$code','$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: auctionsystemrmit@gmail.com \r\n";
            $sender .= "MINE-Version: 1.0" . "\r\n";
            $sender .= "Content-Type: text/html; charset=UTF-8" . "\r\n"; 
            if(mail($email, $phone, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            echo $errors;
            $errors['db-error'] = "This information may exist in the system. Please try again!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM CUSTOMER WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $phone = $fetch_data['phone'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE CUSTOMER SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                header('location: ../customerMarketplace/market.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        // $check_email = "SELECT * FROM CUSTOMER WHERE email = '$email' and password = '$password'";
        // Use Procedure for Login Customer
        $check_email = "CALL loginCustomer('$email', '$phone', '$password')" ;
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['phone'] = $phone;
                  $_SESSION['password'] = $password;
                    header('location: ../customerMarketplace/market.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if admin login button
    if(isset($_POST['adminLogin'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        // $check_admin = "SELECT * fROM `ADMIN` WHERE username = '$username' and password = '$password'";
        $check_admin = "CALL loginAdmin('$username', '$password')";
        $res = mysqli_query($con, $check_admin);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $_SESSION['username'] = $username;
            $fetch_pass = $fetch['password'];
            header('location: ../adminMarketplace/market.php');
            }else {
                $errors['username'] = "Incorrect username or password";
            } 
        }
?>