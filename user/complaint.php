<?php
  require "../Database/db.php";
  session_start();
  $conid=$_SESSION['cid'];
  $sql="select * from `users` where `cid`='$conid'";
  $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count>0){
  $fetch=mysqli_fetch_array($result);
  $conid=$fetch['cid'];
  $name=$fetch['cname'];
  $email=$fetch['email'];
}
$last_id=null;
  $query = "SELECT * FROM complain order by id desc limit 1";
        $result= mysqli_query($con,$query);
        $count= mysqli_num_rows($result);
        if($count>0){
        $row = mysqli_fetch_array($result);

        $last_id = $row['cid'];
      }
      if ($last_id == " ")
      {
          $cid = "SID1";
      }
      else
      {
          $cid= substr($last_id,3);
           $cid = intval($cid);
           $cid = "SID" . ($cid + 1);
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Thunder God</title>
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
<div class="complaint-box">
<div class="col-md-12">
                    <a href="welcome.php" class="btn btn-danger float-end">BACK</a>
                </div>
  <h2>Complaint Box</h2>
  <form method="post" action="">
    
    <label for="cid">Service Number:</label>
    <input type="text" id="cid" name="cid" style="color:blue" value="<?php  echo $cid; ?>" readonly >        
    <label for="conid">Consumer ID:</label>
    <input type="text" id="conid" name="conid" value="<?php  echo $conid; ?>" readonly>
    <label for="name">Name:</label>
   
    <input type="text" id="name" name="name" value="<?php  echo $name; ?>" readonly>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php  echo $email; ?>" readonly>

    <label for="complaint">Complaint:</label>
    <textarea id="complaint" name="complaint" placeholder="Enter your complaint" required></textarea>

    <button type="submit" class="btn btn-success" name="submit">Submit</button>
  </form>
    </div>   
</body>
</html>
<?php

      if(isset($_REQUEST['submit'])){
        $cid=$_REQUEST['cid'];
        $conid=$_REQUEST['conid'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $complaint = $_REQUEST['complaint'];

        $sql = "INSERT INTO `complain`( `cid`,`conid`, `name`, `email`, `complaint`, `status`) VALUES ('$cid','$conid','$name','$email','$complaint','pending')";
        $result = mysqli_query($con,$sql);
        
        if ($result>0) {
          echo " <script>
          alert('Your request is under process');
          window.location.href='welcome.php';
      </script>";
        }
        else{
          echo " <script>
          alert('Something went wrong');
          window.location.href='complaint.php';
      </script>";
        }

      }


?>


