<?php
require "../Database/db.php";
session_start();
$conid=$_SESSION['cid'];
if(!isset($_SESSION["cid"])){
    header("location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIKKCYiWgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIgKCYiuygmIhgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJDKCYi7SgmIlIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJzKCYi/SgmIqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIgooJiKmKCYi/ygmIuAoJiIOAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIh8oJiLPKCYi/ygmIv4oJiI/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIkEoJiLrKCYi/ygmIv8oJiKMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmInAoJiL8KCYi/ygmIv8oJiL/KCYiySgmIpwoJiJzKCYiKQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIhYoJiJyKCYinCgmIsIoJiL8KCYi/ygmIv8oJiL/KCYinygmIgkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJTKCYi/ygmIv8oJiL5KCYiaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIeKCYi7ygmIv8oJiLjKCYiNwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIDKCYixCgmIv8oJiK+KCYiFQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYigigmIv8oJiKJKCYiAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYiPigmIvAoJiJSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYiEigmIrooJiInAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIlooJiIMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//8AAP/3AAD/7wAA/88AAP8fAAD+PwAA/D8AAPgfAAD4DwAA/j8AAPx/AAD4/wAA8f8AAPf/AADv/wAA//8AAA==" rel="icon" type="image/x-icon" />
    <title>Thunder</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  
    <div class="container">
        <nav>
            <ul>
                <li><a href="" class="logo">
                    <img src="logo.png" alt="" width="100" height="90">
                    <span class="nav-item">Thunder God</span>
                </a></li>
                <li><a href="index.php" >
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                
                <li><a href="paid_table.php" >
                <i class=" fas fa-solid fa-money-check-dollar"></i>
                    <span class="nav-item">Paid Bills</span>
                </a></li>
                <li><a href="pending_table.php" >
                    <i class="fas fa-money-bill"></i>
                    <span class="nav-item">Pending Bills</span>
                </a></li>
                <li><a href="complaint.php" >
                    <i class="fas fa-table"></i>
                    <span class="nav-item">Complaints</span>
                </a></li>
               
                 <li><a href="logout.php" class="logout" >
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Logout</span>
                </a></li>

            </ul>
        </nav>
        <section class="main">
            <div class="main-top">
                <h2>Progresses</h2>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="main-skills">
                <div class="card">
                    <i class="fas fa-sack-dollar"></i>
                    <h3>Payed Bills</h3>
                    <p><?php $query="SELECT `sno` from `bills` WHERE `cid`='$conid' AND `status`='paid'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></p>
                    
                </div>
                <div class="card">
                    <i class="fab fa-dollar-sign"></i>
                    <h3>Pending Bills</h3>
                    <p><?php $query="SELECT `sno` from `bills` WHERE `cid`='$conid' AND `status`='pending'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></p>
                   
                </div>
                <div class="card">
                    <i class="fas fa-note-sticky"></i>
                    <h3>Pending Complaint</h3>
                    <p><?php $query="SELECT `id` from `complain` WHERE `conid`='$conid' AND `status`='pending'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></p>
                    
                </div>
                <div class="card">
                    <i class="fab fa-app-store-ios"></i>
                    <h3>Processed Complaint</h3>
                    <p><?php $query="SELECT `id` from `complain` WHERE  `conid`='$conid' AND `status`='approved'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></p>
                    
                </div>
            </div>
        </section>
    </div>
    
</body>
</html>



