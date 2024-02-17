<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("Location: /");
}

$userdetails = $_SESSION['userdetails'];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_get = test_input($_POST['name']);
    $email_get = test_input($_POST['email']);
    $password_get = test_input($_POST['password']);
}

include 'connection.php';
if (isset($_POST['submit'])) {
    $id = $_SESSION['userdetails']['id'];
    $updatequery = "update users set `name` = '$name_get', `email`='$email_get', `password`='$password_get' WHERE `id`='$id';";
    $res = mysqli_query($con, $updatequery);
    if ($res) {
        $searchquery = "SELECT * from users WHERE email = '$email_get'";
        $authenticate = mysqli_query($con, $searchquery);
        $user = mysqli_fetch_array($authenticate);
        $_SESSION['userdetails'] = $user;
        header("Location: profile");
    }
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LustrousJewellers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include 'components/header.php'; ?>
    <br>
    <div class="container-fluid">
        <div class="card shadow mb-3">
            <div class="card-body">
                <form method="post" action="profile" onsubmit="return validateForm()">
                    <div class="row" style="margin-bottom: 25px;text-align: left;">
                        <div class="col-sm-8 col-md-8 col-lg-9 col-xl-10 col-xxl-10 align-self-center">
                            <div class="row">
                                <div class="col-md-12 text-start">
                                    <div class="mb-3"><label class="form-label" for="email"><strong>Email
                                                Address</strong></label><input class="form-control" type="email"
                                            id="email" placeholder="user@example.com"
                                            value="<?php echo $userdetails['email']; ?>" name="email"></div>
                                    <span class="text-danger" id="emailError"></span>
                                </div>
                                <div class="col-md-12 text-start">
                                    <div class="mb-3"><label class="form-label"
                                            for="username"><strong>Name</strong></label><input class="form-control"
                                            type="text" id="name" placeholder="Username" name="name"
                                            value="<?php echo $userdetails['name']; ?>"></div>
                                    <span class="text-danger" id="nameError"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-start">
                            <div class="mb-3"><label class="form-label"
                                    for="password"><strong>Password</strong></label><input class="form-control"
                                    type="password" id="password" name="password"
                                    value="<?php echo $userdetails['password']; ?>" placeholder="Password"></div>
                            <span class="text-danger" id="passwordError"></span>
                        </div>
                        <div class="col-md-6 text-start">
                            <div class="mb-3"><label class="form-label" for="verifyPassword"><strong>Confirm
                                        Password</strong></label><input class="form-control" type="password"
                                    name="confirmPassword" id="verifyPassword"
                                    value="<?php echo $userdetails['password']; ?>" placeholder="Password"></div>
                            <span class="text-danger" id="confirmpasswordError"></span>
                        </div>
                        <div class="col">
                            <p id="emailErrorMsg" class="text-danger" style="display:none;"></p>
                            <p id="passwordErrorMsg" class="text-danger" style="display:none;"></p>
                        </div>
                        <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button
                                class="btn btn-primary btn-sm" name="submit" id="submitBtn"
                                type="submit">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("verifyPassword").value;
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>