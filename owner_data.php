<?php

include 'conn.php';
$con=new connec();
if(!isset($_SESSION))
{
   session_start();
}
if( empty($_SESSION["owner_email"])||$_SESSION["owner_email"]==null)
{
    echo '<script> alert(" Please Login First"); window.location.href = "login.php"; </script>';
    
}
include 'owner_navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .styled-table 
    {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr 
    {
    background-color: #328f8a;
    background-image: linear-gradient(45deg,#328f8a,#08ac4b);
    color: #ffffff;
    text-align: left;
    }   
    .styled-table th,
    .styled-table td
    {
    padding: 12px 15px;
    }
    .styled-table tbody tr 
    {
    border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
    }
    .styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
    }
    </style>    
</head>
<body>
<table class="styled-table">
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>Sports Selected</th>
            <th>Time Selected</th>
            <th>Box Location</th>
            <th>Box Date</th>
            <th>Booking Date</th>
            <th>Payment Status</th>

        </tr>
    </thead>
    <tbody>
    <?php
    $box_name_owner=$_SESSION['owner_boxname'];
    
            $result=$con->select_ownerdata("bookingdetails",$box_name_owner);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                       ?>
                       <form method="POST" action="">
                        <tr>
                        <?php $_SESSION["customer_id"]=$row["id"];?>
                        <td><?php  echo $row["customer_name"];  $_SESSION["customer_name"]=$row["customer_name"];?></td>
                        <td><?php  echo $row["box_sports_selected"];$_SESSION["box_sports_selected_admin"]=$row["box_sports_selected"]; ?></td>
                        <td><?php  echo $row["box_time_selected"];$_SESSION["box_time_selected_admin"]=$row["box_time_selected"]; ?></td>
                        <td><?php  echo $row["box_location"];$_SESSION["box_location_admin"]=$row["box_location"]; ?></td>
                        <td><?php  echo $row["box_date"]; $_SESSION["box_date_admin"]=$row["box_date"];?></td>
                        <td><?php  echo $row["date_time"]; ?></td>
                        <td><?php  echo $row["Payment_Status"];$_SESSION["payment_status_admin"]=$row["Payment_Status"]; ?></td>
                        <!-- <td><input type="button" class='btn btn-primary btn-sm' name="btn_edit" value="Edit"></td> -->
                        
                        <!--  -->
                        
                         </tr>
                    </form>
                         
                    
                        <?php
                        // $_SESSION["box_name"]=$row["box_name"];
                        // $_SESSION["box_location"]=$row["box_location"];
                    }
                }
                

            ?>
       
        <!-- and so on... -->
    </tbody>
</table>
</body>
</html>
<?php


include 'owner_footer.php';

?>