<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_get = test_input($_POST['name']);
    $email_get = test_input($_POST['email']);
    $password_get = test_input($_POST['password']);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include 'connection.php';

if (isset($_POST['submit'])) {
    $searchquery = "SELECT * from users WHERE email = '$email_get'";
    $authenticate = mysqli_query($con, $searchquery);
    $match = mysqli_num_rows($authenticate);
    $user = mysqli_fetch_array($authenticate);

    if ($match) {
        header("Location: login");
    } else {
        $token = bin2hex(random_bytes(15));
        $insertquery = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name_get', '$email_get', '$password_get')";
        $res = mysqli_query($con, $insertquery);

        if ($res) {
            header("location : login");
        }
    }
}
?>

<!DOCTYPE html>
<html amp data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="canonical" href="https://lustrousjewellers.com/register">
    <title>LustrousJewellers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400,500,600,700&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/login.css">
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Welcome back!</h6>
                                    <p class="text-muted mt-2 mb-5">A Premium Place for Premium Customers Like You</p>

                                    <form method="post" action="register" onsubmit="return validateForm()">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName1">
                                            <span style="color: red;" id="nameError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail1">
                                            <span style="color: red;" id="emailError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="InputPassword1">
                                            <span style="color: red;" id="passwordError"></span>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" name="confirmpassword" class="form-control"
                                                id="ConfirmPassword1">
                                            <span style="color: red;" id="confirmpasswordError"></span>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-theme">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted text-center mt-3 mb-0">Already Have an Account<a href="login.php"
                        class="text-primary ml-1">Login</a></p>
            </div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script>
        function validateForm() {
            var name = document.getElementById("exampleInputName1").value;
            var email = document.getElementById("exampleInputEmail1").value;
            var password = document.getElementById("InputPassword1").value;
            var confirmPassword = document.getElementById("ConfirmPassword1").value;
            var nameError = document.getElementById("nameError");
            var emailError = document.getElementById("emailError");
            var passwordError = document.getElementById("passwordError");
            var confirmPasswordError = document.getElementById("confirmpasswordError");

            if (name == "") {
                nameError.innerHTML = "This field cannot be empty.";
                return false;
            } else {
                nameError.innerHTML = "";
                var res = true;
            }

            if (email == "") {
                emailError.innerHTML = "This field cannot be empty.";
                return false;
            } else {
                emailError.innerHTML = "";
                var res = true;
            }

            if (password == "") {
                passwordError.innerHTML = "This field cannot be empty.";
                return false;
            } else {
                passwordError.innerHTML = "";
                var res = true;
            }

            if (password.length < 8) {
                passwordError.innerHTML = "Password Must Be 8 characters long.";
                return false;
            } else {
                passwordError.innerHTML = "";
                var res = true;
            }

            if (confirmPassword == "") {
                confirmPasswordError.innerHTML = "This field cannot be empty.";
                return false;
            }
            else if (password !== confirmPassword) {
                confirmPasswordError.innerHTML = "Passwords do not match.";
                return false;
            } else {
                confirmPasswordError.innerHTML = "";
                var res = true;
            }

            return res;
        }
    </script>
</body>

</html>