
<?php

include 'conn.php';

$con=new connec();
if(!isset($_SESSION))
{
    session_start();
    
}

if(isset($_POST["btn_ownerlogin"]))
{
    
    $owner_email_id=$_POST["owner_email"];
    $owner_log_passw=$_POST["owner_psw"];
    $result=$con->select_ownerlogin("ownerdetails",$owner_email_id);
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        if($row["owner_email"]==$owner_email_id && $row["owner_password"]==$owner_log_passw)
        {
          $_SESSION["owner_email"]=$row["owner_email"];
          $_SESSION["owner_boxname"]=$row["owner_box"];
          $_SESSION["owner_id"]=$row["id"];
          $_SESSION["logged"]=1;
           
          echo '<script> alert("valid Emailid")</script>';
          header("Location: owner_home.php");
        }
        else
        {
            echo '<script> alert("Invalid Password")</script>';
        }
    }
  
        else{
          echo '<script> alert("Invalid Emailid")</script>';
        }
}
include ("owner_navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title> Login </title>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  /* background-color: #328f8a; */
  /* background-image: linear-gradient(45deg,#328f8a,#08ac4b); */
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
</head>
<body>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form class="login-form" action="owner_login.php" method="POST">
          <input type="text" placeholder="Email" name="owner_email"/>
          <input type="password" placeholder="Password" name="owner_psw"/>
          <button name="btn_ownerlogin">login</button>
          <!-- <p class="message">Not registered? <a href="registration.php">Create an account</a></p> -->
        </form>
      </div>
    </div>
</body>
</body>
</html>
<?php
include 'owner_footer.php';

?>
</html>