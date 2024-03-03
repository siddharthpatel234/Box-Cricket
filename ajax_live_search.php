<?php
$search_value=$_REQUEST['search'];
include 'conn.php';
$con=new connec();
$result=$con->get_search($search_value);
$output='';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {


       $output.="<div class='col-md-3' style='font-size:14px;font-size:14px;border: 1px solid black;border-radius: 20px;background-color: whitesmoke;padding: 2rem; width:32%; margin-top:2rem;'>
            <form method='POST' action='bookticket.php'>
                <img src={$row['box_banner']} style ='width:100%;height:250px;margin-top:15px;' name ='box_banner' />
                <input type='text' style='border:0;outline:0;margin-top:15px;font-size:1.8rem;align:center; color: #8ac85e;' name='box_name' value={$row['box_name']} disabled />
                <input type='hidden' style='border:0;outline:0;margin-top:15px;font-size:25px;align:center; color: #8ac85e;' name='box_name' value={$row['box_name']} />

                <input type='text' style='border:0;outline:0;margin-top:15px;margin-bottom:10px;width:100%; font-size:1.1rem' name='box_sports' value={$row['box_sports']} disabled />
                <input type='hidden' style='border:0;outline:0;margin-top:15px;margin-bottom:10px;width:100%;' name='box_sports' value={$row['box_sports']} />

                <input type='text' style='border:0;outline:0;margin-top:15px;margin-bottom:15px;width:100%; font-size: 1.1rem; ' name='box_location' value='Location : {$row['box_location']}' disabled />
                <input type='hidden' style='border:0;outline:0;margin-top:15px;margin-bottom:15px;width:100%; ' name='box_location' value='Location :{$row['box_location']}'/>

                <input type='hidden' name='box_time' value={$row['box_time']} />
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
                <?php
                <input type='date' name='date' class='txtDate' style='margin-top:15px;margin-bottom:15px;width:100%; height:3rem; padding: 1rem;' required />
                <button class='fill' name='btn_bookticket' style='border-radius:8px;font-size:25px;background-color: #8ac85e; color: white; width:100%;'>Now Book Ticket </button>
            </form>
        </div>";

    }
    echo $output;
}

            
?>