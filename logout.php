<?php
session_start();

include("include/connection.php");

$user_name = $_SESSION['user_name'];


$update_msg = mysqli_query($con,"UPDATE user SET log_in='Offline' WHERE user_name='$user_name'");

session_unset();

session_destroy();
header('Location: signin.php');



?>