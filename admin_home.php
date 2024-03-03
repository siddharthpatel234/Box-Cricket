<?php
include 'admin_navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .carousel-control-prev-icon{
      background-color: green;
    }
    .carousel-control-next-icon{
      background-color: green;
    }
  </style>
  
  <title>Home</title>
</head>
<body>
  <div class="container" style="margin-top:25px" >
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/bgimg1.jpg" class="rounded mx-auto d-block d-block" alt="First Slide" style="height:350px;width:auto;">
    </div>
    <div class="carousel-item">
      <img src="images/bgimg2.jpg" class="rounded mx-auto d-block d-block" alt="Second Slide" style="height:350px;width:auto;">
    </div>
    <div class="carousel-item">
      <img src="images/bgimg3.jpg" class="rounded mx-auto d-block d-block" alt="Third slide" style="height:350px;width:auto;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</body>
</html>
<?php
include 'admin_footer.php';

?>