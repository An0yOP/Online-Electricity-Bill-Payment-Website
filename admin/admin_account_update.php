<?php

include '../Database/db.php';

$id=$_GET['updateid'];
$sql="select * from `admin` where sno=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$username=$row['username'];
$email=$row['email'];
$role=$row['role'];


if(isset($_POST ['submit'])){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $role=$_POST['role'];

    $sql=" update `admin` set sno=$id, name='$name', username='$username', email='$email', role='$role'  where sno=$id";

    $result = mysqli_query($con,$sql);

    if($result){
        header('location:admin_accounts.php');
        // echo " updated !!";
    }
    else{
        echo"die(mysqli_error($con))";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPDATE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  
    <div class="container my-5">
    <h2>Update Here:</h2>
    <hr>
        
    <form  method = "post">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your Name" name="name" value=<?php echo $name; ?>>
    </div>
    <div class="mb-3">
    <label>Username</label>
    <input type="text" class="form-control" placeholder="Enter your Username" name="username" value=<?php echo $username; ?>>
    </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter your Email" name="email" value=<?php echo $email; ?>>
    </div>
  <div class="mb-3">
    <label>Role</label>
    <input type="text" class="form-control" placeholder="Enter your Role" name="role" value=<?php echo $role; ?>>
    </div>
 
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
    </div>
    
  </body>
</html>





