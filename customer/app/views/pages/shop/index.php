<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option" style="background: #1a1a1a;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4 class="text-white">Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="<?php echo URL_APP ?>/home" class="text-secondary">Home</a>
                        <span class="text-secondary">Shop</span>
                        <input type="hidden" id="authenticated" value="<?php echo isset($_SESSION['authenticated']) ? "authenticated" : "noauthenticated"; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form id="searchForm" action="<?php echo URL_APP; ?>/shop/filterByTitle" method="get">
                            <input type="text" name="title" placeholder="Search by name..." value="<?php echo isset($_SESSION['filter-title']) ? $_SESSION['filter-title'] : "" ?>">
                            <?php unset($_SESSION['filter-title']) ?>
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                        <script>
                            // Submit search form
                            document.addEventListener('DOMContentLoaded', function() {
                                const searchForm = document.getElementById('searchForm');
                                const titleInput = searchForm.querySelector('input[name="title"]');

                                searchForm.addEventListener('submit', function(event) {
                                    event.preventDefault();
                                    const titleValue = titleInput.value.trim();
                                    const actionUrl = `${searchForm.action}/${encodeURIComponent(titleValue ? titleValue : "getAll")}`;
                                    searchForm.action = actionUrl;
                                    searchForm.submit();
                                });
                            });
                        </script>
                    </div>
                    <div class="shop__sidebar__categories mb-3">
                        <ul style="height: 30px;">
                            <li><a href="<?php echo URL_APP ?>/shop" class="text-dark font-weight-bolder">Clear the filter <span class="icon_trash"></span></a></li>
                        </ul>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll" id="categoriesContainer">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="<?php echo URL_APP ?>/shop/filterByPrice/0/5000000">0 - 5.000.000 VND</a></li>
                                                <li><a href="<?php echo URL_APP ?>/shop/filterByPrice/5000000/20000000">5.000.000 - 20.000.000 VND</a></li>
                                                <li><a href="<?php echo URL_APP ?>/shop/filterByPrice/20000000/30000000">20.000.000 - 30.000.000 VND</a></li>
                                                <li><a href="<?php echo URL_APP ?>/shop/filterByPrice/30000000/0">30.000.000 VND +</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                </div>
                                <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__tags">
                                            <a href="<?php echo URL_APP ?>/shop/filterByCat">Products</a>
                                            <a href="<?php echo URL_APP ?>/shop/filterByCat/macbook">Laptop</a>
                                            <a href="<?php echo URL_APP ?>/shop/filterByCat/ipad-mini">Ipad</a>
                                            <a href="<?php echo URL_APP ?>/shop/filterByCat/iphone">Iphone</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>showing 1–12 of 126 result</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by price:</p>
                                <select onchange="handleSortChange(this.value)">
                                    <option value="">Select sort order</option>
                                    <option value="ASC">Low to high</option>
                                    <option value="DESC">High to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (empty($products)) { ?>
                            <div class="col-lg-12">
                                <h3 class="text-dark font-weight-bolder mx-auto px-auto text-center my-4" style="max-width: 550px">Sorry, we don't have the product you're looking for.</h3>
                            </div>
                        <?php } else { ?>
                            <?php foreach ($products as $product) { ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="<?php echo IMAGES_PATH . '/' . $product['img']; ?>">
                                            <ul class="product__hover">
                                                <li><a href="<?php echo URL_APP . '/shop/detail/' . $product['slug'] ?>"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/heart.png" alt=""></a></li>
                                                <li><a href="<?php echo URL_APP . '/shop/detail/' . $product['slug'] ?>"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/compared.png" alt=""> <span>Compare</span></a></li>
                                                <li><a href="<?php echo URL_APP . '/shop/detail/' . $product['slug'] ?>"><img loading="lazy" src="<?php echo SCRIPT_ROOT; ?>/assets/img/icon/search.png" alt=""></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><?php echo $product['title'] ?></h6>
                                            <a href="#" class="add-cart" data-product="<?php echo htmlspecialchars(json_encode($product)); ?>" onclick="addCart(this)">+ Add To Cart
                                            </a>
                                            <div class="rating">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <h5><?php echo number_format($product['price'], 0, ',', ',') . ' VND'; ?></h5>
                                            <div class="product__color__select">
                                                <label for="pc-4"><input type="radio" id="pc-4"></label>
                                                <label class="active black" for="pc-5"><input type="radio" id="pc-5"></label>
                                                <label class="grey" for="pc-6"><input type="radio" id="pc-6"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">21</a>
                        </div>
                    </div>
                </div> -->
                </div>
            </div>
        </div>
</section>
<!-- Shop Section End -->

<script>
    const URL = "http://localhost/apple/customer"
    const authenticated = $('#authenticated').val();

    // Fetch 
    const fetchCategories = async () => {
        await $.ajax({
            url: `${URL}/shop/getCategories`,
            type: 'GET',
            success: function(res) {
                console.log(res);
                if (res.status === 200) {
                    renderCategories(res.data);
                } else {
                    showToast(res.message, true);
                }
            },
            error: function(error) {
                showToast(error, false);
                console.error('Error white fetch categories');
            }
        });
    }

    const renderCategories = (categories) => {
        const categoriesContainer = document.getElementById('categoriesContainer');

        const categoryItem = categories
            .map(cat => {
                return `<li><a href="<?php echo URL_APP; ?>/shop/filterByCat/${cat.slug}">${cat.title}</a></li>`;
            })
            .join('');

        categoriesContainer.innerHTML = categoryItem;
    }

    // Actions
    const addCart = (element) => {
        if (authenticated === "noauthenticated") {
            showToast("Please login before add product to cart", false);
            return;
        } else {
            try {
                const product = JSON.parse(element.dataset.product);
                let cartItems = localStorage.getItem("cartItems");
                cartItems = cartItems ? JSON.parse(cartItems) : [];

                const existingCartItem = cartItems.find(item => item.id === product.id);

                if (existingCartItem) {
                    existingCartItem.quantity++;
                } else {
                    product.quantity = 1;
                    cartItems.push(product);
                }

                localStorage.setItem("cartItems", JSON.stringify(cartItems));
                showToast("Product has been added to cart!", true);
            } catch (error) {
                console.log(error);
                showToast("Fail to add product to cart, contact to admin for more information!", false);
            }
        }
    };

    const handleSortChange = async (value) => {
        console.log(value);
        if (value) {
            window.location.href = `${URL}/shop/sort${value}`;
        }
    }

    fetchCategories();
</script>