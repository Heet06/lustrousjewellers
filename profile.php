<?php
session_name("Authentication");
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

include 'scripts/connection.php';
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
<html lang="en">

<head>
    <title>LustrousJewellers</title>
    <?php include 'components/links.php'; ?>
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
    <?php include 'components/scripts.php'; ?>
    <script async>
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
</body>

</html>