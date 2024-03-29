<?php
    session_start();
    session_destroy();
?>

    <script>
        alert("Logout Successfull!");
        window.location.href="index.php";
    </script>