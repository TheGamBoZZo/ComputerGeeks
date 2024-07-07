<?php 
session_start();

include('../config/dbcon.php');
include('../functions/myFunctions.php');

if(isset($_SESSION['auth'])) {
    if(isset($_POST['submitBookingTime'])) {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $pNumber = $_POST['pNumber'];
        $service_time = $_POST['service_time'];
        $date = date('y-m-d',$_POST['date']);
        $service_type = $_POST['service_name'];
        error_log("Date: " . $date);

        // Check if the date format is correct
        if (DateTime::createFromFormat('Y-m-d', $date) !== false) {
            $insertB_query = "INSERT INTO booking (user_id, name, pNumber, service_time, date, service_type)
                              VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $con->prepare($insertB_query);
            $stmt->bind_param("ssssss", $user_id, $name, $pNumber, $service_time, $date, $service_type);
            
            if($stmt->execute()) {
                redirect("../appointments.php", "Booking Added Successfully Boss");
            } else {
                redirect("../appointments.php", "Something went wrong");
            }
            
            $stmt->close();
        } else {
            redirect("../appointments.php", "Invalid date format");
        }
    }
} else {
    header('Location: ../index.php');
}
?>
