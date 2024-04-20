<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Miễn phí vận chuyển, đảm bảo hoàn trả hoặc hoàn tiền trong 30 ngày.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            <a href="<?php echo URL_APP; ?>/auth">Đăng nhập</a>
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
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="http://localhost/apple/customer/home" class="text-dark font-weight-bold text-xl" style="font-size: 1.8rem;">APPLE <span style="color: #e53637;">.</span> </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/home' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/home">Trang chủ</a></li>
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/shop' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/shop">Shop</a></li>
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/about' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/about">Về chúng tôi</a></li>
                        <!-- <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                
                                <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/cart' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/cart">Giỏ hàng</a></li>
                            </ul>
                        </li> -->
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/blog' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/blog">Blog</a></li>
                        <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/apple/customer' .  '/contact' ? 'active' : ''); ?>"><a href="http://localhost/apple/customer/contact">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/search.png" alt=""></a>
                    <a href="#"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/heart.png" alt=""></a>
                    <a href="<?php echo URL_APP; ?>/cart"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/shopping-cart.png" alt=""> <span>0</span></a>
                    <div class="price">0.00 VNĐ</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>