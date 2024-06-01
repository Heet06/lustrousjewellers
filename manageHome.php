<?php
session_name("Authentication");
session_start();
if (!isset($_SESSION['auth'])) {
    header("Location: /");
} elseif (!($_SESSION['userdetails']['email'] == "mukeshkhunt9@gmail.com")) {
    header("Location: /");
}
include 'scripts/connection.php';
$query = "SELECT * FROM ornaments UNION ALL SELECT * FROM diamonds";
$exe = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LustrousJewellers</title>
    <?php include 'components/links.php'; ?>
</head>

<body>
    <?php include 'components/header.php' ?>
    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Modify Products in Homescreen</h3>
                                    </div>
                                    <form method="post" id="modifyForm">
                                        <div class="form-group mb-5 product-grid">
                                            <?php while ($row = mysqli_fetch_array($exe)):
                                                $images = explode(',', $row['images']); ?>
                                                <div class="card product-card">
                                                    <img src="<?php echo $images[0]; ?>" alt="<?php echo $row['name']; ?>"
                                                        class="card-img-top">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="selectedProducts[]"
                                                                type="checkbox" value="<?php echo $row['token']; ?>"
                                                                id="check_<?php echo $row['token']; ?>">
                                                            <label class="form-check-label"
                                                                for="check_<?php echo $row['token']; ?>">Select</label>
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
    <?php include 'components/scripts.php'; ?>
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
            var maxSelection = 8;
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
                url: "scripts/process", // Replace with your server-side script
                data: { selectedProducts: selectedProducts },
                success: function (response) {
                    // Handle the response if needed
                    console.log(response);
                    openModal();
                    document.querySelector('iframe').src = "/";
                }
            });
        }
    </script>
</body>

</html>