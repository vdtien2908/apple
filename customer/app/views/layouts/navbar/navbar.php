<style>
    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-toggle:hover:hover .dropdown-menu {
        display: block;
    }
</style>

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            <a href="<?php echo URL_APP; ?>/auth">Login</a>
                            <a href="#">FAQs</a>
                        </div>
                        <div class="header__top__hover">
                            <span>VNĐ <i class="arrow_carrot-down"></i></span>
                            <ul>
                                <li>VNĐ</li>
                                <li>EUR</li>
                                <li>USD</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="header__logo">
                    <a href="http://localhost/apple/customer/home" class="text-dark font-weight-bold text-xl" style="font-size: 1.8rem;">APPLE <span style="color: #e53637;">.</span> </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/home' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/home">Home</a></li>
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/shop' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/shop">Shop</a></li>
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/about' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/about">About us</a></li>
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/blog' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/blog">Blog</a></li>
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/contact' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/contact">contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="header__nav__option d-flex align-items-center justify-content-end">
                    <a href="#" class="search-switch"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/search.png" alt=""></a>
                    <?php if (isset($_SESSION['auth'])) : ?>
                        <a href="#"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/heart.png" alt=""></a>
                        <a href="<?php echo URL_APP; ?>/cart"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/shopping-cart.png" alt=""> <span class="bg-dark text-white rounded" id="cartCount"></span></a>
                        <div class="dropdown">
                            <a class="btn btn-transparent dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo isset($_SESSION['auth']['email']) ? $_SESSION['auth']['email'] : ''; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo URL_APP . '/user/profile' ?>"><i class="fa fa-user-o mr-1" aria-hidden="true"></i>User Information</a></li>
                                <li><a class="dropdown-item" href="<?php echo URL_APP . '/user/orderHistory' ?>"><i class="fa fa-history mr-1" aria-hidden="true"></i>Order History</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="<?php echo URL_APP . '/auth/forgotpassword' ?>"><i class="fa fa-unlock-alt mr-1" aria-hidden="true"></i>Forgot-password?</a></li>
                                <li><a class="dropdown-item text-danger logout-link" href="#"><i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Logout</a></li>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="http://localhost/apple/customer/auth/login" class="text-dark">Login</a>
                        <span class="mx-0 px-0">/</span>
                        <a href="http://localhost/apple/customer/auth/register" class="text-dark">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>

<script>
    const caculatorCartCount = () => {
        let cartItems = localStorage.getItem("cartItems");
        cartItems = cartItems ? JSON.parse(cartItems) : [];

        let cartCount = 0;
        cartItems.forEach((item) => {
            cartCount++;
        });

        document.getElementById('cartCount').innerHTML = cartCount;
    }

    $(document).ready(function() {
        caculatorCartCount();

        $('.logout-link').click(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'http://localhost/apple/customer/auth/logout',
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status === 200) {
                        showToast(res.message, true);
                        window.location.reload();
                    } else {
                        showToast(res.message, false);
                    }
                },
                error: function(xhr, status, error) {
                    showToast('Có lỗi xảy ra: ' + error, false);
                }
            });
        });
    });
</script>