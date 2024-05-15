<?php
require "../Database/db.php";

//if the user is already logged n
session_start();

?>


<?php
        $last_id=null;
        $query = "select * from users order by sno desc limit 1";
        $result= mysqli_query($con,$query);
        $count= mysqli_num_rows($result);
        if($count>0){
        $row = mysqli_fetch_array($result);
        $last_id = $row['cid'];
        }
        if ($last_id == "")
        {
            $cid = "CUS01";
        }
        else
        {
            $cid= substr($last_id,-2);
             $cid = intval($cid);
             if($cid<10) $cid = "CUS0" . ($cid + 1);
              
             else
             $cid = "CUS" . ($cid + 1);
        }
    ?>
    <?php


if (isset($_POST['submit'])){
  $cname=$_POST['cname'];
   $cid=$_POST['cid'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $phno=$_POST['phno'];
  $occupation=$_POST['occupation'];
  $address=$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $pincode=$_POST['pincode'];
  $connection=$_POST['connection'];

  $phash=password_hash($password, PASSWORD_DEFAULT);

  $errors = array();

  if (empty($cid) OR empty($cname) OR empty($email) OR empty($password) OR empty($cpassword) OR empty($phno) OR empty($occupation) OR empty($address) OR empty($city) OR empty($state) OR empty($pincode) OR empty($connection)) {
      array_push($errors,"All fields are required");
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors,"Email is not valid");
  }
  if(strlen($password)<8){
      array_push($errors,"Password must be at least 8 charaters long");
  }
  if(strlen($phno)!==10){
    array_push($errors,"Phone Number must be 10 digits long");
}
  if($password!==$cpassword){
      array_push($errors,"Password does not match");
  }
  $sql = "SELECT * FROM `users` WHERE cid = '$cid'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count>0)
        {
            array_push($errors," already exists!");; 
        }
  
 if (count($errors)>0) {
      foreach($errors as $error){
         echo " <script> alert('$error') </script>";
      }
  }
  else{
      //we will insert the data into database
      $sql= "INSERT INTO `users` (`sno`, `cid`, `cname`, `email`, `phno`, `occupation`, `address`, `city`, `state`, `pincode`, `connection`,`password`,`datetime`) VALUES (NULL, '$cid', '$cname', '$email', '$phno', '$occupation', '$address', '$city', '$state', '$pincode', '$connection','$phash',current_timestamp)";
      $result=mysqli_query($con,$sql);
      if ($result) {
          
          echo "<script>alert('Registration Successful!')</script>";
      }
      else {
          die("Something went wrong");
      }
  }
}

?>
<html>
  <head>
    <title>Registration</title>
    <link rel="stylesheet" href="reg.css" >
  </head>
  <body>
    <div class="container">
      <h1 class="form-title">Register Here</h1>
      <form method="post">
      <div class="main-user-info">
      
          
          
      <div class="user-input-box">
            <label for="cid">Customer Id </label>
            <input type="text"name="cid" style="color:blue" value="<?php  echo $cid; ?>" readonly >
          </div>
          <div class="user-input-box">
            <label for="cname">Customer Name</label>
            <input type="text" name="cname" placeholder="Enter Customer Name"required>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter Email"required>
          </div>
          <div class="user-input-box">
            <label for="phno">Phone Number</label>
            <input type="text"id="phno"name="phno"placeholder="Enter Phone Number"required>
          </div>
          
          <div class="user-input-box">
            <label for="occupation">Occupation</label>
            <input type="text"name="occupation"placeholder="Enter Occupation"required>
          </div>
          <div class="user-input-box">
            <label for="address">Address</label>
            <input type="text"name="address" placeholder="Enter house number"required>
          </div>
          <div class="user-input-box">
            <label for="city">City</label>
            <input type="text"  name="city" placeholder="city"required>
          </div>
          <div class="user-input-box">
          <label for="state">State</label>
          <select id="country-state" name="state"required>
    <option value="">Select state</option>
    <option value="AN">Andaman and Nicobar Islands</option>
    <option value="AP">Andhra Pradesh</option>
    <option value="AR">Arunachal Pradesh</option>
    <option value="AS">Assam</option>
    <option value="BR">Bihar</option>
    <option value="CH">Chandigarh</option>
    <option value="CT">Chhattisgarh</option>
    <option value="DN">Dadra and Nagar Haveli</option>
    <option value="DD">Daman and Diu</option>
    <option value="DL">Delhi</option>
    <option value="GA">Goa</option>
    <option value="GJ">Gujarat</option>
    <option value="HR">Haryana</option>
    <option value="HP">Himachal Pradesh</option>
    <option value="JK">Jammu and Kashmir</option>
    <option value="JH">Jharkhand</option>
    <option value="KA">Karnataka</option>
    <option value="KL">Kerala</option>
    <option value="LA">Ladakh</option>
    <option value="LD">Lakshadweep</option>
    <option value="MP">Madhya Pradesh</option>
    <option value="MH">Maharashtra</option>
    <option value="MN">Manipur</option>
    <option value="ML">Meghalaya</option>
    <option value="MZ">Mizoram</option>
    <option value="NL">Nagaland</option>
    <option value="OR">Odisha</option>
    <option value="PY">Puducherry</option>
    <option value="PB">Punjab</option>
    <option value="RJ">Rajasthan</option>
    <option value="SK">Sikkim</option>
    <option value="TN">Tamil Nadu</option>
    <option value="TG">Telangana</option>
    <option value="TR">Tripura</option>
    <option value="UP">Uttar Pradesh</option>
    <option value="UT">Uttarakhand</option>
    <option value="WB">West Bengal</option>
</select>
      
   
          </div>
          <div class="user-input-box">
            <label for="pincode">Pincode</label>
            <input type="text"name="pincode"placeholder="Enter Pincode"required>
          </div>
          <div class="user-input-box">
          <label for="connection">Connection Purpose</label>
          <select id="country-state" name="connection"required>
    <option value="">Select</option>
    <option value="Household">Household</option>
    <option value="Commercial">Commercial</option>
</select>
</div>
          

          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password"name="password"placeholder="Enter Password"required>
          </div>
          <div class="user-input-box">
          <label for="password">Confirm Password</label>
            <input type="password"name="cpassword"placeholder="Enter Password"required>
          </div>
          </div>
          
        
       
        <div class="form-submit-btn" align="center" >
          <input type="submit" name="submit" value="Submit">
        </div>
        <a href="../index.php">back</a>
      </form>
    </div>
  </body>
</html>