<?php
error_reporting(E_ERROR | E_PARSE);
include 'conn.php';
include 'admin_navbar.php';
if(!isset($_SESSION))
{
   session_start();

}
$conn=new connec();
if(isset($_POST["btn_edit"]))
{
    $customer_id=$_POST["customer_id"];
    $customer_name_admin=$_POST["customer_name"];
    $box_name_admin_edit=$_POST["box_name_admin"];
    $box_sports_selected_admin_edit=$_POST["box_sports_selected_admin"];
    $box_time_selected_admin_edit=$_POST["box_time_selected_admin"];
    $box_location_admin_edit=$_POST["box_location_admin"];
    $box_date_admin_edit=$_POST["box_date_admin"];
    $payment_status_admin_edit=$_POST["payment_status_admin"];
}
//$conn=new connec();

if(isset($_POST["btn_edited"]))
{
    $customer_id1=$_POST["customer_id"];
    $customer_name_edited1=$_POST["customer_name_edited"];
    $box_name_admin_edited1=$_POST["box_name_admin_edited"];  
    $box_selected_sports_edited1=$_POST["box_selected_sports_edited"];
    $box_selected_time_edited1=$_POST["box_selected_time_edited"];
    $box_location_edited1=$_POST["box_location_edited"];
    $box_date_edited1=$_POST["box_date_edited"];
    $payment_status_edited1=$_POST["payment_status_edited"];
    $sql2="UPDATE `bookingdetails` SET `box_sports_selected`='$box_selected_sports_edited1',`box_time_selected`='$box_selected_time_edited1' WHERE `id`= '$customer_id1'";
    $conn->insert($sql2,"Data Edited");
    echo '<script>window.location.href = "admin_data.php"; </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit</title>
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
            <h3>Edit Booking Details</h3>
            
          </div>
        </div>

        
      
        
        <form class="login-form" method="POST" action="admin_edit.php">
           
            <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"/>
            <input type="text" disabled name="customer_name_edited" value="<?php echo $customer_name_admin; ?>"/>
            <input type="text" disabled name="box_name_admin_edited" value="<?php echo $box_name_admin_edit;?>"/>
            <input type="text" name="box_selected_sports_edited" value="<?php echo $box_sports_selected_admin_edit;  ?>" placeholder="Enter selected sports"/>
            <input type="text" name="box_selected_time_edited" value="<?php echo $box_time_selected_admin_edit;  ?>"placeholder="Enter new selected _time"/>
            <input type="text" disabled name="box_location_edited" value="<?php echo $box_location_admin_edit;  ?>"/>
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
            <!-- <input type="date" id="txtD ate" value="" name="box_date_edited" placeholder="Enter new box bookind date"/> -->
           

            <!-- <select name="payment_status_edited">
                <option value="Completed">Completed</option>
                <option value="Incompleted" selected>Incomplete</option>
            </select> -->
             

          
          
          
          <button name="btn_edited">Edit</button>
          
        </form>
      </div>
</div> 
</body>
</html>
<?php
include 'admin_footer.php';
?>