<?php 

try{
    //place code here that could potentially throw an exception
    $con = mysqli_connect('localhost', 'adminManager', '12345', 'assessment');

   //  echo 'connect successful';
 }
 catch(Exception $e)
 {
   //We will catch ANY exception that the try block will throw
    echo 'connect failed';
 }
?>