<?php

include '../Database/db.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from`admin` where sno= $id";
    $result= mysqli_query($con, $sql);

    if($result){
        header('location:admin_accounts.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>