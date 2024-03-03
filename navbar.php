<?php

// include 'login.php';
// include 'registration.php'; 
// $con=new connec();

if(!isset($_SESSION))
{
   session_start();
}

if( empty($_SESSION["username"])||$_SESSION["username"]==null)
{
    // $_SESSION["ul"]='<li class="nav-item"><a class="nav-link" href="login.php"  style=" font-size:20px;color: #8ac85e;"
    // onmouseover="this.style.color='white'; this.style.borderRadius='5px';this.style.background='#8ac85e';this.style.transition='all .5s'" onmouseout="this.style.color='#8ac85e';this.style.background='white';this.style.transition='all .5s'"
    // >Login</a></li>
    //  <li class="nav-item"><a class="nav-link " href="registration.php"  style="font-size:20px; color: #8ac85e;">Registration</a> </li>';
    $_SESSION["ul"] = '<li class="nav-item"><a class="nav-link" href="login.php" style="font-size:20px;color: #8ac85e;" 
    onmouseover="this.style.color=\'white\'; this.style.borderRadius=\'5px\'; this.style.background=\'#8ac85e\'; this.style.transition=\'all .5s\'" 
    onmouseout="this.style.color=\'#8ac85e\'; this.style.background=\'whitesmoke\'; this.style.transition=\'all .5s\'">Login</a></li>
    <li class="nav-item"><a class="nav-link" href="registration.php" style="font-size:20px; color: #8ac85e;"onmouseover="this.style.color=\'whitesmoke\'; this.style.borderRadius=\'5px\'; this.style.background=\'#8ac85e\'; this.style.transition=\'all .5s\'" 
    onmouseout="this.style.color=\'#8ac85e\'; this.style.background=\'whitesmoke\'; this.style.transition=\'all .5s\'">Registration</a></li>';

}
else 
{
  $_SESSION["ul"] ='<li class="nav-item"> <a class="nav-link "style="font-size:20px; color: #8ac85e;" onmouseover="this.style.color=\'whitesmoke\'; this.style.borderRadius=\'5px\'; this.style.background=\'#8ac85e\'; this.style.transition=\'all .5s\'" 
    onmouseout="this.style.color=\'#8ac85e\'; this.style.background=\'whitesmoke\'; this.style.transition=\'all .5s\'">Welcome '.$_SESSION["username"].'</a></li>
  <li class="nav-item"> <a class="nav-link " href="yourbooking.php" style="font-size:20px; color: #8ac85e;"onmouseover="this.style.color=\'whitesmoke\'; this.style.borderRadius=\'5px\'; this.style.background=\'#8ac85e\'; this.style.transition=\'all .5s\'" 
  onmouseout="this.style.color=\'#8ac85e\'; this.style.background=\'whitesmoke\'; this.style.transition=\'all .5s\'">Your Bookings</a></li>
  <li class="nav-item"> <a class="nav-link " href="?action=logout" style="font-size:20px; color: #8ac85e;"onmouseover="this.style.color=\'whitesmoke\'; this.style.borderRadius=\'5px\'; this.style.background=\'#8ac85e\'; this.style.transition=\'all .5s\'" 
  onmouseout="this.style.color=\'#8ac85e\'; this.style.background=\'whitesmoke\'; this.style.transition=\'all .5s\'">Logout</a></li>';
}
if(isset($_GET["action"]))
{
    if($_GET["action"]=="logout"){
        $_SESSION["username"]=null;
        $_SESSION["cust_id"]=null;
        header("Location:Home.php");

    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title> navbar</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .navbar-scroll .nav-link,
.navbar-scroll .navbar-toggler-icon,
.navbar-scroll .navbar-brand {
  /* color: #262626;  */
  
}

/* Color of the navbar BEFORE scroll */
.navbar-scroll {
  
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
}

/* Color of the links AFTER scroll */
.navbar-scrolled .nav-link,
.navbar-scrolled .navbar-toggler-icon,
.navbar-scroll .navbar-brand {
  /* color: #262626; */
  
}

/* Color of the navbar AFTER scroll */
.navbar {
  background-color: #fff;
  /* height: 80px; */
}

/* An optional height of the navbar AFTER scroll */
.navbar.navbar-scroll.navbar-scrolled {
  padding-top: auto;
  padding-bottom: auto;
}
.navbar-brand {
  font-size: unset;
  height: 3.5rem;
}
    
    </style>

  </head>
  <body>

    <!-- Example Code 
      background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  -->
    
    <nav class="navbar navbar-expand-lg p-3" style=" background-color: whitesmoke;position: sticky;
    top: 0;
    z-index: 100;">
      <div class="container-fluid" style="width:100%">
        <div style="width:40%"> 

          <a class="navbar-brand" href="Home.php" style="font-size:35px;color: #8ac85e;">PlayBox</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="width:60%;">
          <ul class="navbar-nav" style="justify-content: space-between;
    width: 100%;">
            <li class="nav-item">
              <a class="nav-link active " aria-current="page" href="Home.php" style="font-size:20px; color: #8ac85e;"
              onmouseover="this.style.color='white'; this.style.borderRadius='5px';this.style.background='#8ac85e';this.style.transition='all .5s'" onmouseout="this.style.color='#8ac85e';this.style.background='whitesmoke';this.style.transition='all .5s'"
              
              >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="Contactus.php"  style="font-size:20px; color: #8ac85e;"
              onmouseover="this.style.color='white'; this.style.borderRadius='5px'; this.style.background='#8ac85e';this.style.transition='all .5s'" onmouseout="this.style.color='#8ac85e';this.style.background='whitesmoke';this.style.transition='all .5s'";
              >Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="Aboutus.php"  style="font-size:20px; color: #8ac85e;"
              onmouseover="this.style.color='white';  this.style.borderRadius='5px'; this.style.background='#8ac85e';this.style.transition='all .5s'" onmouseout="this.style.color='#8ac85e';this.style.background='whitesmoke';this.style.transition='all .5s'"
              
              >About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="boxbooking.php"  style="font-size:20px; color: #8ac85e;"
              onmouseover="this.style.color='white';  this.style.borderRadius='5px'; this.style.background='#8ac85e';this.style.transition='all .5s'" onmouseout="this.style.color='#8ac85e';this.style.background='whitesmoke';this.style.transition='all .5s'"
              >Book A Box</a>
            </li>
            
            <ul class="navbar-nav">
            <?php echo  $_SESSION["ul"]; ?>
            <!-- <li class="nav-item">
              <a class="nav-link" href="login.php"  style=" font-size:15px;color: #FFFFFF;">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registration.php"  style="font-size:15px; color: #FFFFFF;">Registration</a>
            </li> -->
          </ul>
          
          </ul>
        </div>
      </div>
    </nav>
    <!-- <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
  <div class="container">
    <a class="navbar-brand" href="#!"><i class="fab fa-mdb fa-4x"></i></a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#!">Book A Box</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Contactus.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Aboutus.php">About Us</a>
        </li>
       <a href="login.php"> <button type="button" class="btn btn-dark ms-3">Login</button></a>
       <a href="registration.php"> <button type="button" class="btn btn-dark ms-3">Registration</button></a>
      </ul>
    </div>
  </div>
</nav> -->
  <!-- Navbar -->
    
    <!-- End Example Code -->
  </body>
</html>