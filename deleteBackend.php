<?php 
//consider security for id by researching html encrytption instead of ? id =1
include_once('databaseClass.php');

class delete_event{

public $event_id;

public function __construct($event_id){
    
    $this->event_id = $event_id;
    
    $sql = "DELETE * FROM Events WHERE Event_ID = '$event_id'";

    
    $db = new DatabaseClass ();

    $db->connect();
    // $conn = mysqli_connect('localhost', 'root', '', 'venty');
    
    // // check connection
    // if (!$conn) {    
    //     die('Connection failed: ' . mysqli_connect_error());
    // }
    
    // $delete = mysqli_query($conn, $sql);
    $delete = $db->query_executed($sql);

    if($delete){  
        echo "<script>window.location.href='deleteFeedback.php';</script>";
    }

    else{
        //echo "<script>window.location.href='adminhome.php';</script>";
        //Error Page
        die('Connection failed: ' . mysqli_connect_error());
        
    }
    
}   

}


?>