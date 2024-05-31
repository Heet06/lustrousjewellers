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
<html lang="en">

<head>
    <title>LustrousJewellers</title>
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="styles/main.css">
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
                <p class="text-muted text-center mt-3 mb-0">Already Have an Account<a href="login"
                        class="text-primary ml-1">Login</a></p>
            </div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
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