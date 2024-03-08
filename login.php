<?php
session_start();
session_unset();
session_destroy();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $searchquery = "SELECT * from users WHERE email = '$email_get' AND password = '$password_get'";
    $authenticate = mysqli_query($con, $searchquery);
    $match = mysqli_num_rows($authenticate);
    $user = mysqli_fetch_array($authenticate);

    if ($match) {
        session_start();
        $_SESSION['userdetails'] = $user;
        $_SESSION['auth'] = "true";
        header("Location: /");
    } else {
        echo "<script>alert('Wrong Credentials!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LustrousJewellers</title>
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="styles/login.css">
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
                                        <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                    </div>
                                    <h6 class="h5 mb-0">Welcome back!</h6>
                                    <p class="text-muted mt-2 mb-5">Enter your email address and password to access your
                                        account.</p>
                                    <form method="post" action="login">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-theme">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="register"
                        class="text-primary ml-1">register</a></p>
            </div>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
</body>

</html>