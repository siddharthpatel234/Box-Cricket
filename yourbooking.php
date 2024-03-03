<?php
//error_reporting(E_ERROR | E_PARSE);
include 'navbar.php';
include 'conn.php';
if(!isset($_SESSION))
{
   session_start();
}
$con=new connec();
$customer_name=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your booking</title>
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
<div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
          <?php
          ?><h3> Hello <?php  echo $_SESSION["username"]; ?></h3>
          <p> Your Bookings Are As follows: </p>
          <?php
            $result=$con->select_username("bookingdetails",$customer_name);
            $flag=0;
                if($result->num_rows>0)
                {
                  ?>  
                  <?php
                    while($row=$result->fetch_assoc())
                    {
                    $numExixtsRows=mysqli_num_rows($result);
                    // if($numExixtsRows>0)
                    //     {
                    //     }
                      
                      $date1 = date('Y-m-d');
                      $date2 = $row["box_date"];
                      if(strtotime($date1) <= strtotime($date2))
                      {
                        $flag=1;
                        ?>
                          <form action="" metho="POST" style="font-size:10px">
                          <div class="d-flex justify-content-between mb-3">
                            <p class="fw-bold mb-0 text-start">
                            <?php  echo"Box-Name:". $row["box_name"];  $boxnamecancel=$row["box_name"];?><br>
                            <?php echo "Sport-selected:". $row["box_sports_selected"]; $boxsportselectedcancel=$row["box_sports_selected"];?><br>
                            <?php echo "Time-Selected:".$row["box_time_selected"]; $boxtimeselectedcancel=$row["box_time_selected"];?><br>
                            <?php echo $row["box_location"] ;$boxlocationcancel=$row["box_location"];?><br>
                            <?php echo "Date-Selected:".$row["box_date"]; $boxdatecancel=$row["box_date"];?></p>
                            <p class="fw mb-0 text-end"><?php  echo"Payment:". $row["Payment_Status"];$boxpaymentstatuscancel=$row["Payment_Status"]; ?></p>
                          </div>
                          <button name="btn_cancel" class="mb-5" >Cancel</button>
                          </form>
                        <?php
                      }
                    }
                }
                if($flag==0)
                {
                  ?>
                  <div class="d-flex justify-content-between mb-3">
                  <h4 style="margin-left:45px;"> No Bookings Done</h4>
                  </div>
                  
                 <a href="boxbooking.php"> <button name="btn_book" class="" >Book</button></a>
                  
                  <?php
                }
                ?>   
           
            
          </div>
        </div>
        
      </div>
    </div>
</body>
</html>
<?php
if(isset($_REQUEST["btn_cancel"]))
{
  $namecancel=$_SESSION["username"];
  // $boxnamecancel1=$_SESSION["boxnamecancel"];
 // $boxdatecancel1=$_SESSION['boxdatecancel'];
  $sqldelete="Delete from `bookingdetails` where customer_name='$namecancel' AND box_name='$boxnamecancel' AND box_date='$boxdatecancel'";
  $con->deletesp($sqldelete,"Slot Canceled"); 
}
// include 'footer.php';
?>