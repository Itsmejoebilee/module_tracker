<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="img/">


  <title>MODULE TRACKER PRO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="index.html">MODULE TRACKER PRO</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">HOME</a></li>
          <li><a class="text-white" role="button" data-bs-toggle="offcanvas" data-bs-target="#AdminLogin" aria-controls="AdminLogin">LOG IN AS ADMIN</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>MODULE TRACKER PRO</h1>
            <div>
              <a class="btn-get-started scrollto" role="button" data-bs-toggle="offcanvas" data-bs-target="#StudentLogin" aria-controls="StudentLogin">Log in as Student</a>
              <a class="btn-get-started scrollto" role="button" data-bs-toggle="modal" data-bs-target="#RegisterModal">Register</a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/logo.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
<!-- End Contact Section -->

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

<!-- Offcanvas log in for Admin-->
  <div class="offcanvas offcanvas-end bg-dark <?php if (isset($_SESSION['set'])) { echo $_SESSION['set']; unset ($_SESSION['set']);}?>" data-bs-backdrop="static" tabindex="-1" id="AdminLogin" aria-labelledby="AdminLoginLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white" id="AdminLoginLabel">Login as Admin</h5>
        <button type="button" class="btn btn-default text-white mx-2" data-bs-dismiss="offcanvas" aria-label="Close"> CLOSE </button>
      </div>
    <div class="offcanvas-body">
      <div class="log-logo"><img src="images/logo.png" class="rounded mx-auto d-block pb-2" height="150" width="150"></div>

        <form method="POST" action="process.php">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="example" name="email" required>
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" required>
            <span  hidden="hidden" class="fa fa-fw field-icon ps-toggle fa-eye" style="position: absolute; right: 15px; transform:translate(0, -50%); top: 50%; cursor: pointer;" id="icon"></span>
            <label for="floatingPassword">Password</label>
          </div>

          <div class="text-start mb-3">
          <a href="">Forget Password</a>
          </div>
          <div class="d-grid gap-2">
            <input class="btn btn-success" type="submit" name="adminLogin">
          </div>
        </form>
      </div>
  </div>




  <!-- Offcanvas for Student -->
  <div class="offcanvas offcanvas-end <?php if (isset($_SESSION['student_set'])) { echo $_SESSION['student_set']; unset ($_SESSION['student_set']);}?>" data-bs-backdrop="static" tabindex="-1" id="StudentLogin" aria-labelledby="StudentLoginLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="StudentLoginLabel">Login as Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
    <div class="offcanvas-body">
      <div class="log-logo"><img src="images/logo.png" class="rounded mx-auto d-block pb-2" height="150" width="150"></div>

      <form method="POST" action="process.php">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="example" name="email" value="<?php if (isset($_SESSION['student_id'])) { echo $_SESSION['student_id']; unset($_SESSION['student_id']);}?>" required>
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingStudentPassword" placeholder="Password" name="pass" required>
          <span  hidden="hidden" class="fa fa-fw field-icon studentps-toggle fa-eye" style="position: absolute; right: 15px; transform:translate(0, -50%); top: 50%; cursor: pointer;" id="studentIcon"></span>
          <label for="floatingPassword">Password</label>
        </div>

        <div class="text-start mb-3">
        <a href="">Forget Password</a>
        </div>
          <div class="d-grid gap-2">
            <input class="btn btn-success" type="submit" name="studentLogin" value="LOGIN">
          </div>
      </form>
    </div>
  </div>

  
  <!-- Modal for Accounts Registration -->
  <div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="RegisterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="RegisterModalLabel"><img src="images/logo.png" alt="" height="50" width="50">Register</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="process.php" enctype="multipart/form-data">

        <div class="row">
              <div class="col-6">
                  <div class="form-floating mt-3">
                      <input for="floatingSchoolID" type="file" class="form-control" accept=".jpg, .png, .jfif, .gif, .webp, .jpeg"
                       name="pic" id="schoolID" required>
                  </div>
              </div>
        

              <div class="col-6">
                  <div class="form-floating mt-3">
                      <input for="floatingSchoolID" type="text" class="form-control" placeholder="School ID" 
                      name="schoolID" id="schoolID" required>
                      <label class="form-text" id="floatingSchoolID">School ID</label>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-4">
                  <div class="form-floating mt-3">
                      <input for="floatingFname" class="form-control" type="text" name="fn" placeholder="First Name" required>
                      <label class="form-text" id="floatingfname">First Name</label>
                  </div>
              </div>
              <div class="col-4">
                  <div class="form-floating mt-3">
                      <input for="floatingMname" class="form-control" type="text" name="mn" placeholder="Middle Name" required>
                      <label class="form-text" id="floatingMname">Middle Name</label>
                  </div>
              </div>
              <div class="col-4">
                  <div class="form-floating mt-3">
                      <input for="InputLname" class="form-control" type="text" name="ln" placeholder="Last Name" required>
                      <label class="form-text" id="InputLname">Last Name</label>
                  </div>
              </div>
          </div>

          <div class="row mt-3">
              <div class="col-4">
                <select class="form-select form-select pb-3 pt-3" name="course" id="course" aria-label="Select Course">
                  <option selected>Select Course</option>
                  <option value="Information Technology">BSIT</option>

                </select>
              </div>
              <div class="col-4">
                <select class="form-select form-select pb-3 pt-3" name="yl" id="yl" aria-label="Select Year Level">
                  <option selected>Select Year Level</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
              <div class="col-4">
                  <div class="form-floating">
                      <input for="InputSection" class="form-control" type="text" name="section" placeholder="Section" required>
                      <label class="form-text" id="InputSection">Section</label>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col">
                  <div class="form-floating mt-3">
                      <input type="email" class="form-control" for="floatingEmail" placeholder="name@gmail.com" 
                      aria-describedby="emailHelp" name="email" id="email" required>
                      <label class="form-text" id="floatingEmail">Email address</label>
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>         
              </div>
          </div>

          <div class="row">
              <div class="col">
                  <div class="form-floating mt-3">
                      <input for="InputPassword" class="form-control" type="password" name="pass" id="password" placeholder="Password" required>
                      <label class="form-text" id="InputPassword">Password</label>
                      <div class="" id="password-label">

                      </div>
                  </div>
              </div>
             
          </div>
          <div class="form-check mb-2 mt-1">
          <input class="form-check-input showPassword" type="checkbox">
          <label class="form-check-label">
          Show Password
          </label>
          </div>
          <!-- Checkbox for showing inputed password -->
          <script>
                  var toggle = document.querySelector('.showPassword');
                  var adPassword = document.querySelector('#password');
                  var adCpassword = document.querySelector('#cpassword');

                  toggle.addEventListener("click", handleToggleClick, false);

                  function handleToggleClick(event) {
                  if (this.checked) {
                      console.warn("Change input 'type' to: text")
                      adPassword.type = 'text';
                      adCpassword.type = 'text';
                  }else{
                      console.warn("Change input 'type' to: password")
                      adPassword.type = 'password';
                      adCpassword.type = 'password';
                  }
                  }
              </script>

          <div class="container text-center">
          <div class="row ">
              <div class="col">
                  <input class="d-grid gap-2 col-10 mx-auto btn btn-success mt-3" type="submit" name="registerBtn" id="registerBtn" value="Register">
              </div>
              <div class="col">
                  <a class="d-grid gap-2 col-10 mx-auto btn btn-success mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel Registration</a>
              </div>
                
          </div>
          </div>

              <hr class="my-4">
              <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- SweetAlert Notification Prompt Code -->
  <script src="admin/js/sweetalert.min.js"></script>
        <?php
            if (isset($_SESSION['status'])){
        ?>
            <script>
                swal({
                title: "<?php echo $_SESSION['status']; ?>",
                text: "<?php echo $_SESSION['status_text']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "<?php echo $_SESSION['status_btn']; ?>",
            });
            </script>
            
            <?php
            unset($_SESSION['status']);
            }
        ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

  <!-- Show Password Login on offcanvas for ADMIN -->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#floatingPassword").keyup(function(){
          var input = $(this).val();

          let element = document.getElementById("icon");
          let hidden = element.getAttribute("hidden");

          if (input == null || input == "") {
            element.setAttribute("hidden", "hidden");
          } 
            else{
            element.removeAttribute("hidden");
          }
      });
    });
  </script>

  <script>
    const passwordToggle = document.querySelector('.ps-toggle');
    const ps = document.querySelector('#floatingPassword');
    passwordToggle.addEventListener('click', function (e) {
      const type = ps.getAttribute('type') === 'password' ? 'text' : 'password';
      ps.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
  </script>

<!-- Show Password Login on offcanvas for Student -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#floatingStudentPassword").keyup(function(){
        var input = $(this).val();

        let element = document.getElementById("studentIcon");
        let hidden = element.getAttribute("hidden");

        if (input == null || input == "") {
          element.setAttribute("hidden", "hidden");
        } 
          else{
          element.removeAttribute("hidden");
        }
    });
  });
  </script>

  <script>
    const studentpsToggle = document.querySelector('.studentps-toggle');
    const studentps = document.querySelector('#floatingStudentPassword');
    studentpsToggle.addEventListener('click', function (e) {
      const type = studentps.getAttribute('type') === 'password' ? 'text' : 'password';
      studentps.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
  </script>
  

<!-- Password Validator for Registration-->
<script type="text/javascript">
    $(document).ready(function(){
        $("#password").keyup(function(){
            var password = $(this).val();
            var passwordBox = document.getElementById("password");
            var label = document.getElementById("password-label");

            // Validations
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&_-]"); //Special Character.

            var passed = 0;

            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test(password)) {
                passed++;
                }
            }
            //Password Length.
            if (password.length >= 8 && passed == 4) {
                var passed = 5;
            }

            //Progress Bar
            switch (passed) {
                case 0:
                    
                case 1:
                    
                case 2:
                        passwordBox.classList = "form-control border border-danger"
                        label.classList = "form-label fs-6 text-danger";
                        label.innerHTML = "Strenght: Weak";
                    break;
                case 3:
                        passwordBox.classList = "form-control border border-warning"
                        label.classList ="form-label fs-6 text-warning";
                        label.innerHTML = "Strenght: Medium";
                    break;
                case 4:
                        passwordBox.classList = "form-control border border-primary"
                        label.classList ="form-label fs-6 text-primary";
                        label.innerHTML = "Strenght: Strong";
                    break;
                case 5:
                        passwordBox.classList = "form-control is-valid"
                        label.classList ="form-label fs-6 text-success";
                        label.innerHTML = "Strenght: Very Strong";
                    break;
                default:
                    break;
            }
            
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#cpassword").keyup(function(){
            var cPassword = $(this).val();
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("cpassword");
            var label = document.getElementById("Cpassword-label");

            if (cPassword == null || cPassword == "") {
                
            }
            else if (cPassword == password) {
               confirmPassword.classList="form-control is-valid";
                label.innerHTML = "Password matched!";
                label.classList = "form-label fs-6 text-success";
                document.getElementById("registerBtn").type = "submit";


            }else{
                confirmPassword.classList="form-control is-invalid";
                label.innerHTML = "Password Do not matched!";
                label.classList = "form-label fs-6 text-danger";
                document.getElementById("registerBtn").type = "button";
            }
        });
    });
</script>

<!-- Email checker -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#username").keyup(function(){
            var input = $(this).val();

            // console.log(input);
            
            if (input == null || input == "") {
                document.getElementById('user-label').setAttribute("hidden", "hidden");
            }else{
                document.getElementById('user-label').removeAttribute("hidden");
                $.ajax({
                url: 'unique_username.php',
                type: "POST",
                data: {input:input},
                success: function (res) {
                    $('#user-label').html(res);
                }
                })
            }

        });
    });
</script>
</body>
</html>