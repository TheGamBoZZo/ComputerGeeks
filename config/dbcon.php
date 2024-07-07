<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "CTME";

    //Creating the database connection
    $con = mysqli_connect($host,$username,$password,$database);

    //Checking the databse connection
    if(!$con)
    {
        die("Connection failed:". mysqli_connect_error());
    }



?>