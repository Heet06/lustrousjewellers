<?php
session_start();
include 'connection.php';
$query = 'select * from ornaments';
$exe = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en" style="font-family: 'Cookie';">

<head>
    <title>LustrousJewellers</title>
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include 'components/header.php'; ?>
    <section
        class="text-center py-4 py-xl-5 mb-xxl-0 pb-xxl-0 mt-md-0 mb-md-0 pb-md-0 pt-md-0 mb-xl-0 mt-xl-0 pt-xl-0 pb-xl-0 mb-sm-0 pb-sm-0 mt-sm-0 pt-sm-0 mt-0 pt-0 mb-0 pb-0"
        style="margin: 0;padding: 0;padding-top: -36;margin-top: -50px;margin-bottom: -40px;padding-bottom: 0px;">
    </section>
    <div style="text-align:center;">
        <h2 class="divider-style"><span>Array Of Ornaments</span></h2>
    </div>
    <div style="scale: 0.9;">
        <div id="masonry" class="row" data-masonry="{&quot;percentPosition&quot;: true }">
            <?php
            while ($row = mysqli_fetch_array($exe)) {
                $src = explode(',', $row['images']);
                ?>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <div id="carousel-<?php echo $row['token']; ?>" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                foreach ($src as $key => $image) {
                                    $activeClass = ($key === 0) ? 'active' : '';
                                    ?>
                                    <div class="carousel-item <?php echo $activeClass; ?>">
                                        <img src="<?php echo $image; ?>" class="d-block w-100" alt="Ornament Image"
                                            style="padding: 10px; border-radius: 25px;">
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carousel-<?php echo $row['token']; ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carousel-<?php echo $row['token']; ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row['name']; ?><br>
                            </h5>
                            <p class="card-text text-muted">
                                <?php echo $row['description']; ?><br>
                            </p><a href="#">Inquire for Price</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
    <script async>
        var grid = document.querySelector('#masonry');
        var masonry;
        masonry = new Masonry(grid, {
            itemSelector: '.col-sm-6',
            percentPosition: true,
            columnWidth: '.col-sm-6'
        });

        masonry.layout();

        document.querySelectorAll(".col-sm-6").forEach(element => {
            gsap.from(element, {
                y: 200,
                opacity: 0,
                delay: 0.5,
                duration: 0.9,
                stagger: 0.3,
                scale: 0.5,
            });
        });
        

        gsap.from(".divider-style", {
            y: -50,
            opacity: 0,
            delay: 0.5,
            duration: 0.9,
            stagger: 0.3,
        });

        document.querySelectorAll(".swiper-slide").forEach(element => {
            gsap.from(element, {
                y: 150,
                opacity: 0,
                delay: 0.5,
                duration: 0.9,
                stagger: 0.3,
            });
        });

        document.querySelectorAll("img.d-block").forEach(element => {
            element.addEventListener("mouseover", function () {
                gsap.to(element, {
                    scale: 1.15,
                });
            })

            element.addEventListener("mouseleave", function () {
                gsap.to(element, {
                    scale: 1,
                });
            })
        });

        window.addEventListener('resize', function () {
            masonry.layout();
        });
    </script>
</body>

</html>