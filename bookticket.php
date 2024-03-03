<?php
// include 'navbar.php';
error_reporting(E_ERROR | E_PARSE);
include 'conn.php';
$con=new connec();
if(!isset($_SESSION))
{
    session_start();
    
}
if(isset($_POST["btn_bookticket"]))
{
  if( empty($_SESSION["username"])||$_SESSION["username"]==null)
{
  echo '<script> alert(" Please Login First ");window.location.href = "login.php"; </script>'; 
}
else 
{
  
  $_SESSION["box_name"]=$_REQUEST["box_name"];
  $_SESSION["box_location"]=$_REQUEST["box_location"];
  $_SESSION["box_date"]=$_REQUEST["date"];
}

}
include 'navbar.php';
// $result=$con->select_all("bookingdetails");
//  if($result->num_rows>0)
//  {
//      while($row=$result->fetch_assoc())
//      {
//        $box_time_selected=$row["box_time_selected"];
//        $box_time_selectedcount=explode(",",$box_time_selected);
//      }
//    }
$box_name=$_REQUEST['box_name'];
$box_date=$_REQUEST['date'];
 $box_location=$_REQUEST['box_location'];
 
 $box_sports=$_REQUEST['box_sports'];
 $box_sportscount=explode(",",$box_sports);
 $box_time=$_REQUEST['box_time'];
 $box_timecount=explode(",",$box_time);
  $box_date_database=$_SESSION["box_date"];
  $box_name_database=$_SESSION["box_name"];
 $result=$con->select_fortime("bookingdetails",$box_date_database,$box_name_database);
 
     if($result->num_rows>0)
     {  $box_time_selected_array=array();
         while($row=$result->fetch_assoc())
         {
        //  echo $row["box_time_selected"];
         $box_time_selected_array[]=$row["box_time_selected"];
         }
          $box_time_selected_array_string=implode(",",$box_time_selected_array);
         
     }  
     $box_timecount_array=explode(",",$box_time_selected_array_string);
     
    // print_r($box_timecount_array);
    // print_r($box_timecount);
    $i=0;
    $result = array_intersect($box_timecount, $box_timecount_array);
    // print_r($result);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookTicket</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
            <h3>Book A Box</h3>
            <p>Please book your box</p>
          </div>
        </div>
        <form class="login-form" method="POST" action="bookingdetails.php">
           <input type="text" value="<?php  echo $box_name ?>" name="box_name_final" disabled="disabled"/>
           <input type="text" value="<?php  echo $box_location ?>" name="box_location_name" disabled="disabled"/>
           <input type="text" value="<?php echo $_SESSION["username"]?>" name="namedisp" disabled="disabled"/> 
           
          <div style=" font-size: 14px;margin: 0 0 15px;">
          <label for="number"  style="margin:15px 0 10px 0;"><b>Select Sports </b></label><br>
          <?php
          foreach($box_sportscount as $value)
            {
             
                ?>
                <input type="radio" style="margin-right:5px;margin-left:10px;" name="sports1" id="sports" value="<?php echo $value; ?>" required> 
                 <?php echo $value; ?>
                 <?php
              }
            
            ?>
            <div style=" font-size: 14px;margin: 0 0 15px;">
          <label for="number"  style="margin:15px 0 10px 0;"><b>Select Time </b></label><br>
          <?php
          if($result==$box_timecount)
          {?>
            <input type="text" value="<?php  echo $box_date ?>" name="box_date_final" disabled="disabled"/>
            </div>
            <h5>No Slot Available</h5>
            
            <!-- <button class="confirmButton"name="btn_ticket" disabled>Book</button> -->
            <?php
          }
          else
          {
            foreach($box_timecount as $value1)
            {
              // foreach($box_timecount_array as $value2)
              // {
                
                
                   ?>
                  
                  <input type="radio" style="margin-right:5px;margin-left:10px;"class="mychechbox"  name="boxtime" id="time" value="<?php echo $value1; ?>" <?php echo (in_array($value1, $box_timecount_array)?"disabled='disabled'":"") ?> required> <?php echo $value1; ?>
                  
                 <?php
                //  }
                
              }
              ?>
                  <input type="text" value="<?php  echo $box_date ?>" name="box_date_final" disabled="disabled"/>
                    </div>
                  
                  <button class="confirmButton"name="btn_ticket">Book</button>
              <?php
            }
            ?>
            <!-- <script>
                $(function(){
                  var dtToday = new Date();

                  var month = dtToday.getMonth() + 1;
                  var day = dtToday.getDate();
                  var year = dtToday.getFullYear();
                  if(month < 10)
                      month = '0' + month.toString();
                  if(day < 10)
                      day = '0' + day.toString();

                  var minDate= year + '-' + month + '-' + day;

                  $('#txtDate').attr('min', minDate);
              });
            </script> -->
             <!-- <input type="date"  name="date" id="txtDate" />  -->
             
          
        </form>
      </div>
</div>
</body>

</html>
