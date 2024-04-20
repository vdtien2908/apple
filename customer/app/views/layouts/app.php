<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APPLE STORE | APPLE</title>

    <!-- Website Icon -->
    <link rel="icon" href="<?php echo SCRIPT_ROOT; ?>/assets/img/Apple_logo_black.svg" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src=" <?php echo SCRIPT_ROOT; ?>/assets/js/jquery-3.3.1.min.js"></script>

    <!-- Toast -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo SCRIPT_ROOT; ?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SCRIPT_ROOT; ?>/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SCRIPT_ROOT; ?>/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SCRIPT_ROOT; ?>/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SCRIPT_ROOT; ?>/assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SCRIPT_ROOT; ?>/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SCRIPT_ROOT; ?>/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SCRIPT_ROOT; ?>/assets/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src=" <?php echo SCRIPT_ROOT; ?>/assets/img/icon/search.png" alt=""></a>
            <a href="#"><img src=" <?php echo SCRIPT_ROOT; ?>/assets/img/icon/heart.png" alt=""></a>
            <a href="#"><img src=" <?php echo SCRIPT_ROOT; ?>/assets/img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <?php
    $currentUrl = $_SERVER['REQUEST_URI'];
    $useAuthLayout = strpos($currentUrl, '/user') !== false;

    if ($useAuthLayout) {
        include(__DIR__ . '/user_types/auth-layout.php');
    } else {
        include(__DIR__ . '/user_types/main-layout.php');
    }
    ?>

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/jquery.slicknav.js"></script>
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/mixitup.min.js"></script>
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo SCRIPT_ROOT; ?>/assets/js/main.js"></script>
</body>

</html>