<?php
session_start();
include('./db_connection.php');

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
  header('Location: ./login.php');
} else {
  $sql =  $connection->prepare('SELECT * FROM passports');
  $sql->execute();
  $result = $sql->get_result();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- my style.css -->
  <link rel="stylesheet" href="./assets/style.css">

</head>

<body>
  <?php include('./header_sidebar.php') ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="title_flex_box">
                <h5 class="card-title">Datatables</h5>
                <?php
                // if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                //   echo '<div class="title_flex_box" style="gap: 10px;">
                //     <a href="./add_subadmin.php" class="custom_link">Create SubAdmin</a>
                //     <a href="./delete_user.php" class="custom_link">Delete User</a>
                //   </div>';
                // } elseif (isset($_SESSION['subadmin']) && $_SESSION['subadmin'] === true) {
                //   echo '<a href="./delete_user.php" class="custom_link">Delete User</a>';
                // }
                ?>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Passport Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Place of Birth</th>
                    <th scope="col">Pass Expiry Date</th>
                    <th scope="col">Address 1</th>
                    <th scope="col">Address 2</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Pincode</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Conn</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $passport_number = $row['passport_number'];
                      $name = $row['name'];
                      $surname = $row['surname'];
                      $gender = $row['gender'];
                      $date_of_birth = $row['date_of_birth'];
                      $place_of_birth = $row['place_of_birth'];
                      $pass_expiry_date = $row['pass_expiry_date'];
                      $address_1 = $row['address_1'];
                      $address_2 = $row['address_2'];
                      $city = $row['city'];
                      $state = $row['state'];
                      $pincode = $row['pincode'];
                      $mobile = $row['mobile'];
                      $email = $row['email'];
                      $conn = $row['conn'];
                      $status = $row['status'];

                      echo '<tr>
                        <td>' . $passport_number . '</td>
                        <td>' . $name . '</td>
                        <td>' . $surname . '</td>
                        <td>' . $gender . '</td>
                        <td>' . $date_of_birth . '</td>
                        <td>' . $place_of_birth . '</td>
                        <td>' . $pass_expiry_date . '</td>
                        <td>' . $address_1 . '</td>
                        <td>' . $address_2 . '</td>
                        <td>' . $city . '</td>
                        <td>' . $state . '</td>
                        <td>' . $pincode . '</td>
                        <td>' . $mobile . '</td>
                        <td>' . $email . '</td>
                        <td>' . $conn . '</td>
                        <td>' . $status . '</td>
                      </tr>';
                    }
                  } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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