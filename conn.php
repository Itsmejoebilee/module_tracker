<?php

    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn, "mod_tracker");
    
    session_start();
    date_default_timezone_set('Asia/Manila');
    $date= date('Y-m-d');
?>