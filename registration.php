<?php
include 'navbar.php';
include 'conn.php';
$showAlert = false;
$showError = false;
$tablename = "registration";
$conn = new connec();
if (isset($_REQUEST["user_registration"])) {

  $firstname = $_POST["fname"];
  $lastname = $_POST["lname"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $contact = $_POST["number"];
  $cpassword = $_POST["cpassword"];
  $gender = $_POST["reg_gender_text"];
  $result = $conn->select_userregistration('registration', $email);
  $row = $result->num_rows;
  if ($row == 0) {
    if ($password == $cpassword) {

      $sql = "INSERT INTO registration VALUES (0,'$firstname','$lastname','$email','$contact','$gender','$password')";
      $conn->insert($sql, "User Registered Successfully. Now You can Login");
    } else {
      ?>
      <script> alert("Passwords does not match")</script>
      <?php
    }
  } else {
    ?>
    <script> alert("Already User Registrated") </script>
    <?php
  }
}



if (isset($_REQUEST["owner_registration"])) {

  $owner_box = $_POST["owner_box"];
  $owner_email = $_POST["owner_email"];
  $owner_password = $_POST["owner_password"];
  $owner_cpassword = $_POST["cpassword"];
  $result = $conn->select_ownerregistration('ownerdetails', $owner_email);
  $row = $result->num_rows;
  if ($row == 0) {
    if ($owner_password == $owner_cpassword) {
      $sql = "INSERT INTO ownerdetails VALUES ('','$owner_box','$owner_email','$owner_password')";
      $conn->insert($sql, "Owner Registered Successfully. Now You can Login");
    } else {
      ?>
      <script> alert("Passwords does not match")</script>
      <?php
    }
  } else {
    ?>
    <script> alert("Already Owner Registrated") </script>
    <?php
  }

}




?>

<!DOCTYPE html>
<html>

<head>
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

    .form input[type=text],
    input[type=password],
    input[type=tel],
    input[type=number],
    input[type=date],
    input[type=email] {
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
      background-color: #8ac85e;
      /* background-image: linear-gradient(45deg,#328f8a,#08ac4b); */
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
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
  <?php
  if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!!</strong> Yay your Account has been created.Enjoy visiting our website
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  
  </button>
</div> ';
  }
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!!</strong> ' . $showError . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  
  </button>
</div> ';
  }
  ?>
  <div style="height: 100%;display: flex;">

    <div class="login-page" style="width: 50%; margin-right:0px; margin-left: 0px;padding-top: 10px;">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Registration</h3>
            <p>Please enter your credentials to create account.</p>
          </div>
        </div>
        <h6>Select Your Role :-
          <select id="userOption" name="role" onchange="showRegistrationForm()">
            <option> Select</option>
            <option value="user">User</option>
            <option value="owner">Owner</option>
          </select>
        </h6>
        <br>
        <div id="userRegistration" style="display: none;">
          <form class="login-form" method="POST" action="registration.php">
            <h6>User Registration</h6>
            <input type="hidden" name="user_registration">
            <input type="text" placeholder="First name" name="fname" required />
            <input type="text" placeholder="Last name" name="lname" required />
            <input type="email" placeholder="Email" name="email" required />

            <input type="tel" placeholder="Phone Number" name="number" maxlength="10" required />

            <div style=" font-size: 14px;margin: 0 0 15px;">
              <label for="number" style="margin:15px 0 10px 0;"><b>Gender </b></label><br>
              <input type="radio" style="margin-right:15px" name="reg_gender_text" value="male" id="gender" required>
              Male
              <input type="radio" style="margin-left:15px;margin-right:15px;" name="reg_gender_text" value="female"
                id="gender" required> Female<br><br>
            </div>
            <input type="password" placeholder="password" name="password" required />
            <input type="password" placeholder="Confirm password" name="cpassword" required />
            <button>Register</button>

          </form>
        </div>
        <div id="ownerRegistration" style="display: none;">
          <h6>Owner Registration</h6>

          <form class="login-form" method="POST" action="registration.php">
            <input type="hidden" name="owner_registration">
            <input type="text" placeholder="Enter Box Name" name="owner_box" required />
            <input type="email" placeholder="Enter Email" name="owner_email" required />
            <input type="password" placeholder="password" name="owner_password" required />
            <input type="password" placeholder="Confirm password" name="cpassword" required />
            <button>Register</button>
          </form>
        </div>
      </div>
      
    </div>
    <div style="justify-content: center;align-items: center;width: 100%;  margin:auto;">
        <lottie-player src="https://lottie.host/4cd8a01e-a204-4bf4-a61a-a8eec93c5502/0GzBwcwgDS.json" loop="true"
          autoplay="true" mode="normal" speed="1" direction="1" background="##fff" speed="1"
          style="width: 100%; height: 40rem" mode="normal"></lottie-player>
      </div>
  </div>


    <script>
      function showRegistrationForm() {
        var option = document.getElementById("userOption").value;
        var userForm = document.getElementById("userRegistration");
        var ownerForm = document.getElementById("ownerRegistration");

        if (option === "user") {
          userForm.style.display = "block";
          ownerForm.style.display = "none";
        } else if (option === "owner") {
          userForm.style.display = "none";
          ownerForm.style.display = "block";
        } else {
          userForm.style.display = "none";
          ownerForm.style.display = "none";
        }
      }


    </script>


</body>

</html>
<?php
include 'footer.php';

?>

</html>