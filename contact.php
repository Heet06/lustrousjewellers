<?php
session_start();
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en" style="font-family: 'Cookie';">

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
    <link rel="stylesheet" href="styles/main.css">
    <link rel="icon" href="logo.png">
</head>

<body>
    <?php include 'components/header.php'; ?>
    <section
        class="text-center py-4 py-xl-5 mb-xxl-0 pb-xxl-0 mt-md-0 mb-md-0 pb-md-0 pt-md-0 mb-xl-0 mt-xl-0 pt-xl-0 pb-xl-0 mb-sm-0 pb-sm-0 mt-sm-0 pt-sm-0 mt-0 pt-0 mb-0 pb-0"
        style="margin: 0;padding: 0;padding-top: -36;margin-top: -50px;margin-bottom: -40px;padding-bottom: 0px;">
    </section>
    <div style="text-align:center;"></div>
    <section class="getintouch">
        <div class="container modern-form">
            <div class="text-center">
                <h4 style="color: #212529;font-size: 45px;">Get in touch</h4>
            </div>
            <hr class="modern-form__hr">
            <div class="modern-form__form-container">
                <form>
                    <div class="row">
                        <div class="col col-contact">
                            <div class="modern-form__form-group--padding-r form-group mb-3"><input
                                    class="form-control input input-tr" type="text" placeholder="First Name">
                                <div class="line-box">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-contact">
                            <div class="modern-form__form-group--padding-l form-group mb-3"><input
                                    class="form-control input input-tr" type="text" placeholder="Email">
                                <div class="line-box">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="modern-form__form-group--padding-t form-group mb-3"><textarea
                                    class="form-control input modern-form__form-control--textarea"
                                    placeholder="Message"></textarea>
                                <div class="line-box">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center"><button class="btn btn-primary submit-now" type="submit">Submit
                                Now</button></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
    <script src="assets/js/Animated-Pretty-Product-List-animated-column.js"></script>
    <script src="assets/js/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced-drop.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>