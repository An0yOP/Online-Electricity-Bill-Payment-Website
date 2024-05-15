<?php
session_start();
include('../Database/db.php');

$id=$_GET['payid'];
#$cid=$_SESSION['cid'];
$name=NULL;
$amt=NULL;

$sql="select * from `bills` where sno='$id'";
$result=mysqli_query($con,$sql);
$fetch=mysqli_fetch_assoc($result);
$bid=$fetch['bid'];
$cid=$fetch['cid'];
$name=$fetch['cname'];
$amt=$fetch['amount'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        *{
            font-family: 'Roboto Slab', serif;
        }
        body{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(70,70,153,1) 0%, rgba(100,182,246,1) 55%);

        }
        h1{
            
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
          <a class="nav-link" href="pending_table.php">back</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
    <div class="text-center my-4">
    <h1>Payment</h1>
    </div>
    <div class="col d-flex justify-content-center">
<form method="POST">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Bill Id</label>
    <input type="text" class="form-control" name="bid" id="bid" value="<?php echo $bid; ?>" readonly>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Consumer Id</label>
    <input type="text" class="form-control" name="cid" id="cid" value="<?php echo $cid; ?>"readonly>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" readonly>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Amount</label>
    <input type="text" class="form-control"  name="amt" id="amt"  value="<?php echo $amt; ?>" readonly>
  </div>
  <div class="text-center">
  <input type="button" class="btn btn-success" name="btn" id="btn" value="Pay Now" onclick="pay_now()">
 </div>
</form>
</div>
</div>

<script>
    function pay_now(){
        var bid=jQuery('#bid').val();
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        var cid=jQuery('#cid').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               //data:,
               success:function(result){
                   var options = {
                        "key": "rzp_test_MZmM6JYXe72MFC", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Thunder God",
                        "description": "Test Transaction",
                          "image":"idea.png" ,
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id+"&bid="+bid+"&amt="+amt+"&name="+name+"&cid="+cid,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>
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



