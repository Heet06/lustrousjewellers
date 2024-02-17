<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
<div id="main">
<div id="cursor" style="background-color: blanchedalmond; border-radius: 50%; height: 100px; width: 100px; position: absolute; transform: scale(0);"></div>
<nav class="navbar navbar-expand-md custom-header navbar-light" id="nav">
        <div class="container-fluid">
            <div><a class="navbar-brand" href="/">Lustrous<span>Jewellers</span> </a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbar-collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="navbar-nav links">
                    <li class="nav-item"><a class="nav-link" href="/"><span style="color: rgb(255, 255, 255);">Home</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="ornaments"><span style="color: rgb(255, 255, 255);">Ornaments</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="diamonds"><span style="color: rgb(255, 255, 255);">Diamonds</span></a></li>
                    <li class="nav-item"><a class="nav-link custom-navbar" href="contact"><span style="color: rgb(255, 255, 255);">Contact us</span></a></li>
                </ul>
                <?php if (isset($_SESSION['auth'])){
                ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <img class="dropdown-image" src="avatar.png"><? echo $_SESSION['userdetails']['name'];?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="profile">Manage Profile</a>
                            <a class="dropdown-item" href="inquiries">My Inquiries</a>
                            <?php
                            if ($_SESSION['userdetails']['email'] == "mukeshkhunt9@gmail.com"){ ?>
                                <a class="dropdown-item" href="upload">Add New Products</a>
                                <a class="dropdown-item" href="manage">Manage Existing Products</a>
                                <a class="dropdown-item" href="manageHome">Manage Products in Homescreen</a>
                            <?php }?>
                            <a class="dropdown-item" href="logout">Logout </a>
                        </div>
                    </li>
                </ul>
                <?php }else{
                ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><img class="dropdown-image" src="avatar.png"></a>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="login">Login</a><a class="dropdown-item" href="register">Register</a></div>
                    </li>
                </ul>
                <?php }?>
            </div>
        </div>
    </nav>