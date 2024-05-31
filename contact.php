<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" style="font-family: 'Cookie';">

<head>
    <title>LustrousJewellers</title>
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/styles/main.css">
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
    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
</body>

</html>