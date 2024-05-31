<?php
session_start();
include 'scripts/connection.php';
$query = "SELECT * FROM `homescreen`";
$result = mysqli_query($con, $query);
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
            <h1>Our Top Sellers</h1>

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
    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
    <script async src="assets/js/swipe.js"></script>
</body>

</html>