<?php
session_start();
include 'connection.php';
$query = "select * from `homescreen`";
$exe = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>LustrousJewellers</title>
  <?php include 'components/links.php';?>
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/swipe.css">
</head>

<body>
  <?php include 'components/header.php'; ?>
  <div class="powr-multi-slider" id="6e1610ac_1710002425"></div><script src="https://www.powr.io/powr.js?platform=html"></script>
  <div class="section">
    <div class="container">
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php $count = 1;
          while ($row = mysqli_fetch_array($exe)) {
            $src = explode(',', $row['images']);
            ?>
            <div class="swiper-slide">
              <div class="people__card">
                <img src="<?php echo $src[0] ?>" class="people__card__image" />
                <div class="people__card__content">
                  <div class="slide__number">
                    <?php echo $count; ?>
                  </div>
                  <div class="slide__title">
                    <?php echo $row['name']; ?>
                  </div>
                  <div class="slide__subtitle">
                    <?php echo $row['description']; ?>
                  </div>
                  <a href="" class="slide__btn">
                    <span class="slide__btn__text">Own It Now</span>
                    <span class="slide__btn__icon">
                      <svg width="100%" height="100%" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M3.22218 15.2222C2.79261 15.6518 2.79261 16.3482 3.22218 16.7778C3.65176 17.2074 4.34824 17.2074 4.77782 16.7778L3.22218 15.2222ZM16.1 5C16.1 4.39249 15.6075 3.9 15 3.9L5.1 3.9C4.49249 3.9 4 4.39249 4 5C4 5.60751 4.49249 6.1 5.1 6.1L13.9 6.1L13.9 14.9C13.9 15.5075 14.3925 16 15 16C15.6075 16 16.1 15.5075 16.1 14.9L16.1 5ZM4.77782 16.7778L15.7778 5.77782L14.2222 4.22218L3.22218 15.2222L4.77782 16.7778Z"
                          fill="currentColor" />
                      </svg>
                    </span>
                  </a>
                </div>
                <div class="slide__gradient"></div>
              </div>
            </div>
            <?php
            $count++;
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php include 'components/footer.php'; ?>
  <?php include 'components/scripts.php'; ?>
  <script async>
    const swiper = new Swiper(".swiper", {
      // Optional parameters
      direction: "horizontal",
      grabCursor: true,
      slidesPerView: 1,
      slidesPerGroup: 1,
      centeredSlides: false,
      loop: true,
      spaceBetween: 10,
      mousewheel: {
        forceToAxis: true
      },
      breakpoints: {
        767: {
          slidesPerView: 2,
          spaceBetween: 24,
        },
        1699: {
          slidesPerView: 3,
          spaceBetween: 24,
        },
      },
      speed: 1500,
      slideActiveClass: "is-active",
      slideDuplicateActiveClass: "is-active",

      keyboard: {
        enabled: true,
        onlyInViewport: false,
      },

      autoplay: {
        delay: 8000, // Time in milliseconds
        disableOnInteraction: true,
      },

      lazy: {
        loadPrevNext: true,
      },

      preventClicks: false,
      preventClicksPropagation: false,
    });
  </script>
</body>

</html>