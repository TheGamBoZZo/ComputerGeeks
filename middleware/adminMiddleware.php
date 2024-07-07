<?php 

include('../functions/myFunctions.php');

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    {
        redirect("../index.php","You arent allowed to access this due to authorization rights");
    }
}
else
{
    redirect("../login.php","Login to continue");

}




?>