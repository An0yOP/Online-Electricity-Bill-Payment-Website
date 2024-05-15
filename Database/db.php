<?php
$host='localhost';
$username='root';
$password='';
$database='ebill';

$con = mysqli_connect($host,$username,$password,$database);
if(!$con){
    die("Error".mysqli_connect_error()); 
}


?>