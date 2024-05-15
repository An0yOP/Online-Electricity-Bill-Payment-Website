<?php
include('../Database/db.php');
session_start();
if(!isset($_SESSION['login']) && !isset($_SESSION['status'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIKKCYiWgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIgKCYiuygmIhgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJDKCYi7SgmIlIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJzKCYi/SgmIqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIgooJiKmKCYi/ygmIuAoJiIOAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIh8oJiLPKCYi/ygmIv4oJiI/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIkEoJiLrKCYi/ygmIv8oJiKMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmInAoJiL8KCYi/ygmIv8oJiL/KCYiySgmIpwoJiJzKCYiKQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIhYoJiJyKCYinCgmIsIoJiL8KCYi/ygmIv8oJiL/KCYinygmIgkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJTKCYi/ygmIv8oJiL5KCYiaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIeKCYi7ygmIv8oJiLjKCYiNwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIDKCYixCgmIv8oJiK+KCYiFQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYigigmIv8oJiKJKCYiAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYiPigmIvAoJiJSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYiEigmIrooJiInAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIlooJiIMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//8AAP/3AAD/7wAA/88AAP8fAAD+PwAA/D8AAPgfAAD4DwAA/j8AAPx/AAD4/wAA8f8AAPf/AADv/wAA//8AAA==" rel="icon" type="image/x-icon" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php if($_SESSION['ROLE']==1){?>
    <div class="container">
        <nav>
            <ul>
                <li><a href="" class="logo">
                    <img src="./images/logo.png" alt="" width="100" height="90">
                    <span class="nav-item">THUNDER GOD</span>
                </a></li>
                <li><a href="index.php" >
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="user_bill_table.php" >
                <i class="fas fa-solid fa-money-bill-transfer"></i>
                    <span class="nav-item">Generate Bills</span>
                </a></li>
                <li><a href="bill_table.php" >
                <i class="fas fa-solid fa-table"></i>
                    <span class="nav-item">Bills Table</span>
                </a></li>
                <li><a href="complain_approve.php" >
                <i class="fas fa-solid fa-envelope"></i>
                    <span class="nav-item">Complaints</span>
                </a></li>
                <li><a href="admin_accounts.php" >
                <i class="fas fa-solid fa-user"></i>
                    <span class="nav-item">Admin Accounts</span>
                </a></li>
                <li><a href="user.php" >
                <i class="fas fa-regular fa-users"></i>
                    <span class="nav-item">User Accounts</span>
                </a></li>
                <li><a href="faq.php" >
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Faq</span>
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
                    <h3>Paid Bills</h3>
                    <p><?php $query="SELECT `sno` from `bills` WHERE  `status`='paid'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></p>
                    
                </div>
                <div class="card">
                    <i class="fab fa-dollar-sign"></i>
                    <h3>Users</h3>
                    <p><?php $query="SELECT `sno` from `users`";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></p>
                   
                </div>
                <div class="card">
                    <i class="fas fa-note-sticky"></i>
                    <h3>Pending Complaints</h3>
                    <p><?php $query="SELECT `id` from `complain` WHERE  `status`='pending'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></p>
                    
                </div>
                <div class="card">
                    <i class="fab fa-app-store-ios"></i>
                    <h3>Admins</h3>
                    <p><?php $query="SELECT `sno` from `admin` WHERE `status`='approved'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></p>
                    
                </div>
            </div>
        </section>
    </div>
    <?php } ?>
</body>
</html>