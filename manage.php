<?php
session_start();
if (!isset($_SESSION['auth'])) {
  header("Location: /");
} elseif (!($_SESSION['userdetails']['email'] == "mukeshkhunt9@gmail.com")) {
  header("Location: /");
}
include 'connection.php';
$ornaments_query = "select * from ornaments";
$diamonds_query = "select * from diamonds";

$exe1 = mysqli_query($con, $ornaments_query);
$exe2 = mysqli_query($con, $diamonds_query);

if (isset($_GET['od'])) {
  $token = $_GET['od'];
  $query = "delete from ornaments where token='$token'";
  $exe = mysqli_query($con, $query);
  $query = "delete from homescreen where token='$token'";
  $exe = mysqli_query($con, $query);
  header("location: manage");
}

if (isset($_GET['dd'])) {
  $token = $_GET['dd'];
  $query = "delete from diamonds where token='$token'";
  $exe = mysqli_query($con, $query);
  $query = "delete from homescreen where token='$token'";
  $exe = mysqli_query($con, $query);
  header("location: manage");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>LustrousJewellers</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400,500,600,700&amp;display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles/main.css">
  <link rel="icon" href="logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php include 'components/header.php'; ?>
  <div>
    <ul class="nav nav-tabs nav-justified" role="tablist">
      <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab"
          href="#tab-1">Ornaments</a></li>
      <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab"
          href="#tab-2">Diamonds</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" role="tabpanel" id="tab-1">
        <div class="bootstrap_datatables">
          <div class="container py-5">
            <header class="text-center text-black">
              <h1 class="display-4">Manage Ornaments</h1>
            </header>
            <div class="row py-5">
              <div class="col-lg-10 mx-auto">
                <div class="card rounded shadow border-0">
                  <div class="card-body p-5 bg-white rounded">
                    <div class="table-responsive">
                      <table id="example" style="width:100%" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th colspan="2">Operations</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($row = mysqli_fetch_array($exe1)) {
                            ?>
                            <tr>
                              <td>
                                <?php echo $row['name']; ?>
                              </td>
                              <td>
                                <?php echo $row['description']; ?>
                              </td>
                              <td><a href="manage?oe=<?php echo $row['token'] ?>"><i class="fa fa-edit"></a></td>
                              <td><a href="manage?od=<?php echo $row['token'] ?>"><i class="fa fa-trash"></a></td>
                            </tr>
                            <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" role="tabpanel" id="tab-2">
        <div class="bootstrap_datatables">
          <div class="container py-5">
            <header class="text-center text-black">
              <h1 class="display-4">Manage Diamonds</h1>
            </header>
            <div class="row py-5">
              <div class="col-lg-10 mx-auto">
                <div class="card rounded shadow border-0">
                  <div class="card-body p-5 bg-white rounded">
                    <div class="table-responsive">
                      <table id="example" style="width:100%" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th colspan="2">Operations</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($row = mysqli_fetch_array($exe2)) {
                            ?>
                            <tr>
                              <td>
                                <?php echo $row['name']; ?>
                              </td>
                              <td>
                                <?php echo $row['description']; ?>
                              </td>
                              <td><a href="manage?de=<?php echo $row['token'] ?>"><i class="fa fa-edit"></a></td>
                              <td><a href="manage?dd=<?php echo $row['token'] ?>"><i class="fa fa-trash"></a></td>
                            </tr>
                            <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'components/footer.php'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
    integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script src="assets/js/Animated-Pretty-Product-List-animated-column.js"></script>
  <script src="assets/js/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced-drop.js"></script>
  <script src="assets/js/theme.js"></script>
</body>

</html>