<?php
session_start();    
// create connection
$conn = mysqli_connect('localhost', 'root', '', 'venty');

// check connection
if (!$conn) {    
    die('Connection failed: ' . mysqli_connect_error());
}

//grab form data 
$startDate = $_POST['start_date'];
$exStartTime = $_POST['ex_start_time'];
$acStartTime = $_POST['ac_start_time'];
$exEndTime = $_POST['ex_end_time'];
$acEndTime = $_POST['ac_end_time'];
$eventType = $_POST['type'];
$eventName = $_POST['name'];
$season = $_POST['season'];
$accessType = $_POST['event_access_type'];
$location = $_POST['location'];
$capacity = $_POST['capacity'];
$attendance = $_POST['attendance'];
$streamAttendance = $_POST['stream_attendance'];


if(isset($_SESSION['organiser'])){
    $organiser_id = $_SESSION['organiser'];
}
//     $organiser_query = "SELECT company FROM organiser WHERE organiser_id = $organiser_id";
//     $result = mysqli_query($conn,$organiser_query);
//     if($result){
//         $row = mysqli_fetch_assoc($result);
//         $company = $row['company'];
//     }
//     else{
//         die("ERROR: Could not able to execute  $organiser_query. " . mysqli_error($conn));
//     }


//Query to insert form values into database
// if(isset($_POST['create_event'])){
    $sql = "INSERT INTO Events (Event_Date, Expected_start_time, Actual_start_time, 
    Expected_end_time, Actual_end_time, Event_Type, Event_Name, Season, 
    Ticketed, Event_location, Event_capacity, Attendance_level, Streamer_level, 
    Organiser_id) VALUES ('$startDate','$exStartTime','$acStartTime', '$exEndTime','$acEndTime',
    '$eventType','$eventName', '$season','$accessType','$location','$capacity','$attendance'
    ,'$streamAttendance','$organiser_id')"; 

    $results = mysqli_query($conn, $sql);

    if($results){
        echo "<script> alert('Event Succfully Created')</script>";
    }
    
    else{
        die("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
    }

// }

//create an interface the user will see after event is created
echo '<a href="adminhome.php">Home</a><br><br>';
mysqli_close($conn);

    
    
?>