<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
    body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  align-items: center;
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
    </style>

</head>
<body>
<div class="about-section">
  <h1>About Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="images/jenith.jpg" alt="Jane" style="width:250px">
      <div class="container">
        <h2>Jenith Panchal</h2>
        <p class="title">Founder & CEO</p>
        <p>Supportive Leader who always want to do something big.</p>
        <p>jp.07@playbox.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/het.jpg" alt="Mike" style="width:250px">
      <div class="container">
        <h2>Het Patel</h2>
        <p class="title">CFO & Backend Manager</p>
        <p>Expert in Debugging and Troubleshooting skills with calm Mind.</p>
        <p>hp.07@playbox.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/karma.jpg" alt="John" style="width:250px">
      <div class="container">
        <h2>Karma Patel</h2>
        <p class="title">Co-Founder & Managing Director</p>
        <p>Ambitious Person who is always ready to tackle problems with innovative ideas.</p>
        <p>kp.07@playbox.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="images/sunny.jpg" alt="John" style="width:250px">
      <div class="container">
        <h2>Sunny Patel</h2>
        <p class="title">Designing Head & Frontend Manager</p>
        <p>Design Expert with creative skills.</p>
        <p>sp.07.@playbox.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

</div>
</body>
</html>
<?php
include 'footer.php';
?>