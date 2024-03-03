<?php

include 'conn.php';
$con=new connec();
if(!isset($_SESSION))
{
   session_start();
}
if( empty($_SESSION["adminname"])||$_SESSION["adminname"]==null)
{
    echo '<script> alert(" Please Login First"); window.location.href = "adminlogin.php"; </script>';
    
}
include 'admin_navbar.php';
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
    padding: 12px 12px;
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
            <th>Box Name</th>
            <th>Sports Selected</th>
            <th>Time Selected</th>
            <th>Box Location</th>
            <th>Box Date</th>
            <th>Booking Date</th>
            <th>Payment Status</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php
            $result=$con->select_admindata("bookingdetails");
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {

                        $date1 = date('Y-m-d');
                        $date2 = $row["box_date"];
                        if(strtotime($date1) <= strtotime($date2))
                        {
                       ?>
                       <form method="POST">
                        <tr>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["customer_name"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_name"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_sports_selected"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_time_selected"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_location"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_date"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["date_time"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["Payment_Status"]; ?>'/></td>
                            <td><button class='btn btn-primary btn-sm' name="btn_edit" value="edit" formaction="admin_edit.php">Edit</button></td>
                            <td><button class='btn btn-danger btn-sm' name="btn_delete" value="Delete" formaction="admin_data.php">Delete</button></td>
                            

                            <input type="hidden" name="customer_id" value='<?php echo $row["id"];?>'/>
                            <input type="hidden" name="customer_name" value='<?php  echo $row["customer_name"]; ?>'/>
                            <input type="hidden" name="box_name_admin" value='<?php  echo $row["box_name"]; ?>'/>
                            <input type="hidden" name="box_sports_selected_admin" value='<?php  echo $row["box_sports_selected"]; ?>'/>
                            <input type="hidden" name="box_time_selected_admin" value='<?php  echo $row["box_time_selected"]; ?>'/>
                            <input type="hidden" name="box_location_admin" value='<?php  echo $row["box_location"]; ?>'/>
                            <input type="hidden" name="box_date_admin" value='<?php  echo $row["box_date"]; ?>'/>
                            <input type="hidden" name="date_time_admin" value='<?php  echo $row["date_time"]; ?>'/>
                            <input type="hidden" name="payment_status_admin" value='<?php  echo $row["Payment_Status"]; ?>'/>
                            

                        
                        </tr>
                    </form>
                         
                    
                        <?php
                        }
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

$con=new connec();
if(isset($_REQUEST["btn_delete"]))
{
  $customer_name_delete=$_POST["customer_name"];
  $customer_id=$_POST["customer_id"];
  $sqldeleted="Delete from `bookingdetails` where customer_name='$customer_name_delete' AND id='$customer_id'";
  $con->delete($sqldeleted,"Data Deleted"); 
}


include 'admin_footer.php';

?>






    