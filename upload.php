<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("Location: /");
} elseif (!($_SESSION['userdetails']['email'] == "mukeshkhunt9@gmail.com")) {
    header("Location: /");
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400,500,600,700&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="styles/main.css">
    <style>
        .image-container {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }

        .image-container img {
            width: 250px;
            height: 250px;
        }

        .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: transparent;
            border: none;
            color: #000;
        }
    </style>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success d-none mt-3" role="alert" id="successAlert">
                            <span id="notify"></span>
                        </div>
                        <h1 class="mb-4">Enter Product Details</h1>
                        <form id="productForm">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName"
                                    placeholder="Product Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Product Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder="Description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="productType" class="form-label">Product Type:</label>
                                <select class="form-select" id="productType" name="productType" required>
                                    <option value="ornament">Ornament</option>
                                    <option value="diamond">Diamond</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="form-files" class="form-label">Choose Files</label>
                                <input type="file" class="form-control" id="form-files" name="files[]" multiple required
                                    onchange="previewImages()">
                                <small class="form-text text-muted">You can also drag files to this area.</small>
                            </div>
                            <div id="imagePreview" class="mb-3"></div>
                            <button class="btn btn-primary" type="button" onclick="submitForm()">Submit</button>
                            <button class="btn btn-danger" type="reset" onclick="clearForm()">Reset</button>
                        </form>
                        <div class="text-center bg-light border rounded border-dark shadow-lg p-3 mt-4 d-none"
                            id="imagePreviewContainer">
                            <img id="image_preview" width="100" alt="Image Preview">
                            <div>
                                <button class="btn btn-warning btn-sm mt-3" onclick="previewClose()">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="successModal" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Success!</h5>
                    <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Product has been successfully added.
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
            var formData = new FormData($('#productForm')[0]);

            $.ajax({
                url: 'upload_backend',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    openModal();
                    clearForm();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function clearForm() {
            $('#productForm')[0].reset();
            $('#form-files').val('');
            clearFiles();
            clearImagePreviews();
        }

        function clearImagePreviews() {
            $('#imagePreview').empty();
        }

        function previewImages() {
            var input = document.getElementById('form-files');
            var preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            if (input.files) {
                var filesAmount = input.files.length;

                for (var i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = document.createElement('div');
                        img.className = 'image-container';

                        var closeBtn = document.createElement('button');
                        closeBtn.type = 'button';
                        closeBtn.className = 'btn-close close-btn';
                        closeBtn.setAttribute('aria-label', 'Close');
                        closeBtn.onclick = function () {
                            img.remove();
                        };

                        var imgElement = document.createElement('img');
                        imgElement.style.width = "250px";
                        imgElement.style.height = "250px";
                        imgElement.style.margin = "10px";
                        imgElement.className = 'img-thumbnail';
                        imgElement.src = e.target.result;

                        img.appendChild(closeBtn);
                        img.appendChild(imgElement);

                        preview.appendChild(img);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        }


        function previewClose() {
            $('#imagePreviewContainer').addClass('d-none');
        }
    </script>
    <script src="assets/js/theme.js"></script>
</body>

</html>