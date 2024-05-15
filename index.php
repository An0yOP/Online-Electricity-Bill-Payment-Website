<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Thunder</title>
    <link rel="stylesheet" href="style2.css">
    
</head>
<body>
    <nav>
    <ul>
      <li><img src ="images/idea (2).png"width= 60  class="pic " style="margin-left:30px;"></li>
      <li style="float:right;"><ul style="margin-left:50px;">
    <li class="current"><a href="#"><img src="images/home.png" class="icon"> HOME</a></li>
    <li><a href="#"><img src="images/group.png" class="icon"> ABOUT US</a></li>
    <li><a href="./user/login.php"><img src="images/user.png" class="icon"> LOGIN</a></li>
    <li><a href="./user/registration.php"><img src="images/edit.png" class="icon"> REGISTER US</a></li>
    <li><a href="./admin/faq.php"><img src="images/information.png" class="icon"> FAQ</a></li>
    <li><a href="admin.php"><img src="images/admin.png" class="icon"size="20">ADMIN</a></li>
</ul>
</li>
    </ul>
    </nav>
    
        
    <div class="mycointainer">
     
     <div class="slideshow-container">
     
     <div class="mySlides fade ">
       <div class="numbertext"></div>
       <img src="images/pic4.jpg" style="width:100%; height:450px">
       
     </div>
     
     <div class="mySlides fade ">
       <div class="numbertext"></div>
       <img src="images/pic2.jpg" style="width:100%; height:450px">
      
     </div>
     
     <div class="mySlides fade ">
       <div class="numbertext"></div>
       <img src="images/pic3.jpg" style="width:100%; height:425px">
 
</div>
<div class="mySlides fade ">
    <div class="numbertext"></div> 
    <img src="images/pic5.jpg" style="width:100%; height:450px">

</div>
<div class="mySlides fade ">
    <div class="numbertext"></div>
    <img src="images/pic1.jpg" style="width:100%; height:450px">

</div>


</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  
</div>
<script>
    let slideIndex = 0;
    showSlides();
    
    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 4000); 
    }
    </script>
    </div>
    <footer class="footer">
      <div class="footer-cointainer">
        <div class="footer-top">
        <div class="first">
          <!-- <img src="images/customer-service.png "class="footer-image"size="20"> -->
          <h1 class="footer title">24*7 Care</h1>
          <h4>Happy to help 24*7</h4>
  
          <img src=" " class="footer-image" >
    <h1 class="footer title">Secure Payment</h1>
    <h4>Secure Payment</h4>
  </div>
  <div>
  <img src="" class="footer-image">
    <h1 class="footer title">100% Assurance</h1>
    <h4>We provide 100% assurance</h4>
 
  <img src="" class="footer-image">
    <h1 class="footer title">Online Bill Payment</h1>
    <h4>E-bill offer you a simple secure way to pay your bills</h4>
  </div>
  </div>



    
    
       
</body>
</html>