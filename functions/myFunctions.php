<?php
// session_start();
include('../config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);

}
function getAllS($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);

}

function getByID($table,$id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id = '$id'";
    return $query_run = mysqli_query($con, $query);

}

function getByIDS($table,$id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id = '$id'";
    return $query_run = mysqli_query($con, $query);

}

// function getAllActive($table)
// {
//     global $con;
//     $query = "SELECT * FROM $table WHERE status ='0' ";
//     return $query_run = mysqli_query($con, $query);

// }

function getAllOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '0' ";
    return $query_run = mysqli_query($con, $query);

}
function getOrderHistory()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status != '0' ";
    return $query_run = mysqli_query($con, $query);

}

function getAppointment()
{
    global $con;
    $query = "SELECT * FROM booking ";
    return $query_run = mysqli_query($con, $query);

}
function getAppointmentHistory()
{
    global $con;
    $query = "SELECT * FROM booking ";
    return $query_run = mysqli_query($con, $query);

}

function checkTrackingNoValid($trackingNo)
{
    global $con;
    $query = "SELECT * FROM orders WHERE tracking_no = '$trackingNo'";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url,$message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}
function getUserInfo()
{
    global $con;
    $query = "SELECT * FROM users ";
    return $query_run = mysqli_query($con, $query);

}

?>
  <script src="assets/js/jquery-3.7.0.min.js" ></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>

  <script src= "https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="assets/js/custom.js"></script>

  <!-- Alertify Javascripts-->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <!--This is the alertifying message that will display -->
  <script>
    <?php 
    if(isset($_SESSION['message']))
      {
        ?>
            alertify.set('notifier','position', 'top-right');
            alertify.success('<?= $_SESSION['message']; ?>');
            <?php 
            unset($_SESSION['message']);
      }   
        ?>
  </script>