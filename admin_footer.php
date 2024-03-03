<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
$primary-light-blue: #8DB9ED;
$primary-line-color: #ccc;
* {
  box-sizing: border-box
}
html, body {
  height: 100%
}
body {
	font: 11px "Open Sans", sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	margin: auto;
  display: flex;
  flex-flow: column nowrap;
  
  justify-content: space-between;
}
ul {
  list-style: none
}
a {
  text-decoration: none
}
.generic-anchor {
	color: $primary-light-blue;
	&:visited {
		color: $primary-light-blue
	}
	&:hover {
		color: $primary-line-color
	}
}
.flex-rw {
  display: flex;
  flex-flow: row wrap;
}
//This main is mostly to push the footer to the bottom and for demo purposes.
main {
  flex: 1 1 auto; //For IE11
  display: flex;
  align-items: center;
  justify-content: center;
  font: 10em "Oswald", sans-serif;
  color: rgb(155,155,155);
  line-height: 1
}
footer {
  background: rgb(55,55,55);
  margin-top: auto;
  width: 100%
}
.footer-list-top {
  width: 33.333%
}
.footer-list-top > li {
  text-align: center;
  padding-bottom: 10px
}
.footer-list-header {
  padding: 10px 0 5px 0;
  color: #fff;
  font: 2.3vw "Oswald", sans-serif
}
.footer-list-anchor {
  font: 1.3em "Open Sans", sans-serif
}
.footer-social-section {
  width: 100%;
  align-items: center;
  justify-content: space-around;
  position: relative;
  margin-top: 5px;
}
.footer-social-section::after {
  content: "";
  position: absolute;
  z-index: 1;
  top: 50%;
  left: 10px;
  border-top: 1px solid $primary-line-color;
  width: calc(100% - 20px)
}
.footer-social-overlap {
  position: relative;
  z-index: 2;
  background: rgb(55,55,55);
  padding: 0 20px
}
.footer-social-connect {
  display: flex;
  align-items: center;
  font: 3.5em "Oswald", sans-serif;
  color: #fff
}
.footer-social-small {
  font-size: 0.6em;
  padding: 0px 20px
}
.footer-social-overlap > a {
  font-size: 3em
}
.footer-social-overlap > a:not(:first-child) {
  margin-left: 0.38em
}
.footer-bottom-section {
  width: 100%;
  padding: 10px;
  border-top: 1px solid $primary-line-color;
  margin-top: 10px
}
.footer-bottom-section > div:first-child {
  margin-right: auto
}
.footer-bottom-wrapper {
  font-size: 1.5em;
  color: #fff
}
.footer-address {
  display: inline;
  font-style: normal
}
@media only screen and (max-width: 768px) {
  .footer-list-header {
    font-size: 2em
  }
  .footer-list-anchor {
    font-size: 1.1em
  }
  .footer-social-connect {
    font-size: 2.5em
  }
  .footer-social-overlap > a {
    font-size: 2.24em
  }
  .footer-bottom-wrapper {
    font-size: 1.3em
  }
}
@media only screen and (max-width: 568px) {
  main {
    font-size: 5em
  }
  .footer-list-top {
    width: 100%
  }
  .footer-list-header {
    font-size: 3em;
  }
  .footer-list-anchor {
    font-size: 1.5em
  }
  .footer-social-section {
    justify-content: center
  }
  .footer-social-section::after {
    top: 25%
  }
  .footer-social-connect {
    margin-bottom: 10px;
    padding: 0 10px
  }
  .footer-social-overlap {
    display: flex;
    justify-content: center;
  }
  .footer-social-icons-wrapper {
    width: 100%;
    padding: 0
  }
  .footer-social-overlap > a:not(:first-child) {
    margin-left: 20px;
  }
  .footer-bottom-section {
    padding: 0 5px 10px 5px
  }
  .footer-bottom-wrapper {
    text-align: center;
    width: 100%;
    margin-top: 10px
  }
}
@media only screen and (max-width: 480px) {
  .footer-social-overlap > a {
    margin: auto
  }
  .footer-social-overlap > a:not(:first-child) {
    margin-left: 0;
  }
  .footer-bottom-rights {
    display: block
  }
}
@media only screen and (max-width: 320px) {
  .footer-list-header {
    font-size: 2.2em
  }
  .footer-list-anchor {
    font-size: 1.2em
  }
  .footer-social-connect {
    font-size: 2.4em
  }
  .footer-social-overlap > a {
    font-size: 2.24em
  }
  .footer-bottom-wrapper {
    font-size: 1.3em
  }
}





  </style>
  </head>

  <body>
 
<footer class="flex-rw" style="margin-top:25px;">
  
  <!-- <ul class="footer-list-top">
    <li>
      <h4 class="footer-list-header">About Pavilion</h4></li>
    <li><a href='/shop/about-mission' class="generic-anchor footer-list-anchor" itemprop="significantLink">GET TO KNOW US</a></li>
    <li><a href='/promos.html' class="generic-anchor footer-list-anchor" itemprop="significantLink">PROMOS</a></li>
    <li><a href='/retailers/new-retailers.html' class="generic-anchor footer-list-anchor" itemprop="significantLink">BECOME A RETAILER</a></li>

    <li><a href='/job-openings.html' itemprop="significantLink" class="generic-anchor footer-list-anchor">JOB OPENINGS</a></li>

    <li><a href='/shop/about-show-schedule' class="generic-anchor footer-list-anchor" itemprop="significantLink">EVENTS</a></li>
  </ul> -->
  <ul class="footer-list-top">
    <li>
      <h4 class="footer-list-header">Owner</h4></li>
    <li><a href='owner_login.php' class="generic-anchor footer-list-anchor">LOGIN</a></li>
  </ul>
  <ul class="footer-list-top">
    <li id='help'>
      <h4 class="footer-list-header">User</h4></li>
    <li><a href='login.php' class="generic-anchor footer-list-anchor" itemprop="significantLink">LOGIN</a></li>
  </ul>
  <!-- <section class="footer-social-section flex-rw">
     
      <span class="footer-social-overlap footer-social-icons-wrapper">
      <a href="https://www.pinterest.com/paviliongift/" class="generic-anchor" target="_blank" title="Pinterest" itemprop="significantLink"><i class="fa fa-pinterest"></i></a>
      <a href="https://www.facebook.com/paviliongift" class="generic-anchor" target="_blank" title="Facebook" itemprop="significantLink"><i class="fa fa-facebook"></i></a>
      <a href="https://twitter.com/PavilionGiftCo" class="generic-anchor" target="_blank" title="Twitter" itemprop="significantLink"><i class="fa fa-twitter"></i></a>
      <a href="http://instagram.com/paviliongiftcompany" class="generic-anchor" target="_blank" title="Instagram" itemprop="significantLink"><i class="fa fa-instagram"></i></a>
      <a href="https://www.youtube.com/channel/UCYgUODvd0qXbu_LkUWpTVEg" class="generic-anchor" target="_blank" title="Youtube" itemprop="significantLink"><i class="fa fa-youtube"></i></a>
      <a href="https://plus.google.com/+Paviliongift/posts" class="generic-anchor" target="_blank" title="Google Plus" itemprop="significantLink"><i class="fa fa-google-plus"></i></a>
      </span>
  </section> -->
  <section class="footer-bottom-section flex-rw">
    <div class="footer-bottom-wrapper">   
      <i class="fa fa-copyright" role="copyright">  
      </i> 2023 , <address class="footer-address" role="company address">PlayBox - Slot Booking System</address><span class="footer-bottom-rights"> - All Rights Reserved - </span>    </div>
    <div class="footer-bottom-wrapper">
      <a href="/terms-of-use.html" class="generic-anchor" rel="nofollow">Terms</a> | <a href="/privacy-policy.html" class="generic-anchor" rel="nofollow">Privacy</a>
    </div>
  </section>
</footer>

</body>   
</html>
<!-- Footer -->
<!-- <footer class="text-center text-lg-start  text-muted "style="margin-top:25px; background-color: #328f8a;background-image: linear-gradient(45deg,#328f8a,#08ac4b);"> -->
  <!-- Section: Social media -->
  <!-- <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="color:white"> -->
    <!-- Left -->
    <!-- <div class="me-5 d-none d-lg-block" >
      <span>Get connected with us on social networks:</span>
    </div>

    <div >
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div> -->
    <!-- Right -->
  <!-- </section> -->
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <!-- <section class="" style="color:white">
    <div class="container text-center text-md-start mt-5"> -->
      <!-- Grid row -->
      <!-- <div class="row mt-3"> -->
        <!-- Grid column -->
        <!-- <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4"> -->
          <!-- Content -->
          <!-- <h6 class="text-uppercase fw-bold mb-4"> -->
            <!-- <i class="fas fa-gem me-3"></i>Playbox -->
          <!-- </h6>
          <p> -->
            <!-- This Website allows user to book  a slot for his/her favourite sports from any place and anytime.
          </p>
        </div> -->
        <!-- Grid column -->

        <!-- Grid column -->

       <!-- <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>-->
        <!-- Grid column -->

        <!-- Grid column -->
       <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset"></a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div> -->
        <!-- Grid column -->

        <!-- Grid column -->
        <!-- <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
         
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> Sola,Ahmedabad</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            playbox@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4"> -->
          <!-- Links -->
          <!-- <h6 class="text-uppercase fw-bold mb-4">ADMIN</h6>
          <p><i class="fas fa-home me-3"></i> Sola,Ahmedabad</p> -->
          <!-- <h4 class="footer-list-header">User</h4></li>
            <a href='login.php' class="generic-anchor footer-list-anchor" itemprop="significantLink"style="color:white">LOGIN</a> -->
          <!-- <p>
            <i class="fas fa-envelope me-3"></i>
            playbox@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p> -->
        <!-- </div> -->
        <!-- Grid column -->
      <!-- </div> -->
      <!-- Grid row -->
    <!-- </div>
  </section> -->
  <!-- Section: Links  -->

  <!-- Copyright -->
  <!-- <div class="text-center p-4" style="color:white;background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright -->
    <!-- <a class="text-reset fw-bold" href="">Playbox.com</a> -->
  <!-- </div> -->

<!-- </footer> -->
<!-- Footer -->