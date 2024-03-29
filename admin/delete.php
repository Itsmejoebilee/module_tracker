<?php
    include "../conn.php";

    $id = $_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM modules WHERE id='$id'");

        if($delete == true){

            ?>  
            <script>
            alert("Module Successfully Deleted!");
            window.location.href="index.php";
           </script>
           <?php

        }else{
            ?>  
            <script>
            alert("Error in Deleting!");
            window.location.href="index.php";
           </script>
           <?php
            
        }




?>