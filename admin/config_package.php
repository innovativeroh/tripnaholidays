<?php
session_start();
include('./db_connection.php');
if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
  header('Location: ./login.php');
} else {
  $sql =  $connection->prepare('SELECT * FROM config_list_charges');
  $sql->execute();
  $result = $sql->get_result();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Packages - Tripnaholiday Admin Panel</title>
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
      <h1>All Packages</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Package</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="title_flex_box">
                <h5 class="card-title">Listed Packages</h5>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Visa Type</th>
                    <th scope="col">Process Type</th>
                    <th scope="col">Stay Duration</th>
                    <th scope="col">Visa Validity</th>
                    <th scope="col">Amount Per Traveller</th>
                    <th scope="col">Our Fees</th>
                    <th scope="col">Embassey Fees</th>
                    <th scope="col">Covid Insurance</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                    $userId = 0;
                      while ($row = $result->fetch_assoc()) {
                        $userId++;
                        $id = $row['id'];
                        $visa_type = $row['visa_type'];
                        $process_time = $row['process_time'];
                        $stay_duration = $row['stay_duration'];
                        $visa_validity = $row['visa_validity'];
                        $amount_per_traveller = $row['amount_per_traveller'];
                        $our_fees = $row['our_fees'];
                        $embassey_fees_18 = $row['embassey_fees_18'];
                        $covid_insurance = $row['covid_insurance'];
                        if($covid_insurance == '1') {
                            $covid_insurance = "Yes";
                        } else {
                            $covid_insurance = "No";
                        }

                        echo '<tr class="custom_table_row">
                        <th scope="row">' . $userId . '</th>
                        <td>'.$visa_type.'</td>
                        <td>'.$process_time.' Days</td>
                        <td>'.$stay_duration.' Days</td>
                        <td>'.$visa_validity.' Days</td>
                        <td>Rs. '.$amount_per_traveller.'</td>
                        <td>Rs. '.$our_fees.'</td>
                        <td>Rs. '.$embassey_fees_18.'</td>
                        <td>Rs. '.$covid_insurance.'</td>
                    </tr>';
                    }
                }
                    ?>
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
                            $countryName = $_POST['country_name'];
                            $insertion_sql = $connection->prepare('INSERT INTO conifg_country (country_name, symbol_code, active) VALUES (?, ?, ?)');
                            $symbol = 0;
                            $active = 1;
                            $insertion_sql->bind_param('sii', $countryName, $symbol, $active);
                            $insertion_sql->execute();
        if ($insertion_sql->affected_rows > 0) {
            echo "<meta http-equiv=\"refresh\" content=\"0; url=config_country.php\">";
            exit();
        } else {
            echo "Not Working!";
        }
                        }
                    ?>
              <!-- Basic Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Add More +
              </button>

              
              <?php
                      if(isset($_POST["add_package"])) {
                        $pack_country = @$_POST['pack_country'];
                        $visa_type = @$_POST['visa_type'];
                        $process_time = @$_POST['process_time'];
                        $stay_duration = @$_POST['stay_duration'];
                        $visa_validity = @$_POST['visa_validity'];
                        $amount_per_traveller = @$_POST['amount_per_traveller'];
                        $our_fees = @$_POST['our_fees'];
                        $embassey_fees = @$_POST['embassey_fees'];
                        $covid_insurance = @$_POST['covid_insurance'];
                        $title = "null";
                        $embassey_fees_none = "0";
                        $insertion_sql = $connection->prepare('INSERT INTO `config_list_charges`(`visa_type`, `title`, `process_time`, `stay_duration`, `visa_validity`, `amount_per_traveller`, `our_fees`, `embassey_fees_18`, `embassey_fees_18p`, `embassey_fees_75`, `covid_insurance`, `connect`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
                        $insertion_sql->bind_param('ssssssssssss', $visa_type, $title, $process_time, $stay_duration, $visa_validity, $amount_per_traveller, $our_fees, $embassey_fees, $embassey_fees_none, $embassey_fees_none, $covid_insurance, $pack_country);
                        $insertion_sql->execute();
    if ($insertion_sql->affected_rows > 0) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=config_package.php\">";
        exit();
    } else {
        echo "Not Working!";
    }
                      }
                      
                    ?>

              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Package</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action='config_package.php' method='POST'>
                    <div class="modal-body">
                    <span>Country Name*</span>
                    <select name="pack_country" class="form-control">
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
                    </select><br>
                    <span>Visa Type*</span>
                    <input type="text" class="form-control" placeholder="eVisa" name="visa_type">
                    <br>
                    <span>Process Time*</span>
                    <input type="number" class="form-control" placeholder="6 Days" name="process_time" value="1" min="1" max="90" required="required">
                    <br>
                    <span>Stay Duration*</span>
                    <input type="number" class="form-control" placeholder="30 Days" name="stay_duration" value="1" min="1" max="90" required="required">
                    <br>
                    <span>Visa Validity*</span>
                    <input type="number" class="form-control" placeholder="60 Days" name="visa_validity" value="1" min="1" max="90" required="required">
                    <br>
                    <span>Amount Per Traveller*</span>
                    <input type="text" class="form-control" placeholder="7500" name="amount_per_traveller" required="required">
                    <br>
                    <span>Our Fees*</span>
                    <input type="text" class="form-control" placeholder="499" name="our_fees" max="90" required="required">
                    <br>
                    <span>Embassey Fees*</span>
                    <input type="text" class="form-control" min="1" max="90" name="embassey_fees" required="required">
                    <br>
                    <span>Covid Insurance*</span>
                    <select name="covid_insurance" name="covid_insurance" class="form-control">
                          <option value="1">Yes</option>
                          <option value="1">No</option>
                    </select><br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="add_package" class="btn btn-primary">Add</button>
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