<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Academic Data management</title>

  <!-- Web Icon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/web_icon.png" />

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

  <!-- Date Picker -->
  <link rel="stylesheet" type="text/css" href="css/datepicker.css">

</head>

<body id="page-top">
  <?php 
  session_start();
  if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
  }
  ?>

  <?php
  // Create database connection using config file
  include_once("koneksi_db.php");

  // Fetch all mahasiswa from database
  $result_program_studi = mysqli_query($connection, "SELECT * FROM program_studi ORDER BY id_program_studi ASC");

  // Saveall mahasiswa to database
  if (isset($_POST['Submit'])) {
      $nrp = $_POST['nrp'];
      $nama_depan = $_POST['nama_depan'];
      $nama_belakang = $_POST['nama_belakang'];
      $alamat = $_POST['alamat'];
      $email = $_POST['email'];
      $tempat_lahir = $_POST['tempat_lahir'];
      $tanggal_lahir = $_POST['tanggal_lahir'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $agama = $_POST['agama'];
      $id_program_studi = $_POST['id_program_studi'];
      
      // Insert user into table
      $result = mysqli_query($connection, "INSERT INTO mahasiswa(nrp, nama_depan, nama_belakang, alamat, email,  tempat_lahir, tanggal_lahir, jenis_kelamin, agama, id_program_studi) VALUES('$nrp', '$nama_depan', '$nama_belakang', '$alamat', '$email', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin','$agama', '$id_program_studi')");

      header("Location: index.php");
  }

  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">ACDM</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#add-mahasiswa">Add Mahasiswa</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <!-- Contact Section -->
  <section class="page-section" id="add-mahasiswa">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Add Mahasiswa</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="add_mahasiswa.php" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>NRP</label>
                <input class="form-control" name="nrp" type="text" placeholder="Masukkan NRP" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nama Depan</label>
                <input class="form-control" name="nama_depan" type="text" placeholder="Masukkan Nama Depan" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nama Belakang</label>
                <input class="form-control" name="nama_belakang" type="text" placeholder="Masukkan Nama Belakang" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Tempat Lahir</label>
                <input class="form-control" name="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Tanggal Lahir</label>
                <input class="form-control datepicker" name="tanggal_lahir" type="text" placeholder="Masukkan Tanggal Lahir" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <label>Jenis Kelamin</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" checked>
                <label class="form-check-label">
                  Laki-Laki
                </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis_kelamin" value="P">
              <label class="form-check-label">
                Perempuan
              </label>
            </div>
            <div class="control-group">
              <div>
                <label>Agama</label>
                <select name="agama" class="form-control">
                  <option value="">-- Pilih Agama --</option>  
                  <option value="Islam">Islam</option>
                  <option value="Katolik">Katholik</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  </select>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div>
                <label>Program Studi</label>
                <select name="id_program_studi" class="form-control">
                  <option value="">-- Pilih Program Studi --</option>  
                  <?php
                    while($data_program_studi = mysqli_fetch_array($result_program_studi)) {
                      echo "<option value=".$data_program_studi['id_program_studi'].">".$data_program_studi['nama_program_studi']."</option>";
                    }
                  ?>
                </select>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div class="form-group">
              <input type="submit" name="Submit" value="Simpan" class="btn btn-primary btn-xl"></input>
              <a href="index.php" class="btn btn-secondary btn-xl">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

  <!-- Date Picker JS -->
  <script src="js/bootstrap-datepicker.js"></script>

  <script>
    $(function(){
       $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
      });
    });
  </script>

</body>

</html>
