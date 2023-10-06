<?php
session_start();
include('./db_connection.php');

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
  header('Location: ./login.php');
} elseif (isset($_POST['submit'])) {
  $userId = $_POST['userid'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirmpassword'];

  if ($password === $confirm_password) {
    $sql =  $connection->prepare('SELECT * FROM users WHERE id = ? AND user_email = ?');
    $sql->bind_param('is', $userId, $email);
    $sql->execute();
    $result = $sql->get_result();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
      if ($result->num_rows > 0) {
        $insertion_sql = $connection->prepare('INSERT INTO admin_users (email, password, type) VALUES (?, ?, ?)');
        $type = 1;
        $insertion_sql->bind_param('ssi', $email, $hashed_password, $type);
        $insertion_sql->execute();
        if ($insertion_sql->affected_rows > 0) {
          echo '<script>alert("Subadmin Added.")</script>';
        } else {
          echo '<script>alert("An error Orrcured while Creating an Subadmin.")</script>';
        }
      } else {
        echo '<script>alert("No User Exist With the given Email or User Id.")</script>';
      }
    } else {
      echo '<script>alert("Permission Denied, you don\'t have the access rights to do this action.")</script>';
      header('Location: ./login.php');
    }
  } else {
    echo '<script>alert("Password and Confirm Password doesn\'t match")</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Add Subadmin</title>
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
    <div class="card loginFormContainer">
      <div class="card-body">
        <h5 class="card-title">Login</h5>
        <form class="row g-3" method="post" action="<?php echo ($_SERVER['PHP_SELF']); ?>">
          <div class="col-12">
            <label for="inputNanme4" class="form-label">User Id</label>
            <input type="number" name="userid" class="form-control" id="inputNanme4" required>
          </div>
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
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
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