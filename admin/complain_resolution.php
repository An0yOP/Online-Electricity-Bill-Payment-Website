<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

    if(isset($_POST['resolution'])){
       $mail = new PHPMailer(true);

        try {
            //Server settings
           $mail->isSMTP();                       //Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth   = true;  //Enable SMTP authentication
            $mail->Username   = 'Example@xyz.com';  //SMTP username
            $mail->Password   = 'password'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port       = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('anoymaity1@gmail.com', 'E-Bill');
            $mail->addAddress($_POST['email']);     //Add a recipient
            
        
            //Content
            $mail->isHTML(true);//Set email format to HTML
            $mail->Subject = 'Solution';
            $mail->Body    = $_POST['reso'];
         
        
            $mail->send();
            echo "<script> alert('Message has been sent') </script>";
        } catch (Exception $e) {
            echo "<script> alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}') </script>";
        }
  }
    
?>

<?php
include '../Database/db.php';
$success=false;
$id=$_GET['complainid'];
$sql="select * from `complain` where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$complain=$row['complaint'];



if(isset($_POST ['resolution'])){
    $name=$_POST['name'];
    
    $email=$_POST['email'];
    $complain=$_POST['complain'];
    $resolution=$_POST['reso'];

    $sql="INSERT INTO `resolution`(`name`, `email`, `complaint`, `resolution`) VALUES ('$name','$email','$complain','$resolution')";

    $result = mysqli_query($con,$sql);

    if($result){
        
         $success= "<div class='alert alert-success' role='alert'>
         Mail Sent Successfully!
       </div>";
    }
    else{
        echo"die(mysqli_error($con))";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
  <title>Thunder God</title>
  <style>
        *{
            font-family: 'Roboto Slab', serif;
        }
        body{
            /* background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(70,70,153,1) 0%, rgba(100,182,246,1) 55%); */
            background: rgb(238,174,202);
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
        }
       
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-primary" >
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Thunder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="complain_approve.php">Back</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
    <div class="text-center">
    <h2>Complaint solution</h2>
    </div>
    <?php
  echo "$success";
?>
    <div class="row d-flex justify-content-center">
    <div class="col-md-6">
<form class="row g-3" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"readonly>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control"  name="email" value="<?php echo $email; ?>"readonly>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">complaint</label>
    <input type="text" class="form-control" name="complain" value="<?php echo $complain; ?>" readonly>
    
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" name="reso" style="height: 100px"></textarea>
  <label for="floatingTextarea2"> Enter your solution</label>
</div>
 <div class="text-center">
  <button type="submit" class="btn btn-primary" name="resolution">Submit</button>
  </div>
</form>
  </div>
  </div>
  </div>
<br>
<footer class="bg-light text-dark pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">About Us</h5>
                    <hr class="mb-4">
                    <p>The website at the end of its constructon wll act as a consumer oriented service for users for easy payment of their respectve <strong>Electricity Bill</strong> as well as interect with their providers in case of any queries or grivances</p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">Let Us Help</h5>
                    <hr class="mb-4">
                    <p>
                        <a href="#" class="text-dark" style="text-decoration:none">About Us</a>
                    </p>
                    <p>
                    <a href="#" class="text-dark" style="text-decoration:none">Terms Of Use</a>
                    </p>
                    <p>
                    <a href="#" class="text-dark" style="text-decoration:none">Help</a>
                    </p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">Find Us</h5>
                    <hr class="mb-4">
                    <p>
                        <li class="fas fa-home mr-3"></li> Thunder House <br> Chowringhee Square <br> Kolkata - 700001
                    </p>
                    <p>
                    <li class="fas fa-envelope mr-3"></li> Thuder@rpsg.in
                    </p>
                    <p>
                    <li class="fas fa-phone mr-3"></li> 033-22256040-49
                    </p>
                </div>
                <hr  class="mb-4">
                <div class="row d-flex justify-content-center">
                    <div>
                        <p>
                            Copyright &copy;2020 All Rights Reserved By :
                            <a href="#" style="text-decoration:none;">
                                <strong class="text-info">The Providers</strong>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="text-center">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-dark"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-dark"><i class="fab fa-google-plus"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-dark"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</footer>
</body>
</html>
