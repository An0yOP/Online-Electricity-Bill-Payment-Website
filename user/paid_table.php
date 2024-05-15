<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
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
          <a class="nav-link" href="pending_table.php">Pending Bills</a>
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
    <h2>Paid Bills</h2>
    </div>
    <div class="row d-flex justify-content-center">
    <table class="table table-bordered table-warning border-warning" id="invoice">
      <thead>
        <tr class="text-center">
          <th scope="col">S_No.</th>
          <th scope="col">Bill ID.</th>
          <th scope="col">Consumer ID</th>
          <th scope="col">Name</th>
          <th scope="col">Unit</th>
          <th scope="col">Amount</th>
          <th scope="col">Payment ID</th>
          <th scope="col">Time</th>
          <th scope="col">Status</th>
          <th scope="col">Operation</th>
        </tr>
      </thead>

      <?php
            require "../Database/db.php";
            session_start();
            $cid=$_SESSION['cid'];
            $name=NULL;
            $amt=NULL;
            $sql="select * from `bills` where `cid`='$cid' and `status`='paid'";
            $result=mysqli_query($con,$sql);
            $count=mysqli_num_rows($result);
            if($count>0){
              $no=1;
            while($fetch=mysqli_fetch_assoc($result)){
            $id=$fetch['sno'];
            $bid=$fetch['bid'];
            $cid=$fetch['cid'];
            $name=$fetch['cname'];
            $unit=$fetch['unit'];
            $amt=$fetch['amount'];
            $payid=$fetch['payment_id'];
            $time=$fetch['paytime'];
            $status=$fetch['status'];

            echo '<tr class="text-center">
            <th scope="row">'.$no.'</th>
            <td>'.$bid.'</td>
            <td>'.$cid.'</td>
            <td>'.$name.'</td>
            <td>'.$unit.'</td>
            <td>'.$amt.'</td>
            <td>'.$payid.'</td>
            <td>'.$time.'</td>
            <td>'.$status.'</td>
            <td>
            <a class="btn btn-primary" href="demo.php? pdfid='.$id.'" role="button">View</a>
         </td>
          </tr>';
          $no ++;
        }
      }
      ?>
      
   
    </table>
    
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