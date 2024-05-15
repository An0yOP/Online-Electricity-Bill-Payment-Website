<?php
require "../Database/db.php";
#$login=false;
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thunder</title>
    <style>
        *{
            font-family: 'Roboto Slab', serif;
        }
        body{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(70,70,153,1) 0%, rgba(100,182,246,1) 55%);

        }
       
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Thunder God</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <h1>Login here</h1>
    <?php
    if(isset($_REQUEST["login"])){
            
      $cid = $_REQUEST["cid"];
      $password = $_REQUEST["password"];
      #require_once('../Database/db.php');
      $sql = "SELECT * FROM users WHERE `cid` = '$cid'";
      $result = mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      if($num == 1){
       while($user = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      #$db_name = $user['cname'];
      
          if(password_verify($password , $user["password"])){
              
              $_SESSION["cid"] = $user['cid'];
              $_SESSION["cname"]=$user['cname'];
             
              $_SESSION["user"] = "yes";
              header("location: welcome.php");
              die();
          } 
          else{
            echo "<div class='alert alert-danger' role='alert'>
            Password does not match.
          </div>";
          }
        }
         
      }
      else{
        echo "<div class='alert alert-danger' role='alert'>
        Consumer ID does not match.
      </div>";
    }
      
  }
 

    
    ?>
    <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Consumer Id</label>
    <input type="text" class="form-control" name="cid" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
 
  <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>
<div class="mb-4"><p>Not  regstered  yet : <a href="registration.php">Register Here</a> </p></div>
</div>

  </body>
</html>