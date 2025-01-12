<?php
  include "../conn.php";

  if(empty($_SESSION)){
    ?>
       <script>
             alert("Session Expired! Please Login!");
            window.location.href="../index.php";
        </script>
    <?php
  }else{
    $email = $_SESSION['email'];

    //getname
    $getname = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
    while($row = mysqli_fetch_object($getname)){
      $fn = $row -> fname;
      $ln = $row -> lname;
      $email = $row -> email;
      $pass = $row -> password;
      $id = $row -> id;

      $admin = $fn.' '.$ln;

    }

    $getsem = mysqli_query($conn,"SELECT * FROM sem_sy WHERE id='1'");
    while($row1 = mysqli_fetch_object($getsem)){
      $sem = $row1 -> sem;
      $sy = $row1 -> sy;
    }

  

    //get total modules for 1st yr
    $get_mod1 = mysqli_query($conn,"SELECT * FROM modules WHERE year_level='1'");
      $s1=0;
      while($r = mysqli_fetch_array($get_mod1)){
        for($i = 0; $i < count($r['quantity']); $i++ ){
          $s1 += $r['quantity'];
        }
     }

     //get total modules for 2nd yr
    $get_mod2 = mysqli_query($conn,"SELECT * FROM modules WHERE year_level='2'");
    $s2=0;
      while($r2 = mysqli_fetch_array($get_mod2)){
        for($z = 0; $z < count($r2['quantity']); $z++ ){
          $s2 += $r2['quantity'];
      }
     }


     //get total modules for 3rd yr
    $get_mod3 = mysqli_query($conn,"SELECT * FROM modules WHERE year_level='3'");
    $s3=0;
      while($r3 = mysqli_fetch_array($get_mod3)){
        for($y = 0; $y < count($r3['quantity']); $y++ ){
          $s3 += $r3['quantity'];
      }
     }

     //get total modules for 4th yr
    $get_mod4 = mysqli_query($conn,"SELECT * FROM modules WHERE year_level='4'");
    $s4=0;
      while($r4 = mysqli_fetch_array($get_mod4)){
        for($x = 0; $x < count($r4['quantity']); $x++ ){
          $s4 += $r4['quantity'];
      }
     }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $fn.' '.$ln; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">ModuleTrackerPro</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" 
          data-bs-toggle="dropdown">
            <img src="../upload/admin.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $fn.' '.$ln; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $fn.' '.$ln; ?></h6>
              <span>ADMIN</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center"
               data-bs-toggle="modal" data-bs-target="#admin_profile"
               href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center"
               href="../logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- admin Modal -->
<div class="modal fade" id="admin_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="adminprocess.php?id=<?php echo $id; ?>" method="POST">

        <label>First Name </label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="fn" required value="<?php echo $fn; ?>">
        </div></p>

        <label>Last Name </label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="ln" required value="<?php echo $ln; ?>">
        </div></p>

        <label>Email</label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input type="email" class="form-control" name="email" required value="<?php echo $email; ?>">
        </div></p>

        <label>Password</label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
          <input type="text" class="form-control" name="pass" required value="<?php echo $pass; ?>">
        </div></p>


      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" name="admin_update" value="UPDATE">
      </div>

      </form>
    </div>
  </div>
</div>




  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-search"></i><span>Search</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

         
          <li>
            <a href="mod_search.php" >
              <i class="bi bi-person"></i><span>Modules</span>
            </a>
          </li>
          
          <li>
            <a href="all_list.php">
              <i class="bi bi-book"></i><span>All List</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->

      
      
      <!-- side nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-bs-toggle="modal" data-bs-target="#sem_sy">
          <i class="bi bi-bookmark-star"></i>
          <span>Set SEM and SY</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" 
        href="" data-bs-toggle="modal" data-bs-target="#add_modules">
          <i class="bi bi-journal-check"></i>
          <span>Add Modules</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="recieved_mod.php">
          <i class="bi bi-journal-text"></i>
          <span>Recieved Modules</span>
        </a>
      </li>

    


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1> Module Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><?php echo $sem; ?> | SY-<?php echo $sy;?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- search bar -->
    <section class="section dashboard">
        <div class="container">
                <div class="col-sm-12">
                    <form action="mod_search.php" method="POST">
                    
                    <div class="input-group">
                    <select class="form-select" id="inputGroupSelect04" required name="module">
                        <option value="" >Select Module . . .</option>

                        <?php 
                            $get_mod = mysqli_query($conn, "SELECT * FROM modules ORDER BY subject_code ASC");
                            while($row = mysqli_fetch_array($get_mod)){
                            
                        ?>

                        <option value="<?php echo $row['subject_code'];?>"><?php echo $row['subject_code'];?></option>

                     <?php } ?>

                    </select>
                    <input  class="btn btn-success" type="submit" name="search" value="SEARCH">
                    </div>

                    </form>
                </div>



            <?php 

                if(isset($_POST['search'])){
                    $module = $_POST['module'];

                    $val_module = mysqli_query($conn, "SELECT * FROM modules_to_get WHERE subject_code='$module'");
                    $mod_num = mysqli_num_rows($val_module);

                    if($mod_num <=0 ){
                        ?>  
                                <script>
                                    alert("No Records Found!");
                                    window.location.href="mod_search.php";
                                </script>
                            <?php
                    }else{

                    

                    ?>

                           
            <!-- Recent modules table-->
            <div class="col-12 mt-5">
                <div class="card-body">
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Profile</th>
                        <th scope="col">Subject Code</th>
                        <th scope="col">Student's Name</th>
                        <th scope="col">Year Level</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date Recieved</th>
                        <th scope="col">Encoded By</th>

                      </tr>
                    </thead>
                 
                      
                           <tbody>
                       

                        
                        <?php 
                          $get_modules = mysqli_query($conn, "SELECT * FROM modules_to_get WHERE subject_code='$module' ORDER BY date_get ASC");
                          while($mod_row = mysqli_fetch_array($get_modules)){

                            $ssid = $mod_row['stud_id_num'];

                            $getdet = mysqli_query($conn, "SELECT * FROM students WHERE school_id='$ssid'");
                            while($srow = mysqli_fetch_object($getdet)){
                                $fn = $srow -> fn;
                                $ln = $srow -> ln;
                                $pic = $srow -> profile;
                                $yl = $srow -> yr_level;



                            }

                          
                        ?>
                         <tr>
                         <td><img src="../upload/<?php echo $pic;?>" class="rounded" width="80px" height="80px"></td>
                        <td><?php echo $mod_row['subject_code'];?></td>
                        <td><?php echo $fn.' '.$ln;?></td>
                        <td><?php echo $yl;?></td>
                        <td><?php echo $mod_row['status'];?></td>
                        <td><?php echo $mod_row['date_get'];?></td>
                        <td><?php echo $mod_row['encoded_by'];?></td>

                       
                        </tr>
                        
                        <?php } ?>
                        
                        </tbody>

                     
                  </table>
                </div>
            </div><!-- end table-->



                    <?php
                }
            }
                                
            ?>


        </div>

       


    </section>


  </main><!-- End #main -->


  <!-- Modals -->

  <!--Modal add modules -->
<div class="modal fade" id="add_modules" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Modules</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="adminprocess.php" method="POST">

        <div class="row">
          <label>Subject Code </label></br>
          <div class="col">
            <input type="text" class="form-control" placeholder="Subject Code" required name="sc">
          </div></p>

          <label>Subject Title  </label></br>
          <div class="col">
            <input type="text" class="form-control" placeholder="Subject Title" required name="st">
          </div>
        </p>


        <label>Year Level </label></br>
        <div class="input-group">
        <select class="form-select" required name="yl">
            <option value="">--Select--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>

          </select>
        </div></p>

        
        <label>Quantity</label></br>
          <div class="col">
            <input type="number" class="form-control" placeholder="Quantity" required name="qt">
          </div>
        </div></p>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" name="add_mod" value="ADD">
      </div>

      </form>
    </div>
  </div>
</div>

  <!--Modal sem sy -->
<div class="modal fade" id="sem_sy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set Sem and SY</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="adminprocess.php" method="POST">

        <label>Semester </label></br>
        <div class="input-group">
        <select class="form-select" required name="mysem">
            <option value="">--Select--</option>
            <option value="1st Sem">1st Sem</option>
            <option value="2nd Sem">2nd Sem</option>
          </select>
        </div></p>

        <label>School Year </label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-2-circle-fill"></i></span>
          <input type="text" class="form-control" name="sy" required placeholder="School Year">
        </div></p>


      </div>
      <div class="modal-footer">
        <input type="reset" class="btn btn-primary" value="CLEAR">
        <input type="submit" class="btn btn-success" value="SET" name="sem">
      </div>

      </form>

    </div>
  </div>
</div>










  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-top:120px;">
    <div class="copyright">
      &copy; Copyright <strong><span>ModuleTrackerPro</span></strong>. All Rights Reserved 2024
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">CITE STUDENTS</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>