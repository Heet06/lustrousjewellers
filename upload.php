<?php
session_name("Authentication");
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
    <title>LustrousJewellers</title>
    <?php include 'components/links.php'; ?>
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
            var formData = new FormData($('#productForm')[0]);

            $.ajax({
                url: 'scripts/upload_backend',
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
                        scroll.update();
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        }


        function previewClose() {
            $('#imagePreviewContainer').addClass('d-none');
        }
    </script>
</body>

</html>