<?php
    include "../conn.php";

    //admin update profile
    if(isset($_POST['student_update'])){

        $id = $_GET['id'];
        $sid = $_POST['sid'];
        $fn = $_POST['fn'];
        $mn = $_POST['mn'];
        $ln = $_POST['ln'];
        $yr = $_POST['yr'];
        $sec = $_POST['sec'];

        $email = $_POST['email'];
        $pass = $_POST['pass'];


        $getemail = mysqli_query($conn, "SELECT * FROM students WHERE id='$id'");
        while($row = mysqli_fetch_object($getemail)){
          $email1 = $row -> email;
        }

            if($email == $email1){

                $update = mysqli_query($conn, "UPDATE students SET school_id='$sid', fn='$fn',mn='$mn', ln='$ln',
                yr_level='$yr',section='$sec',
                email='$email', password='$pass' WHERE id='$id'");

                ?>  
                <script>
                    alert("Account Successfully updated!");
                    window.location.href="index.php";
                </script>
                <?php
            }else{
                $update = mysqli_query($conn, "UPDATE students SET school_id='$sid', fn='$fn',mn='$mn', ln='$ln',
                yr_level='$yr',section='$sec',
                email='$email', password='$pass' WHERE id='$id'");

                ?>  
                <script>
                    alert("Email updated! Please Login again!");
                    window.location.href="../logout.php";
                </script>
                <?php
        }

    }




    //codes for set modules

    if(isset($_POST['set_mod'])){

        if(empty($_POST['subject_code'])){
            ?>  
            <script>
                alert("Check box must not be empty!");
                window.location.href="set_mod.php";
            </script>
            <?php

        }else{
            $sid = $_POST['sid'];

            $subject=$_POST['subject_code'];
            $subj_num = count($subject);
            $stat = "Pending";
            $date = " ";
            $encode_by = " ";

            for($i=0; $i < $subj_num; $i++){
             
                //validate
                $val = mysqli_query($conn, "SELECT * FROM modules_to_get WHERE subject_code='$subject[$i]' AND stud_id_num='$sid'");
                $val_num = mysqli_num_rows($val);

                if($val_num == 1){
                    ?>
                    <script>
                        alert("There are some subjects have been set!");
                        window.location.href='set_mod.php';
                    </script>
                    <?php
                }else{

                $insert = mysqli_query($conn, "INSERT INTO modules_to_get 
                VALUES('0','$sid','$subject[$i]','$stat','$date','$encode_by')");

                if ($insert==TRUE){
                        ?>
                        <script>
                            alert("Modules Set Successfully!");
                            window.location.href='my_mod.php';
                        </script>
                        <?php
                    }else{
                        ?>
                        <script>
                            alert("Error in submission!");
                            window.location.href='set_mod.php';
                        </script>
                        <?php
                    }
                    
                }
            }
               
        }

                

    }

    ?>