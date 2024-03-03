<?php

include 'conn.php';
$con=new connec();
if(!isset($_SESSION))
{
   session_start();
}
if( empty($_SESSION["adminname"])||$_SESSION["adminname"]==null)
{
    echo '<script> alert(" Please Login First"); window.location.href = "login.php"; </script>';
    
}
if(isset($_REQUEST["btn_reject"]))
{
  $box_name=$_POST["box_name"];
  $id=$_POST["id"];
  $sqldeleted="Delete from `box_request` where box_name='$box_name' AND id='$id'";
  $con->delete($sqldeleted,"Box Rejected Successfully"); 
}
if(isset($_REQUEST["btn_accept"]))
{
  $box_name=$_POST["box_name"];
  $id=$_POST["id"];
  $box_banner = $_POST["box_banner"];
  $box_location = $_POST["box_location"];
  $box_sports = $_POST["box_sports"];
  $box_time = $_POST["box_time"];
  $sqlinsert="INSERT INTO `box`(`box_name`, `box_banner`, `box_location`, `box_sports`, `box_time`) VALUES ('$box_name','$box_banner','$box_location','$box_sports','$box_time')";
  $con->insert($sqlinsert,"Box Approved Successfully"); 
  $sqldeleted="Delete from `box_request` where box_name='$box_name' AND id='$id'";
  $con->delete_for_new_box_request($sqldeleted); 
}

include 'admin_navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Box Request</title>
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
            <th>Box Name</th>
            <th>Box Banner</th>
            <th>Box Location</th>
            <th>Box Sports</th>
            <th>Box Time </th>
            <th>Accept</th>
            <th>Reject</th>
        </tr>
    </thead>
    <tbody>
    <?php
            $result=$con->select_all("box_request");
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                       ?>
                       <form method="POST">
                        <tr>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_name"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_banner"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_location"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_sports"]; ?>'/></td>
                            <td><input style="border:0;" type="text" disabled value='<?php  echo $row["box_time"]; ?>'/></td>
                        
                            <td><button class='btn btn-primary btn-sm' name="btn_accept" value="Delete" formaction="admin_newboxrequest.php">Approve</button></td>
                            <td><button class='btn btn-danger btn-sm' name="btn_reject" value="edit" formaction="admin_newboxrequest.php">Rejected</button></td>
                            
                            

                            <input type="hidden" name="id" value='<?php echo $row["id"];?>'/>
                            <input type="hidden" name="box_name" value='<?php  echo $row["box_name"]; ?>'/>
                            <input type="hidden" name="box_banner" value='<?php  echo $row["box_banner"]; ?>'/>
                            <input type="hidden" name="box_location" value='<?php  echo $row["box_location"]; ?>'/>
                            <input type="hidden" name="box_sports" value='<?php  echo $row["box_sports"]; ?>'/>
                            <input type="hidden" name="box_time" value='<?php  echo $row["box_time"]; ?>'/>
                            

                        
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
include 'admin_footer.php';
?>