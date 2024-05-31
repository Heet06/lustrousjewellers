<nav class="navbar navbar-expand-md custom-header navbar-light" id="nav">
    <div class="container-fluid">
        <div><a class="navbar-brand" href="/">Lustrous <span>Jewellers</span> </a><button data-bs-toggle="collapse"
                class="navbar-toggler" data-bs-target="#navbar-collapse"><span class="visually-hidden">Toggle
                    navigation</span><i class="fa fa-bars" aria-hidden="true" style="color: silver;"></i></button></div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav links">
                <li class="nav-item"><a class="nav-link" href="ornaments"><span
                            style="color: rgb(255, 255, 255);">Ornaments</span></a></li>
                <li class="nav-item"><a class="nav-link" href="diamonds"><span
                            style="color: rgb(255, 255, 255);">Diamonds</span></a></li>
            </ul>
            <?php if (isset($_SESSION['auth'])) {
                ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <img class="dropdown-image" src="assets/images/avatar.png">
                            <? echo "Welcome", $_SESSION['userdetails']['name']; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="profile">Manage Profile</a>
                            <a class="dropdown-item" href="inquiries">My Inquiries</a>
                            <?php
                            if ($_SESSION['userdetails']['email'] == "mukeshkhunt9@gmail.com") { ?>
                                <a class="dropdown-item" href="upload">Add New Products</a>
                                <a class="dropdown-item" href="manage">Manage Existing Products</a>
                                <a class="dropdown-item" href="manageHome">Manage Products in Homescreen</a>
                            <?php } ?>
                            <a class="dropdown-item" href="logout">Logout </a>
                        </div>
                    </li>
                </ul>
            <?php } else {
                ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                            data-bs-toggle="dropdown" href="#"><img class="dropdown-image"
                                src="assets/images/avatar.png"></a>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="login">Login</a><a
                                class="dropdown-item" href="register">Register</a></div>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>
<div id="main">