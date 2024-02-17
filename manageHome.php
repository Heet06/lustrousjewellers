<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("Location: /");
} elseif (!($_SESSION['userdetails']['email'] == "mukeshkhunt9@gmail.com")) {
    header("Location: /");
}
include 'connection.php';
$query = "SELECT * FROM ornaments UNION ALL SELECT * FROM diamonds";
$exe = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LustrousJewellers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400,500,600,700&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="icon" href="logo.png">
    <style>
        #preview {
            height: 80vh;
            width: 80vw;
            margin: auto;
            border: 1px solid #ccc;
        }

        .card-img {
            margin-right: 10px;
            height: 100%;
            min-width: 200px;
        }

        .product-card {
            width: 80vw;
        }
    </style>
</head>

<body>
    <?php include 'components/header.php' ?>
    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Modify Products in Homescreen</h3>
                                    </div>
                                    <form method="post" id="modifyForm">
                                        <div class="form-group mb-5">
                                            <?php while ($row = mysqli_fetch_array($exe)):
                                                $images = explode(',', $row['images']); ?>
                                                <div class="card product-card mb-3">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-3">
                                                            <img src="<?php echo $images[0]; ?>"
                                                                alt="<?php echo $row['name']; ?>" class="card-img">
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    <?php echo $row['name']; ?>
                                                                </h5>
                                                                <p class="card-text">
                                                                    <?php echo $row['description']; ?>
                                                                </p>
                                                                <div class="form-check">
                                                                    <input class="form-check-input"
                                                                        name="selectedProducts[]" type="checkbox"
                                                                        value="<?php echo $row['token']; ?>"
                                                                        id="check_<?php echo $row['token']; ?>">
                                                                    <label class="form-check-label"
                                                                        for="check_<?php echo $row['token']; ?>">
                                                                        Select
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                        <button type="button" onclick="submitForm()" name="submit"
                                            class="btn btn-theme">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="preview">Current Homescreen</label>
        <iframe id="preview" class="d-block w-100 border" frameborder="0" src="index"></iframe>
    </div>

    <div id="successModal" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Success!</h5>
                    <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    New Products Have Been Added to the Homescreen
                </div>
            </div>
        </div>
    </div>
    <?php include 'components/footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script>
        function openModal() {
            var modal = document.getElementById('successModal');
            modal.style.display = 'block';
        }

        function closeModal() {
            var modal = document.getElementById('successModal');
            modal.style.display = 'none';
        }

        function submitForm() {
            var maxSelection = 4;
            var selectedProducts = [];
            $("input[name='selectedProducts[]']:checked").each(function () {
                selectedProducts.push($(this).val());
            });

            if (selectedProducts.length > maxSelection) {
                alert("You can select only 4 items. Please reconsider your selection.");
                return;
            }

            // Send AJAX request
            $.ajax({
                type: "POST",
                url: "process.php", // Replace with your server-side script
                data: { selectedProducts: selectedProducts },
                success: function (response) {
                    // Handle the response if needed
                    console.log(response);
                    openModal();
                    document.querySelector('iframe').src = "index.php";
                }
            });
        }
    </script>
    <script src="assets/js/theme.js"></script>
</body>

</html>