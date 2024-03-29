<?php
    include "conn.php";
    

    //admin login
    if(isset($_POST['adminLogin'])){

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $check = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$pass'");
        $admin = mysqli_num_rows($check);

                if($admin <= 0 ){
                    ?>
                        <script>
                            alert("Wrong Email or Password!");
                            window.location.href="index.php";
                        </script>
                    <?php
                }else{
                    $_SESSION['email'] = $email; 
                    ?>
                    <script>
                        alert("Welcome Admin!");
                        window.location.href="admin/index.php";
                    </script>
                <?php
                }
    }



    //register
    if(isset($_POST['registerBtn'])){

        $picname = $_FILES['pic']['name'];
		$fileTmpName = $_FILES['pic']['tmp_name'];

        $schoolID = $_POST['schoolID'];
        $fn = $_POST['fn'];
        $mn = $_POST['mn'];
        $ln = $_POST['ln'];
        $course = $_POST['course'];
        $yl= $_POST['yl'];
        $section = $_POST['section'];
        $email= $_POST['email'];
        $pass = $_POST['pass'];
        $stat = "NEW";


        //validate
        $val = mysqli_query($conn, "SELECT * FROM students WHERE school_id='$schoolID' AND email='$email'");
        $num = mysqli_num_rows($val);

         if($num <= 0){
                
                $insert = mysqli_query($conn, "INSERT INTO students 
                VALUES('0','$schoolID','$picname','$stat','$fn','$mn','$ln','$course','$yl','$section','$email','$pass')");

                    if($insert == TRUE){
                        $fileDestination = 'upload/'.$picname;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        
                        ?>
                            <script>
                                alert("Successfully Registered!");
                                window.location.href="index.php";
                            </script>
                        <?php


                    }else{
                        ?>
                        <script>
                            alert("Error in Inserting!");
                            window.location.href="index.php";
                        </script>
                    <?php

                    }


         }else{
            ?>
            <script>
                alert("Account Already Registered!");
                window.location.href="index.php";
            </script>
        <?php
         }

    }


    //student login
    if(isset($_POST['studentLogin'])){

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $check = mysqli_query($conn, "SELECT * FROM students WHERE email='$email' AND password='$pass'");
        $check_num = mysqli_num_rows($check);

            if($check_num >= 1){
                $_SESSION['email'] = $email;
                ?>
                    <script>
                        alert("Login Successfully!");
                        window.location.href="student/index.php";
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("Wrong Email or Password!");
                        window.location.href="index.php";
                    </script>
                <?php
            }
    }

?>