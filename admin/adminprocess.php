<?php
    include "../conn.php";

    //admin update profile
    if(isset($_POST['admin_update'])){

        $id = $_GET['id'];

        $fn = $_POST['fn'];
        $ln = $_POST['ln'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];


        $getemail = mysqli_query($conn, "SELECT * FROM admin WHERE id='$id'");
        while($row = mysqli_fetch_object($getemail)){
          $email1 = $row -> email;
        }

            if($email == $email1){

                $update = mysqli_query($conn, "UPDATE admin SET fname='$fn', lname='$ln',
                email='$email', password='$pass' WHERE id='$id'");

                ?>  
                <script>
                    alert("Account Successfully updated!");
                    window.location.href="index.php";
                </script>
                <?php
            }else{
                $update = mysqli_query($conn, "UPDATE admin SET fname='$fn', lname='$ln',
                email='$email', password='$pass' WHERE id='$id'");

                ?>  
                <script>
                    alert("Email updated! Please Login again!");
                    window.location.href="../logout.php";
                </script>
                <?php
            }


    }




    //sem
    if(isset($_POST['sem'])){

        $sem = $_POST['mysem'];
        $sy = $_POST['sy'];
        $id = 1;

      

        $update1 = mysqli_query($conn, "UPDATE sem_sy SET sem='$sem', sy='$sy' WHERE id='$id'");

            if($update1 == true){
                ?>  
                <script>
                    alert("Semester and SY Set Successfully!");
                    window.location.href="index.php";
                </script>
                <?php

            }else{
                ?>  
                <script>
                    alert("Error Occur!");
                    window.location.href="index.php";
                </script>
                <?php
            }

            
    }   



    //add modules
    if(isset($_POST['add_mod'])){

        $sc = $_POST['sc'];
        $st = $_POST['st'];
        $yl = $_POST['yl'];
        $qt =$_POST['qt'];


        $check_sc = mysqli_query($conn, "SELECT * FROM modules WHERE subject_code='$sc'");
        $num_sc = mysqli_num_rows($check_sc);

        while($row = mysqli_fetch_object($check_sc)){
            $real_quantity = $row -> quantity;
        }


            if($num_sc <= 0){
                    $insert =mysqli_query($conn,"INSERT INTO modules
                    VALUES('0','$sc','$st','$yl','$qt')");

                            if($insert == true){
                                ?>  
                                <script>
                                    alert("Module Added!");
                                    window.location.href="index.php";
                                </script>
                                <?php
                            }else{
                                ?>  
                                <script>
                                    alert("Error in Adding!");
                                    window.location.href="index.php";
                                </script>
                                <?php
                            }

            }else{

                //validate if exist
                $validate=mysqli_query($conn, "SELECT * FROM modules WHERE subject_code='$sc' and 
                subject_title='$st' and year_level='$yl'");
                
                $val_num=mysqli_num_rows($validate);
                
                if($val_num >= 1){

                                $total = $qt + $real_quantity;

                                $update = mysqli_query($conn, "UPDATE modules SET quantity='$total' WHERE 
                                subject_code='$sc' AND subject_title='$st'");

                                if($update == true){
                                    ?>  
                                    <script>
                                        alert("Module Added!");
                                        window.location.href="index.php";
                                    </script>
                                    <?php
                                }else{
                                    ?>  
                                    <script>
                                        alert("Error in Adding!");
                                        window.location.href="index.php";
                                    </script>
                                    <?php
                                }
                        }else{
                            ?>  
                            <script>
                                alert("Error in Adding! Please Provide Proper Details!");
                                window.location.href="index.php";
                            </script>
                            <?php
                        }
        }

    }



    //recieved modules
    if(isset($_POST['stud_mod_save'])){

        if(empty($_POST['sub'])){
            ?>  
            <script>
                alert("Check box must be set First!");
                window.location.href="recieved_mod.php";
            </script>
            <?php

        }else{

                $sid = $_POST['sid'];
                $subject=$_POST['sub'];
                $subj_num = count($subject);

                $stat = "Completed";
                $admin = $_POST['admin_name'];

                for($i=0; $i < $subj_num; $i++){

                    $update = mysqli_query($conn,"UPDATE modules_to_get SET status='$stat', date_get='$date', encoded_by='$admin'
                    WHERE stud_id_num='$sid' AND subject_code='$subject[$i]'");

                       
                                $get_mod_qty = mysqli_query($conn, "SELECT * FROM modules WHERE subject_code='$subject[$i]'");
                                while($row_mod = mysqli_fetch_object($get_mod_qty)){

                                    $s_name = $row_mod -> subject_code;
                                    $subj_qty = $row_mod -> quantity;
                                    $item = 1;

                                    $new_qty = $subj_qty - $item;

                                    $update_qty = mysqli_query($conn,"UPDATE modules SET quantity='$new_qty' WHERE 
                                    subject_code='$subject[$i]'");
                                    
                                }

                            if($update == true){
                                ?>  
                                <script>
                                    alert("Modules Recieved!");
                                    window.location.href="recieved_mod.php";
                                </script>
                                <?php
                            } else{
                                ?>  
                                <script>
                                    alert("Problem in Saving!");
                                    window.location.href="recieved_mod.php";
                                </script>
                                <?php
                            }
                           
                        }
                }
        }


?>