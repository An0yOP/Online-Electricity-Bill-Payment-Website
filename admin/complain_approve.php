<?php
  require "../Database/db.php";
  if(isset($_REQUEST['approve'])){
    $id = $_REQUEST['id'];
    $select = "UPDATE complain set status ='approved' where id = '$id' ";
    $result = mysqli_query($con,$select);
    header("location:complain_approve.php");
  }
  if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['id'];
    $select = "DELETE FROM complain  where id = '$id' ";
    $result = mysqli_query($con,$select);
    header("location:complain_approve.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Thunder</title>

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
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
<h3 class="text-center my-4">PENDING LIST</h3>
<div class="row d-flex justify-content-center">
<table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Complain ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">complaint</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                   $sql = "SELECT * FROM `complain` where status = 'pending' ORDER BY id ASC";
                        $data = mysqli_query($con,$sql);
                          $no=1;
                        while($row=mysqli_fetch_array($data)){
                          $id=$row['id'];?>
                            
                        
                        <tr class="text-center">
                        <td><?php echo $no;?></td>
                        <td><?php echo $row['cid'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['complaint'];?></td>
                        <td><?php echo $row['status'];?></td>

                            <td>
                            <form action="complain_approve.php" method="POST">
                           <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                            <input class="btn btn-success" class="text-light" type="submit" name="approve" value="approve">
                            <input class="btn btn-danger" class="text-light" type="submit" name="delete" value="delete">
                        </form>
                    </td>
                    </tr>
                    
            <?php
            $no ++;
        }

    ?>
           </tbody>
        </table>
            
    
</div>
<br>

<h3 class="text-center my-4">APPROVE LIST</h3>
<div class="row d-flex justify-content-center">

  
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Complain ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">complaint</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql ="select * from `complain`  where status = 'approved'";
                        $result = mysqli_query($con,$sql);
                        if($result){
                          $no=1;
                          while($row= mysqli_fetch_assoc($result)){
                              $id= $row['id'];
                              $comid= $row['cid'];
                              $name= $row['name']; 
                              $email= $row['email'];
                              $complain= $row['complaint'];
                              $status=$row['status'];
                  
                              echo '<tr class="text-center">
                              <th scope="row">'.$no.'</th>
                              <td>'.$comid.'</td>
                              <td>'.$name.'</td>
                              <td>'.$email.'</td>
                              <td>'.$complain.'</td>
                              <td>'.$status.'</td>
                              <td>
                              <a class="btn btn-success" href="complain_resolution.php? complainid='.$id.'" role="button">Solution</a>
                              
                           </td>
                            </tr>';
                            $no ++;
                          }
                        }
                        ?>
                    </tbody>
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