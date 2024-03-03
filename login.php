<?php

include 'conn.php';

$con = new connec();
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST["btn_login"])) {

  $email_id = $_POST["email"];
  $log_passw = $_POST["psw"];
  $role = $_POST["role"];
  if ($role == "user") {
    $result = $con->select_login("registration", $email_id);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if ($row["email"] == $email_id && $row["password"] == $log_passw) {
        $_SESSION["username"] = $row["firstname"];
        $_SESSION["user_email"] = $row["email"];
        $_SESSION["cust_id"] = $row["id"];
        $_SESSION["logged"] = 1;
        echo '<script> alert("valid Emailid")</script>';
        header("Location:Home.php");
      } else {
        echo '<script> alert("Invalid Password")</script>';
      }
    } else {
      echo '<script> alert("Invalid Emailid")</script>';
    }
  }
  if ($role == "owner") {
    $result = $con->select_ownerlogin("ownerdetails", $email_id);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if ($row["owner_email"] == $email_id && $row["owner_password"] == $log_passw) {
        $_SESSION["owner_email"] = $row["owner_email"];
        $_SESSION["owner_boxname"] = $row["owner_box"];
        $_SESSION["owner_id"] = $row["id"];
        $_SESSION["logged"] = 1;

        echo '<script> alert("valid Emailid");</script>';
        header("Location:owner_home.php");
      } else {
        echo '<script> alert("Invalid Password")</script>';
      }
    } else {
      echo '<script> alert("Invalid Emailid")</script>';
    }
  }
  if ($role == "admin") {
    $result = $con->select_adminlogin("admin_details", $email_id);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if ($row["admin_email"] == $email_id && $row["admin_password"] == $log_passw) {
        $_SESSION["adminname"] = $row["admin_fname"];
        $_SESSION["cust_id"] = $row["id"];
        $_SESSION["logged"] = 1;
        echo '<script> alert("valid Emailid");</script>';
        header("Location:admin_home.php");
      } else {
        echo '<script> alert("Invalid Password")</script>';
      }
    } else {
      echo '<script> alert("Invalid Emailid")</script>';
    }
  }
  // $_SESSION["role"] = $role;
}
include("navbar.php");
?>
<!DOCTYPE html>
<html>

<head>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <link rel="stylesheet" href="style.css">
  <title> Login </title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    header .header {
      background-color: #fff;
      height: 45px;
    }

    header a img {
      width: 134px;
      margin-top: 4px;
    }

    .login-page {
      width: 360px;
      padding: 8% 0 0;
      margin: auto;
    }

    .login-page .form .login {
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

    .form button:hover{
      transform: scale(1.05);
      transition: all .5s;
    }

    .form button {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background-color: #8ac85e;
      /* background-image: linear-gradient(45deg, #328f8a, #08ac4b); */
      width: 100%;
      border: 0;
      border-radius: 3px;
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

    lottie-player {
      /* Hide controls */
      --lottie-player-controls-display: none !important;
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

    <div style="display: flex;
    flex: content;">
      <div style="justify-content: center;align-items: center;width: 50%;margin: auto;">
          <lottie-player src="https://lottie.host/4cd8a01e-a204-4bf4-a61a-a8eec93c5502/0GzBwcwgDS.json" loop="true" autoplay="true" mode="normal" speed="1" direction="1" background="##fff" speed="1" style="width: 100%; height: 40rem" mode="normal"></lottie-player>
      </div>

      <div class="login-page" style="display: flex; flex:content;width: 50%;">
        <div class="form" style=" width:100%; margin-left: 10rem; margin-right: 0px;">
          <div class="login">
            <div class="login-header">
              <h3>LOGIN</h3>
              <p>Please enter your credentials to login.</p>
            </div>
          </div>
          <form class="login-form" action="login.php" method="POST">
            <input type="text" placeholder="Email" name="email" />
            <input type="password" placeholder="password" name="psw" />
            <h6>Select Your Role :
              <select name="role">
                <option value="user">User</option>
                <option value="owner">Owner</option>
                <option value="admin">Admin</option>
              </select>
            </h6><br><br>
            <button name="btn_login">login</button>
            <p class="message" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transition='all .3s'">Not registered? <a href="registration.php">Create an account</a></p>
          </form>
        </div>
      </div>
    </div>
  </body>
</body>

</html>
<?php
include 'footer.php';

?>

</html>