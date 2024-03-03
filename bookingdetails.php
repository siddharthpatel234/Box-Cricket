<?php
include 'navbar.php';
include 'conn.php';
$conn=new connec();

if(isset($_POST["btn_ticket"]))
{
//   $checkedbox=0;
//  $values = $_POST['boxtime'];
//  $checkedbox = count($values);
//  if ($checkedbox < 1) 
//  { echo 'You need to check at least one Time.'; } 
 
  
  $box_name_final=$_SESSION["box_name"];
  
  $box_customer=$_SESSION["username"];
  
 $box_location_final= $_SESSION["box_location"];

   $box_sports_selected=$_REQUEST["sports1"];
   $_SESSION["selected_Sports"]=$box_sports_selected;
 //$box_sports_selected_final=implode("+",$box_sports_selected);
   $box_time_selected= $_POST["boxtime"];
   $_SESSION["Selected_time"]=$box_time_selected;
    $date=$_SESSION["box_date"];
    $_SESSION["selected_date"]=$date;
    $status="Incomplete";
 //$box_time_selected_final=implode("+",$box_time_selected);
  $sql1="INSERT INTO `bookingdetails` (`id`, `customer_name`, `box_name`, `box_sports_selected`, `box_time_selected`, `box_location`, `box_date`, `date_time`,`Payment_Status`)  VALUES ('0','$box_customer','$box_name_final','$box_sports_selected','$box_time_selected','$box_location_final','$date',now(),'$status')";
  $conn->insert($sql1," Slot Booked"); 
  
//  elseif ($checkedTutorial >= 4)
//  {
//  $error ='You can only check up to three Tutorials.';
//  }
  // echo $box_name_final;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingDetails</title>
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
.form input[type=text],
        input[type=password],
        input[type=tel],
        input[type=number],
        input[type=date],
        input[type=email],select,label {
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

<div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Booking Details</h3>
            <p>Your Booking Details Are as Follows</p>
          </div>
        </div>
        <form class="login-form" method="POST" action="selectpayment.php">
           
            <input type="text" value="Your Name is:<?php echo $_SESSION["username"]?>" name="namedisp" disabled="disabled"/> 

          <input type="text" value="Selected Box is :<?php  echo $_SESSION["box_name"] ?>" name="box_name" disabled="disabled"/>
           <input type="text" value="Selected <?php  echo $_SESSION["box_location"] ?>" name="box_location" disabled="disabled"/>
           <input type="text" value="Selected Sport: <?php  echo $_SESSION["selected_Sports"] ?>" name="sports_selected" disabled="disabled"/>
           <input type="text" value="Selected Time: <?php  echo $_SESSION["Selected_time"] ?>" name="time_selected" disabled="disabled"/>
           <input type="text" value="Selected Date: <?php  echo $_SESSION["selected_date"] ?>" name="time_selected" disabled="disabled"/>
          
          
          <button name="btn_bookingdetails">Make Payment</button>
          
        </form>
      </div>
</div>
</body>
</html>
<?php
include 'footer.php';

?>