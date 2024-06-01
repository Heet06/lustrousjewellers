<?php
session_name("Authentication");
session_start();
if (!isset($_SESSION['auth'])) {
  header("Location: /");
} elseif (!($_SESSION['userdetails']['email'] == "mukeshkhunt9@gmail.com")) {
  header("Location: /");
}
include 'scripts/connection.php';
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
  <title>LustrousJewellers</title>
  <?php include 'components/links.php'; ?>
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
                  <div class="card-body p-5 rounded">
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
                  <div class="card-body p-5 rounded">
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
  <?php include 'components/scripts.php'; ?>
</body>

</html>