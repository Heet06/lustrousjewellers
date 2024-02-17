<?php
session_start();
include 'connection.php';
$query = 'select * from diamonds';
$exe = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html amp data-bs-theme="light" lang="en" style="font-family: 'Cookie';">

<head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="canonical" href="https://lustrousjewellers.com/diamonds">
    <title>LustrousJewellers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400,500,600,700&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="icon" href="logo.jpg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"
        integrity="sha512-7Au1ULjlT8PP1Ygs6mDZh9NuQD0A5prSrAUiPHMXpU6g3UMd8qesVnhug5X4RoDr35x5upNpx0A6Sisz1LSTXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <section
        class="text-center py-4 py-xl-5 mb-xxl-0 pb-xxl-0 mt-md-0 mb-md-0 pb-md-0 pt-md-0 mb-xl-0 mt-xl-0 pt-xl-0 pb-xl-0 mb-sm-0 pb-sm-0 mt-sm-0 pt-sm-0 mt-0 pt-0 mb-0 pb-0"
        style="margin: 0;padding: 0;padding-top: -36;margin-top: -50px;margin-bottom: -40px;padding-bottom: 0px;">
    </section>
    <div style="text-align:center;">
        <h2 class="divider-style"><span>Clusters of Diamonds</span></h2>
    </div>
    <div style="scale: 0.9;">
        <div class="row" data-masonry="{&quot;percentPosition&quot;: true }">
            <?php
            while ($row = mysqli_fetch_array($exe)) {
                $src = explode(',', $row['images']);
                ?>
                <div class="col-sm-6 col-lg-4 mb-4" data-scroll data-scroll-speed="2">
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
    <?php include 'components/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script>
    const scroll = new LocomotiveScroll({
        el: document.querySelector('#main'),
        smooth: true,
    });

    document.querySelectorAll(".col-sm-6").forEach(element => {
        gsap.from(element, {
            y: 200,
            opacity: 0,
            delay: 0.5,
            duration: 0.9,
            stagger: 0.3,
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
        element.addEventListener("mouseover", function(){
            gsap.to(element, {
                scale: 1.15,
            });
        })

        element.addEventListener("mouseleave", function() {
            gsap.to(element, {
                scale: 1,
            });
        })
    });

    </script>
    <script async="" src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"
        integrity="sha512-JRlcvSZAXT8+5SQQAvklXGJuxXTouyq8oIMaYERZQasB8SBDHZaUbeASsJWpk0UUrf89DP3/aefPPrlMR1h1yQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="assets/js/Bootstrap-DataTables-main.js"></script>
    <script src="assets/js/Animated-Pretty-Product-List-animated-column.js"></script>
    <script src="assets/js/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced-drop.js"></script>
</body>

</html>