<?php 
class connec
{
    public $username="root";
    public $password="";
    public $usename="";
    public $db_name="project1";
   
    public $conn;
    
    function __construct()
    {
        $this->conn=new mysqli($this->usename,$this->username,$this->password,$this->db_name);
       
        if($this->conn->connect_error)
        {
            die("Connection Failed");
        }
    }
    function insert($query,$msg)
    {
       if( $this->conn->query($query)===TRUE)
       {
        echo '<script> alert("'.$msg.' "); </script>';
       // echo "Inserted";
       }   
       else{
        echo '<script> alert("'.$this->conn->error.'"); </script>';
       // echo $this->conn->error;
       }
    }
    function update($query,$msg)
    {
       if( $this->conn->query($query)===TRUE)
       {
        echo '<script> alert("'.$msg.' "); </script>';
       // echo "Inserted";
       }   
       else{
        echo '<script> alert("'.$this->conn->error.'");window.location.href = "Home.php"; </script>';
       // echo $this->conn->error;
       }
    }
    function delete($query,$msg)
    {
       if( $this->conn->query($query)===TRUE)
       {
        echo '<script> alert("'.$msg.' "); </script>';
       // echo "Inserted";
       }   
       else{
        echo '<script> alert("'.$this->conn->error.'"); </script>';
       // echo $this->conn->error;
       }
    }
    function delete_for_new_box_request($query)
    {
       if( $this->conn->query($query)===TRUE)
       {
       // echo "Inserted";
       }   
       else{
        echo '<script> alert("'.$this->conn->error.'"); </script>';
       // echo $this->conn->error;
       }
    }

    function deletesp($query,$msg)
    {
       if( $this->conn->query($query)===TRUE)
       {
        echo '<script> alert("'.$msg.' . Your Refund will be Credited to your account within 4 working days "); window.location.href = "Home.php";</script>';
       // echo "Inserted";
       }   
       else{
        echo '<script> alert("'.$this->conn->error.'"); </script>';
       // echo $this->conn->error;
       }
    }
    function select_all($tablename)
    {
        $sql="Select * from $tablename";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_login($tablename,$email)
    {
        $sql="Select * from $tablename where email='$email'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_fortime($tablename,$date,$name)
    {
        $sql="Select box_time_selected from $tablename where box_date='$date' and box_name='$name'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_adminlogin($tablename,$email)
    {
        $sql="Select * from $tablename where admin_email='$email'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_ownerlogin($tablename,$email)
    {
        $sql="Select * from $tablename where owner_email='$email'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_userregistration($tablename,$email)
    {
        $sql="select * from $tablename where email='$email'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_ownerregistration($tablename,$owner_email)
    {
        $sql="select * from $tablename where owner_email='$owner_email'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_box($tablename,$box)
    {
        $sql="select * from $tablename where box_name='$box'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_addnewbox($tablename,$boxname)
    {
        $sql="Select * from $tablename where box_name='$boxname'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_ownerdata($tablename,$box_name)
    {
        $sql="Select * from $tablename where Payment_Status='Completed' AND box_name='$box_name'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_admindata($tablename)
    {
        $sql="Select * from $tablename where Payment_Status='Completed'";
        $result=$this->conn->query($sql);
        return $result;
    }
    
    function select($tablename,$id)
    {
        $sql="Select * from $tablename where id=$id";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_username($tablename,$username)
    {
        $sql="Select * from $tablename where customer_name='$username' AND Payment_Status='Completed'";
        $result=$this->conn->query($sql);
        return $result;
    }
    function getData($query) {
        $result = mysqli_query($this->conn, $query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }		
        if(!empty($resultset))
            return $resultset;
	}
    function get_search($searchvalue)
    {
       $sql="SELECT * FROM box WHERE FIND_IN_SET('$searchvalue', box_location) > 0";
       $result=$this->conn->query($sql);
        return $result;
    }
    function select_all_withLocation($tablename,$latitude,$longitude)
    {
        $sql="SELECT * FROM $tablename WHERE (6371 * ACOS(COS(RADIANS($latitude)) * COS(RADIANS(latitude)) * COS(RADIANS(longitude) - RADIANS($longitude)) + SIN(RADIANS($latitude)) * SIN(RADIANS(latitude)))) <= 1";
        $result=$this->conn->query($sql);
        return $result;
    }
}
    

?>