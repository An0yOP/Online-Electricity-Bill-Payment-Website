<?php
session_start();
include('../Database/db.php');

if(!empty($_POST['bid']) && isset($_POST['payment_id'])){
    $payment_id=$_POST['payment_id'];
    $bid=$_POST['bid'];
    $_SESSION['bid']=$bid;
    mysqli_query($con,"UPDATE `bills` SET `status` = 'paid', `payment_id`='$payment_id' WHERE `bid`='$bid'");
}
   


?>