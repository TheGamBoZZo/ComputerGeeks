<?php

// session_start();

include('config/dbcon.php');


function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status ='0' ";
    return $query_run = mysqli_query($con, $query);

}

function getAllActiveS()
{
    global $con;
    $query = "SELECT * FROM services ";
    return $query_run = mysqli_query($con, $query);

}

function getAllTrending()
{
    global $con;
    $query = "SELECT * FROM products WHERE trending ='1' ";
    return $query_run = mysqli_query($con, $query);

}


function getSlugActive($table,$slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug ='$slug' AND status='0' LIMIT 1 ";
    return $query_run = mysqli_query($con, $query);

}

function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id ='$category_id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);

}

function getIDActive($table,$id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id = '$id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);

}

function getCartItems()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid , c.prod_id , c.prod_qty , p.id as pid , p.name , p.image , p.selling_price 
                FROM carts c, products p
                WHERE c.prod_id = p.id AND c.user_id = '$userId' 
                ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}

function getOrders()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE user_id = '$userId' ORDER BY id ASC";
    return $query_run = mysqli_query($con , $query);
}
function getAppointment()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM booking WHERE user_id = '$userId' ORDER BY id ASC";
    return $query_run = mysqli_query($con , $query);
}

function checkTrackingNoValid($trackingNo)
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE tracking_no = '$trackingNo' AND user_id = '$userId' ";
    return $query_run = mysqli_query($con, $query);
}

// function getOrderDetails($tracking_no) // ill do this later
// {
//     global $con;
//     $userId = $_SESSION['auth_user']['user_id'];

//     $order_query = "SELECT o.id as oid, o.tracking_no , o.user_id , oi * ,p.* FROM orders o , order_items oi,
//     products p WHERE o.user_id = '$userId' AND oi.order_id = o.id AND p.id = oi.prod_id AND o.tracking_no = '$tracking_no' ";
//     return $order_query_run = mysqli_query($con, $order_query);
//}

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
if(isset($_POST['add_viewed_btn']))
{
    $username = $_POST['username'];


    $cate_query = "INSERT INTO users 
    (name,ID)
    VALUES ('$name','$ID')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        redirect("index.php","Category Added Successfull Boss");
    }
    else
    {
        redirect("index.php","Something went wrong");
    }


}

// function getDate()
// {
//     global $con;
//     $query = "SELECT * FROM users ";
//     return $query_run = mysqli_query($con, $query);
// }


?>
