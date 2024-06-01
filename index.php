<?php
session_name("Authentication");
session_start();
include 'scripts/connection.php';
$query = "SELECT * FROM `homescreen`";
$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, "SELECT * FROM `ornaments`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LustrousJewellers</title>
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/styles/main.css">
    <link rel="stylesheet" href="assets/styles/swipe.css">
</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="contain">
        <main>
            <div class="slider">
                <div class="slide-row" id="slide-row">
                    <?php $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $src = explode(',', $row['images']);
                        ?>
                        <div class="slide-col">
                            <div class="content">
                                <p><?php echo $row['description']; ?></p>
                                <h2><?php echo $row['name']; ?></h2>
                                <p>#<?php echo $count; ?></p>
                            </div>
                            <div class="hero">
                                <img src="<?php echo $src[0]; ?>" alt="avatar">
                            </div>
                        </div>
                        <?php
                        $count++;
                    }
                    ?>
                </div>
            </div>

            <div class="indicator">
                <?php for ($i = 1; $i < $count; $i++) { ?>
                    <span class="btn-indicator <?php echo ($i == 0) ? "active" : ""; ?>"></span>
                <?php } ?>
            </div>
        </main>
    </div>
    <div class="container">
        <div class="row" id="slider-text">
            <div class="col-md-6">
                <h2>NEW COLLECTION</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="itemslider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $count = 0;
                        while ($row = mysqli_fetch_array($result1)) {
                            $src = explode(',', $row['images']);
                            if ($count % 4 == 0) {
                                echo '<div class="carousel-item ' . ($count == 0 ? 'active' : '') . '">';
                                echo '<div class="row justify-content-center">';
                            }
                            ?>
                            <div class="col-md-2 col-6"> <!-- Adjusted to col-6 for mobile view -->
                                <a href="#"><img src="<?php echo $src[0]; ?>" class="img-fluid"></a>
                                <h4 class="text-center"><?php echo $row['name']; ?></h4>
                                <h5 class="text-center"><?php echo $row['Price']; ?>$</h5>
                            </div>
                            <?php
                            if (($count + 1) % 4 == 0 || $count == mysqli_num_rows($result1) - 1) {
                                echo '</div></div>';
                            }
                            $count++;
                        }
                        ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#itemslider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#itemslider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
    <script src="assets/js/swipe.js"></script>
</body>

</html>