<?php
session_start();
include('./db_connection.php');

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
  header('Location: ./login.php');
} else {
  $sql =  $connection->prepare('SELECT * FROM admin_users');
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
      <h1>Admin Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item">Management</li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="title_flex_box">
                <h5 class="card-title">Admin</h5>
                <?php
                if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                  echo '<div class="title_flex_box" style="gap: 10px;">
                  <a href="#" onclick="openForm()" class="custom_link">Create SubAdmin</a>
                  </div>';
                }
                ?>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Created</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $userId = $row['id'];
                      $userEmail = $row['email'];
                      $dateCreated = $row['date_created'];
                      echo '
                      <tr class="custom_table_row">
                        <th scope="row">' . $userId . '</th>
                        <td>' . $userEmail . '</td>
                        <td>' . $dateCreated . '</td>
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
  <div class="pop_up_subadmin_add_form">
    <div class="formshadowDiv"></div>
    <div class="MainContainer add_subadmin_container">
      <div class="card loginFormContainer">
        <div class="card-body">
          <h5 class="card-title">Add Subadmin</h5>
          <form class="row g-3" method="post" action="./add_subadmin.php">
            <div class="col-12">
              <label for="inputEmail4" class="form-label">User Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail4" required>
            </div>
            <div class="col-12">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="inputPassword4" required>
            </div>
            <div class="col-12">
              <label for="inputPassword4" class="form-label">Comfirm Password</label>
              <input type="password" name="confirmpassword" class="form-control" id="inputPassword4" required>
            </div>
            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-primary">Add Subadmin</button>
              <button type="button" class="btn btn-danger" onclick="closeForm()">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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

  <script>
    const Form = document.querySelector('.pop_up_subadmin_add_form');
    const openForm = () => {
      Form.style.display = 'none';
    }
    const closeForm = () => {
      Form.style.display = 'block';
    }
  </script>

</body>

</html>