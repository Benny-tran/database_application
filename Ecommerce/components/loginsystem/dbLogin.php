<?php 

try{
    //place code here that could potentially throw an exception
    $con = mysqli_connect('localhost', 'loginManager', '12345', 'assessment');

   //  echo 'connect success';
 }
 catch(Exception $e)
 {
   //We will catch ANY exception that the try block will throw
    echo 'connect failed';
 }
?>