<?php
session_start();
$success=false;
$error=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    require "../Database/db.php";
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];
    
    $phash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        if (empty($name) OR empty($username) OR empty($email) OR empty($password) OR empty($cpassword) OR empty($role)) {
            array_push($errors,"All fields are required");
        }
      //   if (!preg_match("/^[a-zA-Z-']*$/",$name)) {
      //     array_push($errors,"Only Letters and While Spaces allowed.");
      // }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors,"Email is not valid");
        }
        if(strlen($password)<8){
            array_push($errors,"Password must be at least 8 charaters long");
        }
        if($password!==$cpassword){
            array_push($errors,"Password does not match");
        }
        
        $sql = "SELECT * FROM `admin` WHERE username = '$username'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count>0)
        {
            array_push($errors,"Username already exists!");; 
        }
        if (count($errors)>0) {
            foreach($errors as $error){
               echo " <script> alert('$error') </script>";
            }
        }
        else{
            //we will insert the data into database
            $sql = "INSERT INTO `admin` (`name`,`username`,`email`,`password`,`role`,`status`) VALUES ('$name','$username','$email', '$phash','$role','pending')";
            $result = mysqli_query($con,$sql);
            if ($result) {
                
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }
            else {
                die("Something went wrong");
            }
        }
    }

   /* $sql="SELECT * FROM `admin` WHERE `username`='$username'";
    $result= mysqli_query($con,$sql);
    $row = mysqli_num_rows($result);
        if($row > 0){
            
            $showerror="Username already taken.";
        }
        else{
            // $exist= false;
            if(($password == $cpassword)){
                $sql = "INSERT INTO `admin` (`name`,`username`,`email`,`password`,`role`,`status`) VALUES ('$name','$username','$email', '$password','$role','pending')";
                $result = mysqli_query($con,$sql);
                /*if($result){
                $showalert= true;
                  
                }
            }
            else{
             $showerror=" Password do not match.";
         }*/
        # if($result){
          /*$success="<div class='alert alert-success' role='alert'>
          Your account request is now pending for approval. Please wait for confirmation. Thank you.
          </div>";*/
          #echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
      #}else{
          /*$error="<div class='alert alert-danger' role='alert'>
          Unknown error occurred!
        </div>";
        echo "<script>alert(' Unknown error occurred!')</script>";
      }
  }
    }
}*/
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Thunder God</title>
    <link rel="stylesheet" href="reg.css" />
    <style>
      body{
      background: rgb(238,174,202);
      background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
      }
    </style>
  </head>
  <body>
   
    
    <section class="container">
      <header>Admin Registration</header>
      <form action="add_admin.php" class="form" method="POST">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name" name="name" required />
        </div>
        <div class="input-box">
            <label>Username</label>
            <input type="text" placeholder="Enter Username" name="username" required />
          </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="email" placeholder="Enter email address" name="email" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Password</label>
            <input type="password" placeholder="Enter Password" name="password" required />
          </div>
          <div class="input-box">
            <label>Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="cpassword" required />
          </div>
        </div>
        
        <div class="input-box address">
          <label>Role</label>
            <div class="column">
            <div class="select-box">
              <select name="role">
                <option hidden>Role</option>
                <option> Add Admin</option>
                <option>Complain</option>
                <option>User</option>
                <option>Bill</option>
              </select>
            </div>
            </div>
          </div>
        <button type="submit" name="add">Submit</button>
        <br>
        <a href="../admin.php">back</a>
      </form>
    </section>
  </body>
</html>