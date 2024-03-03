<?php

include 'conn.php';
$conn = new connec();
if (!isset($_SESSION)) {
  session_start();
}
if (empty($_SESSION["owner_email"]) || $_SESSION["owner_email"] == null) {
  echo '<script> alert(" Please Login First"); window.location.href = "owner_login.php"; </script>';
}
include 'owner_navbar.php';
if (isset($_POST["btn_newbox"])) {
  $newboxname = $_POST["newboxname"];
  $newboxlocation = $_POST["newboxlocation"];
  $newboxsports = $_POST["newboxsports"];
  $newboxtime = $_POST["newboxtime"];
  $Get_image_name = $_FILES["image1"]["name"];
  $image_Path = "images/" . basename($Get_image_name);





  $result = $conn->select_addnewbox("box", $newboxname);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["box_name"] == $newboxname && $row["box_location"] == $newboxlocation) {
      echo '<script> alert("Box already exists")</script>';
    } else {
      $sql = "INSERT INTO `box_request` VALUES (0,'$newboxname','$image_Path','$newboxlocation','$newboxsports','$newboxtime')";
      $conn->insert($sql, "New Box Added");
      if (move_uploaded_file($_FILES['image1']['tmp_name'], $image_Path)) {
        echo "Your Image uploaded successfully";
      } else {
        echo  "Not Insert Image";
      }
    }
  } else {
    $sql = "INSERT INTO `box_request` VALUES (0,'$newboxname','$image_Path','$newboxlocation','$newboxsports','$newboxtime')";
    $conn->insert($sql, "New Box Added");
    if (move_uploaded_file($_FILES['image1']['tmp_name'], $image_Path)) {
      echo "Your Image uploaded successfully";
    } else {
      echo  "Not Insert Image";
    }
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
      background-image: linear-gradient(45deg, #328f8a, #08ac4b);
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

    .time {
      font-family: "Roboto", sans-serif;
      outline: 0;

      border: 0;
      margin: 0 0 15px;
      padding: 5px;
      box-sizing: border-box;
      font-size: 14px;
    }

    body {
      /* background-color: #328f8a; */
      /* background-image: linear-gradient(45deg,#328f8a,#08ac4b); */
      font-family: "Roboto", sans-serif;
      /* -webkit-font-smoothing: antialiased; */
      /* -moz-osx-font-smoothing: grayscale; */
    }
  </style>
</head>

<body>
  <div class="login-page">
    <div class="form">
      <div class="login">
        <div class="login-header">
          <h3>Add New Box</h3>
          <p>Please enter your box details.</p>
        </div>
      </div>
      <form class="login-form" action="" method="POST" enctype="multipart/form-data">
        <input type="text" value="<?php echo $_SESSION['owner_boxname']; ?>" name="newboxname" disabled />
        <input type="hidden" placeholder="Enter box name" name="newboxname" />

        <input type="text" placeholder="Enter box location" name="newboxlocation" required />
        <small class="form-text text-muted">Eg :- Cricket,Football,Volleyball</small>
        <input type="text" placeholder="Enter Sports Available" name="newboxsports" required />
        <small id="emailhelp" class="form-text text-muted">Eg :- 10:30-12:30,2:30-4:30,8:30-9:30</small>
        <input type="text" placeholder="Enter Time Available" name="newboxtime" required />

        <input type="file" name="image1" id="imageInput" required>
<span id="fileError" style="color: red; display: none;">Please select an image file.</span>

<script>
    document.getElementById('imageInput').addEventListener('change', function() {
        var fileInput = document.getElementById('imageInput');
        var file = fileInput.files[0];
        var fileType = file.type.split('/')[0];

        if (fileType !== 'image') {
            document.getElementById('fileError').style.display = 'inline';
            fileInput.value = ''; // Clear the file input
        } else {
            document.getElementById('fileError').style.display = 'none';
        }
    });
</script>
        <button name="btn_newbox">ADD</button>
        <!-- <p class="message">Not registered? <a href="registration.php">Create an account</a></p> -->




      </form>
    </div>
  </div>
  <div>
    <?php
    include 'footer.php';
    ?>
  </div>
</body>

</html>