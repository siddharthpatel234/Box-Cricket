<?php

include 'conn.php';
$conn=new connec();
if(!isset($_SESSION))
{
   session_start();
}
if( empty($_SESSION["owner_email"])||$_SESSION["owner_email"]==null)
{
    echo '<script> alert(" Please Login First"); window.location.href = "owner_login.php"; </script>';
    
}
include 'owner_navbar.php';
if(isset($_POST["btn_editbox"]))
{
    $boxname=$_POST["boxname"];
    $boxlocation=$_POST["boxlocation"];
    $boxsports=$_POST["boxsports"];
    $boxtime=$_POST["boxtime"];
    $Get_image_name = $_FILES["image1"]["name"];
    $image_Path = "images/".basename($Get_image_name);
    


    $result=$conn->select_addnewbox("box",$boxname);
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        if($row["box_name"]==$boxname && $row["box_location"]==$boxlocation)
        {  
            $sql="UPDATE `box` SET `box_banner`='$image_Path',`box_sports`='$boxsports',`box_time`='$boxtime' WHERE `box_name`='$boxname'";
            $conn->insert($sql,"Edited Successfully");
            if (move_uploaded_file($_FILES['image1']['tmp_name'], $image_Path)) {
              echo "Your Image uploaded successfully";
            }
            else{
              echo  "Not Insert Image";
            }
           
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

.time{
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
            <h3>Edit Box</h3>
            <p>Edit Your Box Details.</p>
          </div>
        </div>
        <form class="login-form" action="" method="POST"  enctype="multipart/form-data">
          <input type="text" value="<?php echo $_POST['boxname'] ?>" name="boxname" required disabled/>
          <input type="hidden" value="<?php echo $_POST['boxname'] ?>" name="boxname" required />
          
          <input type="text" value="<?php echo $_POST['boxlocation'] ?>" name="boxlocation" required disabled/>
          <input type="hidden" value="<?php echo $_POST['boxlocation'] ?>" name="boxlocation" required />

          <small  class="form-text text-muted">Eg :- Cricket,Football,Volleyball</small>
          <input type="text"  value="<?php echo $_POST['box_sports'] ?>" name="boxsports" required/>
          <small id="emailhelp" class="form-text text-muted">Eg :- 10:30-12:30,2:30-4:30,8:30-9:30</small>
          <input type="text" value="<?php echo $_POST['box_time'] ?>" name="boxtime" required/>
          
          <input type="file" name="image1" required>  	
          <button name="btn_editbox">Edit Box</button>
          
          



        </form>
      </div>
    </div>
</body>
</body>
</html>
<?php
include 'owner_footer.php';


?>
