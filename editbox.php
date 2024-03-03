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

if(isset($_POST["btn_deletebox"]))
{
    $boxname=$_POST["boxname"];
    $boxlocation=$_POST["boxlocation"];

    $result=$conn->select_addnewbox("box",$boxname);
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        if($row["box_name"]==$boxname && $row["box_location"]==$boxlocation)
        {  
            $sql="DELETE FROM `box` WHERE `box_name`='$boxname' && `box_location`='$boxlocation'";
            $conn->delete($sql,"Deleted Successfully");  
        }   
    }
}




include 'owner_navbar.php';






?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title> Login </title>




<style>
</style>
</head>
<body>
    
<section class="mt-5" >
        <h3 class="text-center"style="color: #328f8a;" > Your Box </h3>
        <div class="container">
            <div class="row">
            <?php
            $result=$conn->select_box("box",$_SESSION['owner_boxname']);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                       ?>
                       
                         <div class="col-md-3" style="font-size:14px; ">
                         <form method="POST" action="">
                            <img src=" <?php  echo $row["box_banner"]; ?>" style="width:100%;height:250px;margin-top:15px;" name="box_banner"/>
                            <input type="text"  style="border:0;outline:0;background-color: white;height:50px;margin-top:15px;font-size:25px;align:center;" name="boxname" value="<?php  echo $row["box_name"]; ?>" disabled/>
                            <input type="hidden"  style="border:0;outline:0;background-color: white;height:50px;margin-top:15px;font-size:25px;align:center;" name="boxname" value="<?php  echo $row["box_name"]; ?>" />

                            <input type="text" style="border:0;outline:0;background-color: white;margin-top:15px;margin-bottom:10px;width:100%" name="box_sports" value="<?php  echo $row["box_sports"];?>" disabled/> 
                            <input type="hidden" style="border:0;outline:0;background-color: white;margin-top:15px;margin-bottom:10px;width:100%" name="box_sports" value="<?php  echo $row["box_sports"];?>" />

                            <input type="text" style="border:0;outline:0;background-color: white;margin-top:15px;margin-bottom:15px;width:100%" name="boxlocation" value="<?php  echo $row["box_location"];?>" disabled/>
                            <input type="hidden" style="border:0;outline:0;background-color: white;margin-top:15px;margin-bottom:15px;width:100%" name="boxlocation" value="<?php  echo $row["box_location"];?>" />

                            <textarea type="text" style="border:0;outline:0;background-color: white;margin-top:15px;margin-bottom:15px;width:100%" name="box_time"  disabled>Time : <?php  echo $row["box_time"];?></textarea>
                            <input type="hidden" style="border:0;outline:0;background-color: white;margin-top:15px;margin-bottom:15px;width:100%" name="box_time" value="Time : <?php  echo $row["box_time"];?>" />
 
                            
                            <button name="btn_edit" style="border-radius:5px;font-size:25px;background-color: #328f8a; color: white; width:100%;" formaction="editingbox.php">Edit Box Information</button><br><br>
                            <button name="btn_deletebox" style="border-radius:5px;font-size:25px;background-color: #328f8a; color: white; width:100%;" formaction="editbox.php">Remove Box</button>
                            
                            </form>                         
                        </div>
                    
                        <?php
                        
                    }
                }
                

            ?>
                
            </div>
        </div>
</section>


</body>
</html>
<?php
include 'footer.php';


?>
