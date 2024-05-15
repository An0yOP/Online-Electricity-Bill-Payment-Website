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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="welcome.css">

	<title>Admin Panel</title>
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
				<a href="pending_table.php">
                <i class='bx bx-rupee'></i>
					<span class="text">Pending Bills</span>
				</a>
			</li>
			<li>
				<a href="paid_table.php">
                <i class='bx bx-credit-card'></i>
					<span class="text">Paid Bills</span>
				</a>
			</li>
			<li>
				<a href="complaint.php">
                <i class='bx bxs-copy-alt'></i>
					<span class="text">Complaint</span>
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
			<a href="#" class="nav-link"></a>
			
			<!--<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>-->
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1><?php echo $_SESSION['cname']; ?></h1>
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
                <i class='bx bx-rupee'></i>
					<span class="text">
						<h3><?php $query="SELECT `sno` from `bills` WHERE `cid`='$conid' AND `status`='pending'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                    ?></h3>
						<p>Pending Bills</p>
					</span>
				</li>
				<li>
                <i class='bx bx-credit-card'></i>
					<span class="text">
						<h3><?php $query="SELECT `sno` from `bills` WHERE `cid`='$conid' AND `status`='paid'";
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
						<h3><?php $query="SELECT `id` from `complain` WHERE `conid`='$conid' AND `status`='pending'";
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
						<h3>Paid Bills</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Consumer ID</th>
                                <th>Bill ID</th>
								<th>Unit</th>
								<th>Amount</th>
								<th>Status</th>
							</tr>
						</thead>
                        <?php

                            
                            $cid=$_SESSION['cid'];
                            $name=NULL;
                            $amt=NULL;
                            $sql="select * from `bills` where `cid`='$cid' and `status`='paid'";
                            $result=mysqli_query($con,$sql);
                            $count=mysqli_num_rows($result);
                            if($count>0){
                            $no=1;
                            while($fetch=mysqli_fetch_assoc($result)){
                           
                            $bid=$fetch['bid'];
                            $name=$fetch['cname'];
                            $cid=$fetch['cid'];
                            $unit=$fetch['unit'];
                            $amt=$fetch['amount'];
                            $status=$fetch['status'];

                             ?>

						<tbody>
							<tr>
								
                                <td><p><?php echo $name; ?></p></td>
                                <td><p><?php echo $cid; ?></p></td>
								<td><p><?php echo $bid; ?></p></td>
								<td><p><?php echo $unit; ?></p></td>
								<td><p><?php echo $amt; ?></p></td>
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