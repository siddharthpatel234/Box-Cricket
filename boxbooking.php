<?php
include 'conn.php';
include 'navbar.php';
$con = new connec();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js">

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function handleOnload() {
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }

            function showPosition(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                // Redirect to PHP page passing coordinates
                window.location = "boxbooking.php?lat=" + latitude + "&long=" + longitude;
            }
            // Remove the event listener after it has been triggered once
            window.removeEventListener("load", handleOnload);
        }

        // Add onload event listener
        window.addEventListener("load", handleOnload);
    </script>
    <title>BOX Boooking</title>
    <style>
        .fill {
            background: #8ac85e;
            border: none;
            height: 3rem;
            color: white;
            filter: drop-shadow(0);
            font-weight: bold;
            transition: all .3s ease;
            color: white;
        }

        .fill:hover {
            transform: scale(1.05);
            border-color: rgba(255, 255, 255, 0.9);
            filter: drop-shadow(0 10px 5px rgba(0, 0, 0, 0.125));
            transition: all .3s ease;
        }

        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");




        .search {
            position: relative;
            box-shadow: 0 0 40px rgba(51, 51, 51, .1);

        }

        .search input {

            height: 60px;
            text-indent: 25px;
            border: 2px solid #d6d4d4;


        }


        .search input:focus {

            box-shadow: none;
            border: 2px solid blue;


        }

        .search .fa-search {

            position: absolute;
            top: 24px;
            left: 16px;

        }

        #btn_search {

            position: absolute;
            top: 5px;
            right: 5px;
            height: 50px;
            width: 110px;
            background: #8ac85e;
            align-items: center;
        }
    </style>
</head>

<body style="background: url('images/Bg_Image.jpg'); background-size: cover; background-repeat: no-repeat; background-size: cover;background-position: center;background-attachment: fixed;">
    <section>
        <form action="" method="post">
            <div class="container">

                <div class="row height d-flex justify-content-center align-items-center">

                    <div class="col-md-8">

                        <div class="search mt-3">
                            <i class="fa fa-search"></i>
                            <input type="text" id="txt_search" name="search_value" class="form-control" placeholder="Discover with ease">
                            <input id="btn_search" type="submit" class="btn btn-primary" name="btn_search" value="Search">
                        </div>

                    </div>

                </div>
            </div>
        </form>
        <!-- Search Result -->

        <!-- Search Result Over  -->
        <div class="container">
            <div class="row" style="justify-content: space-between;">
                <?php
                $latitude = $_GET['lat'];
                $longitude = $_GET['long'];
                if (isset($_POST['btn_search'])) {
                    $result = $con->get_search($_POST['search_value']);
                } else {
                    $result=$con-> select_all_withLocation("box",$latitude,$longitude);
                }
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $box_time = $row['box_time'];
                        $box_timecount = explode(",", $box_time);
                        $today = date("Y-m-d");
                        $box_date_database = $today;
                        $box_name_database = $row["box_name"];
                        $result1 = $con->select_fortime("bookingdetails", $box_date_database, $box_name_database);

                        if ($result1->num_rows > 0) {
                            $box_time_selected_array = array();
                            while ($row1 = $result1->fetch_assoc()) {
                                //  echo $row["box_time_selected"];
                                $box_time_selected_array[] = $row1["box_time_selected"];
                            }
                            $box_time_selected_array_string = implode(",", $box_time_selected_array);
                        }

                        $box_timecount_array = explode(",", $box_time_selected_array_string);

                        // print_r($box_timecount_array);
                        // print_r($box_timecount);
                        $i = 0;
                        $result1 = array_intersect($box_timecount, $box_timecount_array);
                ?>

                        <div class="col-md-3" style="font-size:14px;font-size:14px;border: 1px solid black;border-radius: 20px;background-color: whitesmoke;padding: 2rem; width:32%; margin-top:2rem;">
                            <form method="POST" action="bookticket.php">
                                <img src=" <?php echo $row["box_banner"]; ?>" style="width:100%;height:250px;margin-top:15px;" name="box_banner" />
                                <input type="text" style="border:0;outline:0;margin-top:15px;font-size:1.8rem;align:center; color: #8ac85e;" name="box_name" value="<?php echo $row["box_name"]; ?>" disabled />
                                <input type="hidden" style="border:0;outline:0;margin-top:15px;font-size:25px;align:center; color: #8ac85e;" name="box_name" value="<?php echo $row["box_name"]; ?>" />

                                <input type="text" style="border:0;outline:0;margin-top:15px;margin-bottom:10px;width:100%; font-size:1.1rem" name="box_sports" value="<?php echo $row["box_sports"]; ?>" disabled />
                                <input type="hidden" style="border:0;outline:0;margin-top:15px;margin-bottom:10px;width:100%;" name="box_sports" value="<?php echo $row["box_sports"]; ?>" />

                                <input type="text" style="border:0;outline:0;margin-top:15px;margin-bottom:15px;width:100%; font-size: 1.1rem; " name="box_location" value="Location : <?php echo $row["box_location"]; ?>" disabled />
                                <input type="hidden" style="border:0;outline:0;margin-top:15px;margin-bottom:15px;width:100%; " name="box_location" value="Location : <?php echo $row["box_location"]; ?>" />

                                <input type="hidden" name="box_time" value=" <?php echo $row["box_time"]; ?>" />
                                <script>
                                    $(function() {
                                        var dtToday = new Date();

                                        var month = dtToday.getMonth() + 1;
                                        var day = dtToday.getDate();
                                        var year = dtToday.getFullYear();
                                        if (month < 10)
                                            month = '0' + month.toString();
                                        if (day < 10)
                                            day = '0' + day.toString();

                                        var minDate = year + '-' + month + '-' + day;

                                        $('.txtDate').attr('min', minDate);
                                    });
                                </script>

                                <label for="number" style="margin:15px 0 10px 0;"><b>Select Time </b></label><br>
                                <?php
                                if ($result == $box_timecount) { ?>
                                    <input type="text" value="<?php echo $box_date ?>" name="box_date_final" disabled="disabled" />

                                    <h5>No Slot Available</h5>

                                    <!-- <button class="confirmButton"name="btn_ticket" disabled>Book</button> -->
                                    <?php
                                } else {
                                    foreach ($box_timecount as $value1) {
                                        // foreach($box_timecount_array as $value2)
                                        // {


                                    ?>

                                        <span style="margin-right:5px;margin-left:10px;" class="mychechbox">
                                            <input type="radio" name="boxtime" id="time" value="<?php echo $value1; ?>" <?php echo (in_array($value1, $box_timecount_array) ? "disabled='disabled'" : "") ?> style="display: none;" required>
                                            <label for="time" style="<?php echo (in_array($value1, $box_timecount_array) ? "display: none;" : "") ?>"><?php echo $value1; ?></label>
                                        </span>


                                <?php
                                        //  }

                                    }
                                }
                                ?>
                                <input type="date" name="date" class="txtDate" style="margin-top:15px;margin-bottom:15px;width:100%; height:3rem; padding: 1rem;" required />
                                <button class="fill" name="btn_bookticket" style="border-radius:8px;font-size:25px;background-color: #8ac85e; color: white; width:100%;">Now Book Ticket </button>
                            </form>
                        </div>

                <?php
                        // $_SESSION["box_name"]=$row["box_name"];
                        // $_SESSION["box_location"]=$row["box_location"];
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