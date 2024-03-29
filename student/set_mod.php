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
    $getname = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");
    while($row = mysqli_fetch_object($getname)){

      $id = $row -> id;
      $fn = $row -> fn;
      $mn =  $row -> mn;
      $ln = $row -> ln;
      $pic = $row -> profile;
      $sid = $row -> school_id;
      $yr = $row -> yr_level;
      $section = $row -> section;
      $pass = $row -> password;

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

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../upload/<?php echo $pic;?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $fn.' '.$ln; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $fn.' '.$ln; ?></h6>
              <span>Student</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" 
              data-bs-toggle="modal" data-bs-target="#student_profile"
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



  <!-- student Modal -->
  <div class="modal fade" id="student_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student's Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="studentprocess.php?id=<?php echo $id; ?>" method="POST">

        <label>School ID </label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="sid" required value="<?php echo $sid; ?>">
        </div></p>

        <label>First Name </label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="fn" required value="<?php echo $fn; ?>">
        </div></p>

        <label>Middle Name </label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="mn" required value="<?php echo $mn; ?>">
        </div></p>


        <label>Last Name </label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="ln" required value="<?php echo $ln; ?>">
        </div></p>

        <label>Year Level </label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="yr" required value="<?php echo $yr; ?>">
        </div></p>

        <label>Section</label></br>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="sec" required value="<?php echo $section; ?>">
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
        <input type="submit" class="btn btn-success" name="student_update" value="UPDATE">
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
        <a class="nav-link collapsed" href="set_mod.php">
        <i class="bi bi-bookmarks"></i>
         <span>Set Modules</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="my_mod.php">
        <i class="bi bi-journals"></i>
         <span>View My Modules</span>
        </a>
      </li>

     
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Set Modules</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><?php echo $sem; ?> | SY-<?php echo $sy;?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <p class="text-danger">Note: Please check the subjects base on your RF. </p>

        <div class="mt-1" >
            <form action="studentprocess.php" method="POST"> 
            <div class="row mb-2">

                <div class="col-sm-12">
                     <div class="input-group mb-3 border border-success rounded">
                        <span class="input-group-text" id="basic-addon1">Student Id number</span>
                        <input type="text" class="form-control" name="sid" value="<?php echo $sid; ?>" readonly required>
                    </div>
                </div>
            </div>

            <div class="container row">

            <h5><u>Select Subjects:</u> </h5>
            <?php
                $getsubj= mysqli_query($conn,"SELECT * FROM modules ORDER BY subject_code ASC");
                while($row_mod = mysqli_fetch_array($getsubj)){
            ?>
                <div class="col-sm-3 mb-3">
                    <input class="form-check-input border border-success" type="checkbox" name="subject_code[]"  
                    value="<?php echo $row_mod['subject_code'];?>" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?php echo $row_mod['subject_code'];?>
                    </label>
                </div>
                <?php } ?>
            </div>

            <div class="d-flex justify-content-center mt-5">
                <input type="submit" name="set_mod" value="SUBMIT" class="btn btn-primary mt-3 border border-dark" style="width:200px;">
                
            </div>

            </form>
        </div>
    </section>


  </main><!-- End #main -->


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