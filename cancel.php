<?php
include 'conn.php';
if(!isset($_SESSION))
{
   session_start();
}
$con=new connec();
$customer_name=$_SESSION["username"];
if(isset($_REQUEST["btn_cancel"]))
{
  $namecancel=$_SESSION["username"];
  $boxnamecancel1=$_SESSION["boxnamecancel"];
  $boxdatecancel1=$_SESSION['boxdatecancel'];
  $sqldelete="Delete from `bookingdetails` where customer_name='$namecancel' AND box_name='$boxnamecancel1' AND box_date=' $boxdatecancel1'";
  $con->deletesp($sqldelete,"Slot Canceled"); 
}
?>