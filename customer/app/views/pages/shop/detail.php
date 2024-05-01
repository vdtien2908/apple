<style>
    .tab-pane {
        display: none;
    }

    .tab-pane.active {
        display: block;
    }

    .carousel-indicators {
        position: static;
    }

    .carousel-indicators li {
        width: 300px;
        height: 100%;
        opacity: 0.8;
    }
</style>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option" style="background: #1a1a1a;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4 class="text-white">Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="<?php echo URL_APP ?>/home" class="text-secondary">Home</a>
                        <span class="text-secondary">Shop Details > <?php echo $product['title'] ?></span>
                        <input type="hidden" name="productSlug" id="productSlug" value="<?php echo $product['slug'] ?>">
                        <input type="hidden" id="authenticated" value="<?php echo isset($_SESSION['authenticated']) ? "authenticated" : "noauthenticated"; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Details Section Begin -->
<section class="shop-details">

    <div class="container">
        <div class="row mt-5 shadow-sm p-3">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="w-100" id="crs-main-image">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <h3 class="font-weight-bold mb-1 text-uppercase" id="product-title"></h3>
                <ul class="mb-4 list-unstyled">
                    <li><span class="text-secondary">Categories:</span> <?php echo $product['cat_title'] ?></li>
                    <li><span class="text-secondary">Tag:</span> Technologies, Phone, Laptop</li>
                </ul>
                <div class="mb-3">
                    <h5 class="text-secondary">Price:</h5>
                    <div class="d-flex flex-wrap font-weight-bold">
                        <h4 class="text-danger font-weight-bold" id="product-price-hot"></h4>
                        <del class="text-secondary ml-2" id="product-price"></del>
                    </div>
                </div>
                <div class="d-flex flex-column mb-3">
                    <h5 class="text-secondary">Color: <span class="text-dark font-weight-bold" id="product-color"></span></h5>
                </div>
                <div class="product__details__last__option my-3">
                    <h5><span>Guaranteed Safe Checkout</span></h5>
                    <img loading="lazy" src="<?php echo SCRIPT_ROOT ?>/assets/img/shop-details/details-payment.png" alt="">
                </div>
                <div class="product__details__cart__option mt-5">
                    <div class="quantity">
                        <div class="pro-qty">
                            <input type="text" value="1" id="productQuantity">
                        </div>
                    </div>
                    <a href="#" class="primary-btn add-cart" data-product="<?php echo htmlspecialchars(json_encode($product)); ?>" onclick="addCart(this)">add to cart</a>
                </div>
                <div class="mt-5">
                    <h5 class="font-weight-bold">Product short information</h5>
                    <span id="product-content">
                        Content
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title text-left">Related Product</h3>
                </div>
            </div>
            <div class="row" id="relatedContainer">
            </div>
        </div>
    </section>
    <!-- Related Section End -->

    <div class="product__details__content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h3 class="font-weight-bold">Product Details</h3>
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p class="product-desc">.</p>
                                    </div>
                                    <div class="product__details__tab__content__item">
                                        <h5>Material used</h5>
                                        <p class="product-desc">.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <h3 class="font-weight-bold mb-3">Specifications</h3>
                    <table class="table table-striped border rounded-lg">
                        <tbody id="specifiTable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->

<script>
    const URL = "http://localhost/apple/customer"
    const productSlug = $('#productSlug').val();
    const authenticated = $('#authenticated').val();

    // Fetch 
    const fetchDetailproduct = async () => {
        await $.ajax({
            url: `${URL}/shop/getDetail/${productSlug}`,
            type: 'GET',
            success: function(res) {
                console.log(res);
                if (res.status === 200) {
                    const data = res.data;
                    renderImagesCaroucel(data.product.img);
                    renderProduct(data.product);
                    renderRelatedProduct(data.relatedProduct);
                    renderSpecifications(data.specifications);
                } else {
                    showToast(res.message, true);
                }
            },
            error: function(error) {
                showToast(error, false);
                console.error('Error when fetch Data:', error);
            }
        });
    }

    const renderProduct = (product) => {
        $('#product-price-hot').html(`${Number(product.sale_price).toLocaleString('vi-VN')} VND`);
        $('#product-price').html(`${Number((product.price)).toLocaleString('vi-VN')} VND`);
        $('#product-content').text(product.content);
        $('#product-title').text(product.title);
        $('#product-color').text(product.color);

        const productDescs = document.querySelectorAll('.product-desc');
        productDescs.forEach(element => {
            element.innerHTML = product.description;
        });
    };

    const renderImagesCaroucel = (image) => {
        const carouselMainContainer = document.getElementById('crs-main-image')

        const carouselElement = `
            <img src="<?php echo IMAGES_PATH; ?>/${image}" class="d-block" style="object-fit:cover;">
        `;

        carouselMainContainer.innerHTML = carouselElement;
    };

    const renderSpecifications = (specifications) => {
        const tableContainer = document.getElementById('specifiTable');

        if (specifications.length === 0) {
            tableContainer.innerHTML = `<h5 class="font-weight-bold text-dark text-left">No specification available!</h5>`;
            return;
        }

        const tableElement = specifications.map((p, index) => (
            `
                <tr>
                    <td>${p.key}</td>
                    <td>${p.value}</td>
                </tr>
            `
        )).join(' ');

        tableContainer.innerHTML = tableElement;
    }

    const renderRelatedProduct = (products) => {
        const relatedProductContainer = document.getElementById('relatedContainer')

        if (products.length === 0) {
            relatedProductContainer.innerHTML = `<h4 class="font-weight-bold text-dark mx-auto text-center">Not found any related products</h4>`;
            return;
        }

        const relatedElement = products.map((product, index) => (
            `
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" style="background: url('<?php echo IMAGES_PATH ?>/${product.img}') no-repeat;object-fit: cover;background-position: center center;background-size: contain;" data-setbg="">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li><a href="#"><img loading="lazy" src="<?php echo SCRIPT_ROOT ?>/assets/img/icon/heart.png" alt=""></a></li>
                            <li><a href="<?php echo URL_APP; ?>/shop/detail/${product.slug}"><img loading="lazy" src="<?php echo SCRIPT_ROOT ?>/assets/img/icon/search.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>${product.title}</h6>
                        <a href="#" class="add-cart" data-product='${JSON.stringify(product)}' onclick="addCart(this)">+ Add to cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>${Number(product.price).toLocaleString('vi-VN')} VND</h5>
                        <div class="product__color__select">
                            <label for="pc-1">
                                <input type="radio" id="pc-1">
                            </label>
                            <label class="active black" for="pc-2">
                                <input type="radio" id="pc-2">
                            </label>
                            <label class="grey" for="pc-3">
                                <input type="radio" id="pc-3">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        `
        )).join(' ');


        relatedProductContainer.innerHTML = relatedElement;
    }

    // Actions
    const addCart = (element) => {
        if (authenticated === "noauthenticated") {
            showToast("Please login before add product to cart", false);
            return;
        } else {
            try {
                const productQuantity = document.getElementById('productQuantity').value;

                const product = JSON.parse(element.dataset.product);
                let cartItems = localStorage.getItem("cartItems");
                cartItems = cartItems ? JSON.parse(cartItems) : [];

                const existingCartItem = cartItems.find(item => item.id === product.id);

                if (existingCartItem) {
                    existingCartItem.quantity++;
                } else {
                    product.quantity = productQuantity ? productQuantity : 1;
                    cartItems.push(product);
                }

                localStorage.setItem("cartItems", JSON.stringify(cartItems));
                showToast("Product has been added to cart!", true);
            } catch (error) {
                showToast("Fail to add product to cart, contact to admin for more information!", false);
                console.log(error);
            }
        }
    };

    fetchDetailproduct();
</script>