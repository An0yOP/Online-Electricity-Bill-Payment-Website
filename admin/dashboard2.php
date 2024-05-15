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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="homepage.css">

	<title>Thunder God</title>
	
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
        <i class='bx bxs-bolt'></i>
			<span class="text">Thunder God</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="admin_accounts.php">
                <i class='bx bxs-user'></i>
					<span class="text">Admin Accounts</span>
				</a>
			</li>
			<li>
				<a href="user.php">
                <i class='bx bxs-user-account'></i>
					<span class="text">User Accounts</span>
				</a>
			</li>
			<li>
				<a href="user_bill_table.php">
                <i class='bx bxs-copy-alt'></i>
					<span class="text">Generate Bill</span>
				</a>
			</li>
			<li>
				<a href="bill_table.php">
                <i class='bx bx-table'></i>
					<span class="text">Bill Table</span>
				</a>
			</li>
            <li>
				<a href="complain_approve.php">
                <i class='bx bx-food-menu'></i>
					<span class="text">Complain</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<!-- <a href="#" class="nav-link">Categories</a> -->
			
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../index.php">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
                <i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php $query="SELECT `sno` from `users`";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></h3>
						<p>Users</p>
					</span>
				</li>
				<li>
                <i class='bx bx-rupee'></i>
					<span class="text">
						<h3><?php $query="SELECT `sno` from `bills` WHERE  `status`='paid'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></h3>
						<p>Paid Bills</p>
					</span>
				</li>
				<li>
                <i class='bx bx-food-menu'></i>
					<span class="text">
						<h3><?php $query="SELECT `id` from `complain` WHERE  `status`='pending'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></h3>
						<p>Complaints</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Admin Accounts</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Role</th>
								<th>Status</th>
							</tr>
						</thead>
                        <?php

                            $sql ="select * from `admin`";
                            $result = mysqli_query($con,$sql);
                            if($result){
                            while($row= mysqli_fetch_assoc($result)){
                            $id= $row['sno'];
                            $name= $row['name'];
                            $username= $row['username'];
                            $email= $row['email'];
                            $role= $row['role'];
                             $status= $row['status'];
                             ?>

						<tbody>
							<tr>
								
                                <td><p><?php echo $name; ?></p></td>
								<td><p><?php echo $username; ?></p></td>
								<td><p><?php echo $email; ?></p></td>
								<td><p><?php echo $role; ?></p></td>
								<td><p><span class="status completed"><?php echo $status; ?></span></p></td>
								
							</tr>
							
								
						
						</tbody>
                        <?php
                            }
                        }
                        ?>
					</table>
				</div>
				
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="dashboard.js"></script>
</body>
</html>