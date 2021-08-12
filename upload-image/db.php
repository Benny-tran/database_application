<?php 

try{
    //place code here that could potentially throw an exception
    $con = mysqli_connect('localhost', 'root', '12345', 'test_db');
    
    // echo 'connect successful';
 }
 catch(Exception $e)
 {
   //We will catch ANY exception that the try block will throw
    echo 'connect failed';
 }
?>