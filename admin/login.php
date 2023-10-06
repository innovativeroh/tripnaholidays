<?php
session_start();
include('./db_connection.php');

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = $connection->prepare('SELECT * FROM admin_users WHERE email = ?');
  $sql->bind_param('s', $email);
  $sql->execute();

  $result = $sql->get_result();  // Get the result of the query

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      if ($row['type'] == 0) {
        $_SESSION['admin'] = true;
      } elseif ($row['type'] == 1) {
        $_SESSION['subadmin'] = true;
      }
      $_SESSION['logged_in'] = true;
      $_SESSION['email'] = $row['email'];
      session_set_cookie_params(3600);
      session_start();
      header('Location: ./users.php');
    } else {
      echo "<script>alert('Invalid Credentials, Try Again!')</script>";
    }
  } else {
    echo "<script>alert('No User Found With Specified Email, Please Try Again!')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login Tripna Holidays</title>
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


  <!-- my style.css  -->
  <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
  <div class="MainContainer">
    <div class="card">
      <div class="card-body">
        <h5 class="custom_login_heading">Login to <span class="custom_login_heading_gradient">Tripna Holidays</span></h5>
        <form class="row g-3" method="post" action="<?php echo ($_SERVER['PHP_SELF']); ?>">
          <div class="col-12">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" required>
          </div>
          <div class="col-12">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4" required>
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="custom_login_button">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Scripts -->
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