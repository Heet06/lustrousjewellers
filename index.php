<?php
session_start();
include 'connection.php';
$query = "select * from `homescreen`";
$exe = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html amp data-bs-theme="light" lang="en">

<head>
  <meta charset="utf-8">
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="canonical" href="https://lustrousjewellers.com/">
  <title>LustrousJewellers</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400,500,600,700&amp;display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles/main.css">
  <link rel="icon" href="logo.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"
    integrity="sha512-7Au1ULjlT8PP1Ygs6mDZh9NuQD0A5prSrAUiPHMXpU6g3UMd8qesVnhug5X4RoDr35x5upNpx0A6Sisz1LSTXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    img {
      max-width: 100%;
      vertical-align: middle;
      display: inline-block;
    }

    .section {
      justify-content: center;
      align-items: center;
      display: flex;
      position: relative;
      overflow: hidden;

      .container {
        width: 100%;
        max-width: 1920px;
        margin-left: auto;
        margin-right: auto;
        padding: 30px;
      }
    }

    .swiper-wrapper {
      flex: none;
      align-items: flex-start;
      display: flex;
    }

    .swiper-slide {
      flex: none;

      .people__card {
        position: relative;
        overflow: hidden;
        height: 640px;
        background-color: #111b1a;
        border-radius: 11px;

        @media (max-width: 1699px) {
          height: 512px;
        }

        @media (max-width: 1199px) {
          height: 450px;
        }

        @media (max-width: 991px) {
          height: 400px;
        }

        @media (max-width: 767px) {
          height: auto;
        }

        .people__card__image {
          display: inline-block;
          position: absolute;
          top: 0%;
          bottom: 0%;
          left: 0%;
          right: 0%;
          z-index: 2;
          margin-left: -100px;
          width: 130%;
          height: 100%;
          max-width: none;
          object-fit: cover;
          border-radius: 13px;
          transition: transform 0.7s;
        }

        .people__card__content {
          position: relative;
          z-index: 3;
          display: flex;
          flex-direction: column;
          align-items: flex-start;
          width: 100%;
          height: 100%;
          padding: 40px 30px;
          border-radius: 11px;
          transition: 0.3s;

          .slide__number {
            margin-bottom: 30px;
            opacity: 1;
            font-size: 32px;
            font-weight: 300;
            color: #ebefe3;

            @media (max-width: 1199px) {
              margin-bottom: 20px;
              font-size: 24px;
            }

            @media (max-width: 1199px) {
              font-size: 20px;
            }
          }

          .slide__title {
            margin-bottom: 20px;
            font-size: 3em;
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.03em;
            color: #ebefe3;

            @media (max-width: 1199px) {
              font-size: 2.4em;
            }

            @media (max-width: 767px) {
              font-size: 1.92em;
            }
          }

          .slide__subtitle {
            margin-bottom: 30px;
            max-width: 70%;
            color: #ebefe3;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.6;

            @media (max-width: 1199px) {
              font-size: 15px;
              max-width: 100%;
            }

            @media (max-width: 767px) {
              font-size: 14px;
              max-width: 85%;
            }
          }

          .slide__btn {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 12px 24px;
            border: 1px solid #ebefe3;
            border-radius: 30px;
            text-decoration: none;
            transition: background-color 0.3s;

            @media (max-width: 767px) {
              padding: 10px 20px;
            }

            &:hover {
              background-color: #ebefe3;

              .slide__btn__text {
                color: #111b1a;
              }

              .slide__btn__icon {
                path {
                  color: #111b1a;
                }
              }
            }

            .slide__btn__text {
              margin-right: 5px;
              font-size: 20px;
              font-weight: 500;
              color: #ebefe3;
              transition: color 0.3s;

              @media (max-width: 767px) {
                font-size: 18px;
              }
            }

            .slide__btn__icon {
              width: 15px;
              font-size: 24px;

              @media (max-width: 767px) {
                font-size: 18px;
              }

              path {
                color: #ebefe3;
                transition: 0.3s;
              }
            }
          }
        }

        .slide__gradient {
          position: absolute;
          z-index: 2;
          top: 0%;
          bottom: 0%;
          left: 0%;
          right: 0%;
          background-image: linear-gradient(111deg, #000, rgba(0, 0, 0, 15%) 60%);
        }
      }
    }

    .swiper-slide.is-active .people__card__image {
      transform: translateX(100px);
    }
  </style>
  <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
</head>

<body>
  <?php include 'components/header.php'; ?>
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
          <!--<div class="swiper-slide">
          <div class="people__card">
            <img src="https://i.imgur.com/2V1lJy4.jpg" class="people__card__image" />
            <div class="people__card__content">
              <div class="slide__number">02</div>
              <div class="slide__title">Red Notice</div>
              <div class="slide__subtitle">An Interpol agent successfully tracks down the world's most wanted art thief with help from a rival thief. But nothing is as it seems as a series of double-crosses ensues.</div>
              <a href="" class="slide__btn">
                <span class="slide__btn__text">Watch Now</span>
                <span class="slide__btn__icon">
                  <svg width="100%" height="100%" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.22218 15.2222C2.79261 15.6518 2.79261 16.3482 3.22218 16.7778C3.65176 17.2074 4.34824 17.2074 4.77782 16.7778L3.22218 15.2222ZM16.1 5C16.1 4.39249 15.6075 3.9 15 3.9L5.1 3.9C4.49249 3.9 4 4.39249 4 5C4 5.60751 4.49249 6.1 5.1 6.1L13.9 6.1L13.9 14.9C13.9 15.5075 14.3925 16 15 16C15.6075 16 16.1 15.5075 16.1 14.9L16.1 5ZM4.77782 16.7778L15.7778 5.77782L14.2222 4.22218L3.22218 15.2222L4.77782 16.7778Z" fill="currentColor" />
                  </svg>
                </span>
              </a>
            </div>
            <div class="slide__gradient"></div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="people__card">
            <img src="https://i.imgur.com/3tlt7BS.jpg" class="people__card__image" />
            <div class="people__card__content">
              <div class="slide__number">03</div>
              <div class="slide__title">Battleship</div>
              <div class="slide__subtitle">A fleet of ships is forced to do battle with an armada of unknown origins in order to discover and thwart their destructive goals.</div>
              <a href="" class="slide__btn">
                <span class="slide__btn__text">Watch Now</span>
                <span class="slide__btn__icon">
                  <svg width="100%" height="100%" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.22218 15.2222C2.79261 15.6518 2.79261 16.3482 3.22218 16.7778C3.65176 17.2074 4.34824 17.2074 4.77782 16.7778L3.22218 15.2222ZM16.1 5C16.1 4.39249 15.6075 3.9 15 3.9L5.1 3.9C4.49249 3.9 4 4.39249 4 5C4 5.60751 4.49249 6.1 5.1 6.1L13.9 6.1L13.9 14.9C13.9 15.5075 14.3925 16 15 16C15.6075 16 16.1 15.5075 16.1 14.9L16.1 5ZM4.77782 16.7778L15.7778 5.77782L14.2222 4.22218L3.22218 15.2222L4.77782 16.7778Z" fill="currentColor" />
                  </svg>
                </span>
              </a>
            </div>
            <div class="slide__gradient"></div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="people__card">
            <img src="https://i.imgur.com/2Y4s19s.jpg" class="people__card__image" />
            <div class="people__card__content">
              <div class="slide__number">04</div>
              <div class="slide__title">London Has Fallen</div>
              <div class="slide__subtitle">In London for the Prime Minister's funeral, Mike Banning is caught up in a plot to assassinate all the attending world leaders.</div>
              <a href="" class="slide__btn">
                <span class="slide__btn__text">Watch Now</span>
                <span class="slide__btn__icon">
                  <svg width="100%" height="100%" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.22218 15.2222C2.79261 15.6518 2.79261 16.3482 3.22218 16.7778C3.65176 17.2074 4.34824 17.2074 4.77782 16.7778L3.22218 15.2222ZM16.1 5C16.1 4.39249 15.6075 3.9 15 3.9L5.1 3.9C4.49249 3.9 4 4.39249 4 5C4 5.60751 4.49249 6.1 5.1 6.1L13.9 6.1L13.9 14.9C13.9 15.5075 14.3925 16 15 16C15.6075 16 16.1 15.5075 16.1 14.9L16.1 5ZM4.77782 16.7778L15.7778 5.77782L14.2222 4.22218L3.22218 15.2222L4.77782 16.7778Z" fill="currentColor" />
                  </svg>
                </span>
              </a>
            </div>
            <div class="slide__gradient"></div>
          </div>-->
        </div>
      </div>
    </div>
  </div>
  <?php include 'components/footer.php'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
    integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script src="assets/js/Animated-Pretty-Product-List-animated-column.js"></script>
  <script src="assets/js/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced-drop.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"
    integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
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
      speed: 1000,
      slideActiveClass: "is-active",
      slideDuplicateActiveClass: "is-active",

      keyboard: {
        enabled: true,
        onlyInViewport: false,
      },

      autoplay: {
        delay: 2000, // Time in milliseconds
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