<?php
session_start();
include('./db_connection.php');

if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
  header('Location: ./login.php');
} else {
  $sql =  $connection->prepare('SELECT * FROM document');
  $sql->execute();
  $result = $sql->get_result();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Document Checklist - Tripnaholiday Admin Panel</title>
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
      <h1>Document Checklist</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Document Checklist</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="title_flex_box">
                <h5 class="card-title">List of Documents</h5>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Country</th>
                    <th scope="col">File</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result && $result->num_rows > 0) {
                      $userId = 0;
                    while ($row = $result->fetch_assoc()) {
                        $userId++;
                        $id = $row['id'];
                        
                        $sql2 =  $connection->prepare('SELECT * FROM conifg_country');
                        $sql2->execute();
                        $result2 = $sql2->get_result();

                        if ($result2 && $result2->num_rows > 0) {
                            while ($rows = $result2->fetch_assoc()) {
                              $country_name = $rows['country_name'];
                          }
                        }

                        $document = $row['document'];
                        $conn = $row['conn'];
                      echo '
                      <tr class="custom_table_row">
                        <th scope="row">' . $userId . '</th>
                        <td>' . $country_name . '</td>
                        <td>' . $document . ' : <a href="' . $document . '">→ View File</a></td>
                        <td class="icon_column">
                          <a href="./config_country_delete.php?id=' . $id . '">
                          <i class="bi bi-trash"></i>
                          </a>
                        </td>
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
    <?php
                        if(isset($_POST['add_country'])) {
                            $select_country = $_POST['select_country'];
                            $country_url = $_POST['country_url'];
                            $insertion_sql = $connection->prepare('INSERT INTO document (document, conn) VALUES (?, ?)');
                            $insertion_sql->bind_param('ss', $country_url, $select_country);
                            $insertion_sql->execute();
        if ($insertion_sql->affected_rows > 0) {
            echo "<meta http-equiv=\"refresh\" content=\"0; url=config_document.php\">";
            exit();
        } else {
            echo "Not Working!";
        }
                        }
                    ?>
              <!-- Basic Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Add Document+
              </button>
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Document</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action='config_document.php' method='POST'>
                    <div class="modal-body">
                    <span>Country</span>
                    <select name="select_country" class="form-control">
                    <?php
                            $sql2 =  $connection->prepare('SELECT * FROM conifg_country');
                            $sql2->execute();
                            $result2 = $sql2->get_result();
                            if ($result2 && $result2->num_rows > 0) {
                                $userId = 0;
                              while ($row = $result2->fetch_assoc()) {
                                  $userId++;
                                  $id = $row['id'];
                                  $countryName = $row['country_name'];
                                  $userActive = $row['active'];
                                echo "<option value='$id'>$countryName</option>";
                                }
                            }          
                        ?>
                    </select>
                    <br>
                    <span>File URL*</span>
                    <input type="text" class="form-control" placeholder="http://url.com/file.pdf" name="country_url" required="required">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="add_country" class="btn btn-primary">Add</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

  </main><!-- End #main -->

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