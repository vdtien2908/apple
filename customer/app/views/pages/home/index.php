<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="<?php echo SCRIPT_ROOT; ?>/assets/img/hero/hero-3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Summer Collection</h6>
                            <h2 class="text-white">Spring - Fall Collections 2034</h2>
                            <p class="text-secondary">A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                            <a href="<?php echo URL_APP; ?>/shop" class="primary-btn">SHOP NOW<span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook text-white"></i></a>
                                <a href="#"><i class="fa fa-twitter text-white"></i></a>
                                <a href="#"><i class="fa fa-pinterest text-white"></i></a>
                                <a href="#"><i class="fa fa-instagram text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg" data-setbg="<?php echo SCRIPT_ROOT; ?>/assets/img/hero/hero-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Summer Collection</h6>
                            <h2 class="text-white">Spring - Fall Collections 2034</h2>
                            <p class="text-white">A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                            <a href="<?php echo URL_APP; ?>/shop" class="primary-btn">SHOP NOW<span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook text-white"></i></a>
                                <a href="#"><i class="fa fa-twitter text-white"></i></a>
                                <a href="#"><i class="fa fa-pinterest text-white"></i></a>
                                <a href="#"><i class="fa fa-instagram text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-4">
                <div class="banner__item">
                    <div class="banner__item__pic" style="background: #1a1a1a80;">
                        <img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/iphone/background-ip.png" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>IPhone Collection 2024</h2>
                        <a href="<?php echo URL_APP; ?>/shop/filterByCat/iphone">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic" style="background: #1a1a1a80;">
                        <img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/iphone/bg-ipad.png" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Ipad</h2>
                        <a href="<?php echo URL_APP; ?>/shop/filterByCat/ipad-gen">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner__item banner__item--last">
                    <div class="banner__item__pic" style="background: #1a1a1a80;">
                        <img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/iphone/bg-macos.png" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Macbook, accessories</h2>
                        <a href="<?php echo URL_APP; ?>/shop/filterByCat/macbook">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">MOST SELLER</li>
                    <li data-filter=".new-arrivals">NEW ARRIVALS</li>
                    <li data-filter=".hot-sales">HOT SALES</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter" id="productsContainer">

        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories__text">
                    <h2>Iphone Hot <br /> <span>Iphone Collection</span> <br /> Laptop</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/iphone/background-ip.png" alt="">
                    <div class="hot__deal__sticker">
                        <span>Sale off</span>
                        <h5>$29.99</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>WEEK PRICE</span>
                    <h2>Multi-pocket Chest Bag Black</h2>
                    <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item">
                            <span>3</span>
                            <p>Day's</p>
                        </div>
                        <div class="cd-item">
                            <span>1</span>
                            <p>Hour's</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Minute</p>
                        </div>
                        <div class="cd-item">
                            <span>18</span>
                            <p>second</p>
                        </div>
                    </div>
                    <a href="<?php echo URL_APP; ?>/shop" class="primary-btn">SHOP NOW</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<script>
    const URL = "http://localhost/apple/customer"

    // Fetch 
    const fetchNewProduct = async () => {
        $.ajax({
            url: `${URL}/home/getAll`,
            type: 'GET',
            success: function(res) {
                console.log(res);
                if (res.status === 200) {
                    renderProducts(res.data);
                } else {
                    showToast(res.message, true);
                }
            },
            error: function(error) {
                showToast(error, false);
                console.error('Lỗi khi thêm sản phẩm vào giỏ hàng:', error);
            }
        });
    }

    const renderProducts = (products) => {
        const productsContainer = document.getElementById('productsContainer');

        const productItems = products
            .map(product => {
                let colorOptions = '';

                switch (product.color) {
                    case 'Black':
                        colorOptions = `
                        <label for="pc-1">
                            <input type="radio" id="pc-1">
                        </label>
                        <label class="active black" for="pc-2">
                            <input type="radio" id="pc-2">
                        </label>
                        <label class="grey" for="pc-3">
                            <input type="radio" id="pc-3">
                        </label>
                    `;
                        break;
                    case 'Titan':
                        colorOptions = `
                        <label for="pc-1">
                            <input type="radio" id="pc-1">
                        </label>
                        <label class="black" for="pc-2">
                            <input type="radio" id="pc-2">
                        </label>
                        <label class="active grey" for="pc-3">
                            <input type="radio" id="pc-3">
                        </label>
                    `;
                        break;
                    default:
                        colorOptions = `
                        <label class="active" for="pc-1">
                            <input type="radio" id="pc-1">
                        </label>
                        <label class="black" for="pc-2">
                            <input type="radio" id="pc-2">
                        </label>
                        <label class="grey" for="pc-3">
                            <input type="radio" id="pc-3">
                        </label>
                    `;
                }

                let productClasses = ['mix'];

                if (product.hot) {
                    productClasses.push('hot-sales');
                } else {
                    productClasses.push('new-arrivals');
                }

                return `
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix ${productClasses.join(' ')}">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" style="object-fit: cover;background-position: center center;background-size: contain;" data-setbg="">
                            <span class="label">new</span>
                            <ul class="product__hover">
                                <li><a href="#"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/heart.png" alt=""></a></li>
                                <li><a href="<?php echo URL_APP; ?>/shop/detail/${product.slug}"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>${product.title}</h6>
                            <a href="#" class="add-cart" onClick="addCart(${JSON.stringify(product)})">+ Add to cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5> ${Number(product.price).toLocaleString('vi-VN')} VND</h5>
                            <div class="product__color__select">
                                ${colorOptions}
                            </div>
                        </div>
                    </div>
                </div>        
            `;
            })
            .join('');

        productsContainer.innerHTML = productItems;

        const productPicElements = productsContainer.querySelectorAll('.product__item__pic');
        productPicElements.forEach(picElement => {
            const imgPath = `<?php echo IMAGES_PATH; ?>/${products.find(p => picElement.closest('.product__item').innerHTML.includes(p.title)).img}`;
            picElement.style.backgroundImage = `url(${imgPath})`;
        });
    };

    $(document).ready(function() {
        fetchNewProduct();

        // Actions
        const addCart = (productJson) => {
            const product = JSON.parse(productJson);
            console.log(product);
            localStorage.setItem("cartItems", JSON.stringify(product));
            showToast("Product have been added to cart!");
        };
    });
</script>