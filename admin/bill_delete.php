<?php

include '../Database/db.php';

if(isset($_GET['deleteid1'])){
    $id=$_GET['deleteid1'];

    $sql="delete from`bills` where sno= $id";
    $result= mysqli_query($con, $sql);

    if($result){
        header('location:bill_table.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>