<?php 

$dbServername="localhost";
$dbUsername="customerManager";
$dbPassword="12345";
$dbName="assessment";

$con=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

if(!$con){
    echo 'connect failed'.mysqli_connect_error();
}
else{
    // echo 'connect successful';

}