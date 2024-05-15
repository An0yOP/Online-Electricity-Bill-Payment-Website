<?php

include('../Database/db.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

use Twilio\Rest\Client;
?>

<?php
        $last_id=null;
        $query = "select * from bills order by sno desc limit 1";
        $result= mysqli_query($con,$query);
        $count= mysqli_num_rows($result);
        if($count>0){
        $row = mysqli_fetch_array($result);
        $last_id = $row['bid'];
        }
        if ($last_id == "")
        {
            $bid = "BI01";
        }
        else
        {
            $bid= substr($last_id,-2);
             $bid = intval($bid);
             if($bid<10) $bid = "BI0" . ($bid + 1);
              
             else
             $bid = "BI" . ($bid + 1);
        }
    ?>

<?php
include('../Database/db.php');

$id=$_GET['billid'];
$sql="select * from `users` where sno='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$cid=$row['cid'];
$cname=$row['cname'];
$email=$row['email'];
$mobile=$row['phno'];


?>

<?php
$success=false;
if(isset($_POST['btn'])){
   //324  1-100 5 AND THEN 101-300 7 AND >300 10//
   $units= $_POST['units'];
   $total=0;
   #echo "<hr><h4>BILL DETAILS</h4><hr>";
   if($units>300)
   {
    $u1= 100 * 5;
    #echo "100 * 5=$u1<br>";

    $u2=  200 * 7;
   # echo "200 * 7=$u2<br>";

    $rem= $units - 300;
    $u3= $rem * 10;
    #echo "$rem * 10=$u3<br>";

    $total= $u1+$u2+$u3;
    #echo "<hr> Total bill= $total<hr>";
   }
   else if($units>100 && $units<=300){
    //suppose unit is 124//
    $u1= 100 * 5;
    #echo "100 * 5=$u1<br>";

    
    $rem= $units - 100;
    $u2= $rem * 7;
    #echo "$rem * 7 =$u2<br>";

    $total= $u1+$u2;
    #echo "<hr> Total bill= $total<hr>";

   }
   else{
    $total= $units * 5;
    #echo "$units * 5 = $total<br>";

    #echo "<hr> Total bill= $total<hr>";

   }
   
    $cid=$_POST['customer'];
    $units = $_POST['units'];
    $cname=$_POST['cname'];
    $email=$_POST['email'];
    $mobile=$_POST['phno'];
    $bdate=$_POST['bdate'];
    $ddate=$_POST['ddate'];
   # $total=$_POST['total'];
    
    if (!empty($units)) {
      
        $result_str = 'Total amount of ' . $units . ' = ' . $total;
    }
    $sql="INSERT INTO `bills` (`sno`,`bid`,`cid`,`cname`,`unit`,`amount`, `bdate`, `ddate`,`status`) VALUES ('','$bid','$cid','$cname','$units','$total','$bdate','$ddate','pending')";
    $result=mysqli_query($con,$sql);
    if($result){
    //    echo"data inserted";
          $success="<div class='alert alert-success' role='alert'>
          Bill Generated Successfully!
        </div>";
     }
     else{
        die(mysqli_error($con));
      }
    }

# Email Code
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

    if(isset($_REQUEST['btn'])){
        $cname=$_REQUEST['cname'];
        $ddate=$_POST['ddate'];
        $email=$_REQUEST['email'];
        $mobile=$_REQUEST['phno'];

      $mail = new PHPMailer(true);

        try {
            //Server settings
           $mail->isSMTP();                       //Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth   = true;  //Enable SMTP authentication
            $mail->Username   = 'Example@XYZ.com';  //SMTP username
            $mail->Password   = 'password'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port       = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('Example@XYZ.com', 'Thunder God');
            $mail->addAddress($email);     //Add a recipient
            
        
            //Content
            $mail->isHTML(true);//Set email format to HTML
            $mail->Subject = 'New Bill From Thunder God';
            $mail->Body    = $cname.' Total bill is- '.$total.' and Due Date is- '.$ddate ;
         
        
            #$mail->send();
            #echo "<script> alert('Message has been sent') </script>";
        } catch (Exception $e) {
            echo "<script> alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}') </script>";
        }
  

  #Message Code
 
  
  // Find your Account SID and Auth Token at twilio.com/console
  // and set the environment variables. See http://twil.io/secure
  //  $sid = '';
  //  $token = '';
  
  //  $twilio = new Client($sid, $token);
  
  //  $message = $twilio->messages
  //                    ->create("+910000000000", // to
  //                             [
  //                                 "body" =>$cname.' Total bill is- '.$total.' and Due Date is- '.$ddate ,
  //                                 "from" => "+12707517165"
  //                             ]
  //                    );
  
 # print($message->sid);
  #echo"Messege sent successfully";
// if($message->sid && $mail->send()){
if($mail->send()){
  echo "<script>alert('Message sent successFully!')</script>";
}
else{
  echo "<script>alert('message not sent!')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thunder God</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Roboto Slab', serif;
        }
        body{
          background: rgb(238,174,202);
          background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);

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
          <a class="nav-link" href="bill_table.php">Bills</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_bill_table.php">Back</a>
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
    <h2>BILL CALCULATION</h2>
    </div>
    <?php
        echo "$success";
    ?>
    <div class="row d-flex justify-content-center">
    <form class="row g-3" method="POST">
  <div class="col-md-6">
    <label  class="form-label">Bill ID</label>
    <input type="text" class="form-control" name="bid" value="<?php echo $bid; ?>" readonly>
  </div>
  <div class="col-md-6">
    <label class="form-label">Consumer ID</label>
    <input type="text" class="form-control"  name="customer" value="<?php echo $cid; ?>" readonly>
  </div>
  <div class="col-md-4">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="cname" value="<?php echo $cname; ?>" readonly>
  </div>
  <div class="col-md-4">
    <label  class="form-label">Email</label>
    <input type="email" class="form-control"  name="email" value="<?php echo $email; ?>" readonly>
  </div>
  <div class="col-4">
    <label  class="form-label">Mobile</label>
    <input type="number" class="form-control" name="phno" value="<?php echo $mobile; ?>" readonly>
  </div>
  
  <div class="col-md-4">
    <label class="form-label">Units</label>
    <input type="number" class="form-control" name="units">
  </div>
  <div class="col-md-4">
    <label class="form-label">Bill Date</label>
    <input type="date" class="form-control" name="bdate">
  </div>
  <div class="col-md-4">
    <label class="form-label">Due Date</label>
    <input type="date" class="form-control" name="ddate">
  </div>
  
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="btn">Generate Bill</button>
  </div>
  <br><br>
  <div class="col-md-4">
    <label class="form-label">Total Amount</label>
    <input type="number" class="form-control" value="<?php echo "$total"; ?>">
  </div>
</div>  
</div>
</form>
</body>
</html>
