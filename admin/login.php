<?php
require('../Database/db.php');
session_start();
/*$sql="SELECT * FROM `admin`";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$status = $row['status'];*/
$error=false;
$error1=false;

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    

    $query="SELECT * FROM `admin` WHERE `username`='$username' #AND `password`='$password'";
    $result=mysqli_query($con,$query);
    $count=mysqli_num_rows($result);

    if($count == 1){
        while($row=mysqli_fetch_assoc($result)){
          if(password_verify($password , $row['password'])){
        
        $_SESSION['username']=$row['username'];
        $_SESSION['password']=$row['password'];
        $_SESSION['ROLE']=$row['role'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['login'] = true;

        if($row['role']==1 && $row['status']=="approved"){
            header('location:dashboard2.php');
            die();
        }
        elseif($row['role']=="Add Admin" && $row['status']=="approved"){
            header('location:admin_accounts.php');
            die();
        }
       elseif($row['role']=="User" && $row['status']=="approved"){
            header('location:user.php');
            die();
        }
        elseif($row['role']=="Complain" && $row['status']=="approved"){
            header('location:complain_approve.php');
            die();
        }
        elseif($row['role']=="Bill" && $row['status']=="approved"){
            header('location:bill_table.php');
            die();
        }
        else{
        $error="<script>alert('Your Request is not Approved by Admin.')</script>";
            
        }
      }
      else{
        echo "<script>alert('Invalid  Password.')</script>";
    }
  
   }
 }
  else{
    $error1="<script>alert('Invalid Username')</script>";
  }
     
}
  

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">-->
</head>
<body>
<div class="container">
    <?php
        echo $error;
        echo $error1;
    ?>
        <div class="myform">
            <form method="POST">
                <h2>ADMIN LOGIN</h2>
                <input type="text" placeholder="Username" name='username'>
                <input type="password" placeholder="Password" name='password'>
                <button type="submit" name='login'>LOGIN</button>
                <br>
                <small><a href="../admin.php">Back</a></small>
            </form>
        </div>
        <div class="image">
            <img src="./images/img1.jpg">
        </div>
    </div>

    <!--<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Thunder God</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin.php">back</a>
        </li>
       
        
      </ul>
    </div>
  </div>
</nav>

<div class="container my-5">
      <h3 class="text-center">ADMIN LOGIN</h3>
  
    <div class="row d-flex justify-content-center">
    <div class="col-md-6">
    <form method="POST">
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username">
    
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary" name="login">Login</button>
  </div>
  </div>
  </div>
  </div>-->
</form>
</body>
</html>