<style>
    .tab-pane {
        display: none;
    }

    .tab-pane.active {
        display: block;
    }
</style>

<!-- Shop Details Section Begin -->
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="./home">Home</a>
                        <a href="./shop">Shop</a>
                        <span>Product Details</span>
                        <input type="hidden" name="productSlug" id="productSlug" value="<?php echo $product['slug'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist" id="image-tablist">
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content" id="image-tabcontent">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4 id="product-title"></h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div>
                        <h3 id="product-price"></h3>
                        <div class="product__details__option d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-center mb-3 text-xl">
                                <span>Color: </span>
                                <span id="product-color" class="font-weight-bold"></span>
                            </div>
                            <?php if (count($specifications) > 0) : ?>
                                <p class="mx-auto px-auto text-center">Specifications:</p>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Attribute</th>
                                            <th scope="col">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody id="specifiTable">
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                        <div class="product__details__cart__option">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" id="productQuantity">
                                </div>
                            </div>
                            <a href="#" class="primary-btn add-cart" data-product="<?php echo htmlspecialchars(json_encode($product)); ?>" onclick="addCart(this)">add to cart</a>
                        </div>
                        <div class="product__details__btns__option">
                            <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                            <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                        </div>
                        <div class="product__details__last__option">
                            <h5><span>Guaranteed Safe Checkout</span></h5>
                            <img loading="lazy" src="<?php echo SCRIPT_ROOT ?>/assets/img/shop-details/details-payment.png" alt="">
                            <ul>
                                <li><span>SKU:</span> 3812912</li>
                                <li><span>Categories:</span> Technologies</li>
                                <li><span>Tag:</span> Technologies, Phone,Laptop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p class="note product-desc">.</p>
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
                            <div class="tab-pane" id="tabs-6" role="tabpanel">
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
                            <div class="tab-pane" id="tabs-7" role="tabpanel">
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
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row" id="relatedContainer">
        </div>
    </div>
</section>
<!-- Related Section End -->

<script>
    const URL = "http://localhost/apple/customer"
    const productSlug = $('#productSlug').val();

    // Fetch 
    const fetchDetailproduct = async () => {
        $.ajax({
            url: `${URL}/shop/getDetail/${productSlug}`,
            type: 'GET',
            success: function(res) {
                console.log(res);
                if (res.status === 200) {
                    const data = res.data;
                    renderImagesTablist(data.images, data.product);
                    renderProduct(data.product);
                    renderRelatedProduct(data.relatedProduct);

                    if (data.specifications.length > 0) {
                        renderSpecifications(data.specifications);
                    }
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
        $(document).ready(function() {
            $('#product-title').text(product.title);
            $('#product-price').html(`${Number(product.price).toLocaleString('vi-VN')} VND <span>${Number((product.price - 1000000)).toLocaleString('vi-VN')} VND</span>`);
            $('#product-content').text(product.content);
            $('#product-color').text(product.color);

            const productDescs = document.querySelectorAll('.product-desc');
            productDescs.forEach(element => {
                element.innerHTML = product.description;
            });
        });
    };

    const renderImagesTablist = (images, product) => {
        const imageTabListContainer = document.getElementById('image-tablist')
        const imageTabContenttContainer = document.getElementById('image-tabcontent')

        const imageTabListElement = images.map((image, index) => (
            `
            <li class="nav-item">
                <a class="nav-link ${index == 0 && 'active'}" data-toggle="tab" href="#tabs-${index}" role="tab">
                    <div class="product__thumb__pic set-bg" style="background: url('<?php echo IMAGES_PATH; ?>/${image.path_name}') no-repeat;object-fit: cover;background-position: center center;background-size: contain;">
                    </div>
                </a>
            </li>
        `
        )).join(' ');


        const imageTabContentElement = `
            <div class="tab-pane active" role="tabpanel">
                <div class="product__details__pic__item">
                    <img loading="lazy" src="<?php echo IMAGES_PATH; ?>/${product.image}" alt="">
                </div>
            </div>
        `;
        // const imageTabContentElement = images.map((image, index) => {
        //     if (index > 0) {
        //         return;
        //     }
        //     return `
        //     <div class="tab-pane active" id="tabs-${index}" role="tabpanel">
        //         <div class="product__details__pic__item">
        //             <img loading="lazy" src="<?php echo IMAGES_PATH; ?>/${image.path_name}" alt="">
        //         </div>
        //     </div>
        // `
        // }).join(' ');


        imageTabListContainer.innerHTML = imageTabListElement;
        imageTabContenttContainer.innerHTML = imageTabContentElement;
    };

    const renderSpecifications = (specifications) => {
        const tableContainer = document.getElementById('specifiTable');

        if (specifications.length === 0) {
            tableContainer.innerHTML = `<h5 class="font-weight-bold text-dark text-center mx-auto px-auto">No specification available!</h5>`;
            return;
        }

        const tableElement = specifications.map((sp, index) => (
            `
                <tr>
                    <td>${sp.key}</td>
                    <td>${sp.value}</td>
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
        try {
            const productQuantity = document.getElementById('productQuantity').value;

            const product = JSON.parse(element.dataset.product);
            let cartItems = localStorage.getItem("cartItems");
            cartItems = cartItems ? JSON.parse(cartItems) : [];

            const existingCartItem = cartItems.find(item => item.id === product.id);

            if (existingCartItem) {
                existingCartItem.quantity += 1;
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
    };

    fetchDetailproduct();
</script>