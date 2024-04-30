<div class="card">
    <div class="card-item">
        <div class="card-item__icon">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
        <div class="card-item__desc">
            <p class="desc__name">Orders</p>
            <p class="desc__price" id="order">0</p>
        </div>
    </div>
    <div class="card-item">
        <div class="card-item__icon">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="card-item__desc">
            <p class="desc__name">Customers</p>
            <p class="desc__price" id="customer">0</p>
        </div>
    </div>
    <div class="card-item">
        <div class="card-item__icon">
            <i class="fa-solid fa-shop"></i>
        </div>
        <div class="card-item__desc">
            <p class="desc__name">Products</p>
            <p class="desc__price" id="product">0</p>
        </div>
    </div>
    <div class="card-item">
        <div class="card-item__icon">
        <i class="fa-solid fa-file-pen"></i>
        </div>
        <div class="card-item__desc">
            <p class="desc__name">Blog</p>
            <p class="desc__price" id="blog">0 </p>
        </div>
    </div>
</div>

<script>

    const init = () => {
        $.ajax({
            type: 'GET',
            url: '/apple/admin/customer/all',
            success: function (response) {
                const customers = response;
                document.querySelector('#customer').innerHTML= customers.length;
            },
            error: function (error) {
                toast({
                    title: 'Fail load page!',
                    message: `Error server`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });

        $.ajax({
            type: 'GET',
            url: '/apple/admin/order/all',
            success: function (response) {
                const orders = response;
                document.querySelector('#order').innerHTML= orders.length;
            },
            error: function (error) {
                toast({
                    title: 'Fail load page!',
                    message: `Error server`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });

        $.ajax({
            type: 'GET',
            url: '/apple/admin/product/all',
            success: function (response) {
                const product = response;
                document.querySelector('#product').innerHTML= product.length;
            },
            error: function (error) {
                toast({
                    title: 'Fail load page!',
                    message: `Error server`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });

        $.ajax({
            type: 'GET',
            url: '/apple/admin/post/all',
            success: function (response) {
                const post = response;
                document.querySelector('#blog').innerHTML= post.length;
            },
            error: function (error) {
                toast({
                    title: 'Fail load page!',
                    message: `Error server`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });
    };

    init();
</script>
