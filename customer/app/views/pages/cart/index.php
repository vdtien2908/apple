<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option" style="background: #1a1a1a;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4 class="text-white">Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="http://localhost/apple/customer/home" class="text-secondary">Home</a>
                        <a href="http://localhost/apple/customer/shop" class="text-secondary">Shop</a>
                        <span class="text-secondary">Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <td></td>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cartTable"></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="<?php echo URL_APP; ?>/shop">Continue shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <button type="button" class="w-100 primary-btn" onclick="updateCart()"><i class="fa fa-spinner"></i>Update cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__total" id="cartCheckout"></div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

<script>
    let cartItems = localStorage.getItem("cartItems");
    cartItems = cartItems ? JSON.parse(cartItems) : [];

    // Render
    const getAllCart = (cartItems) => {
        const cartContainer = document.getElementById('cartTable');
        let checkoutTotalPrice = 0;

        if (cartItems.length === 0) {
            cartContainer.innerHTML = `<h3 class="text-dark font-weight-bold">You don't have any product in your cart! Go and getsome.</h3>`
            renderCheckout(checkoutTotalPrice);
            return;
        }

        const cartElm = cartItems.map((item, index) => {
            let itemTotalPrice = item.price * item.quantity;
            checkoutTotalPrice += itemTotalPrice;

            return `
                <tr>
                    <td>
                        <input type="checkbox" class="item_selected" name="selected_items[${index}]" value="${item.id}">
                    </td>
                    <td class="product__cart__item">
                        <div class="product__cart__item__pic">
                            <img loading="lazy" src="<?php echo IMAGES_PATH; ?>/${item.img}" style="width:50px; height:50px;" alt="">
                        </div>
                        <div class="product__cart__item__text">
                            <h6>${item.title}</h6>
                            <h5${Number(item.price).toLocaleString('vi-VN')}>VND</h5$>
                        </div>
                    </td>
                    <td class="quantity__item">
                        <div class="quantity">
                            <div class="pro-qty-2">
                                <input type="text" value="${item.quantity}" class="cart-item-quantity" data-product-id="${item.id}">
                            </div>
                        </div>
                    </td>
                    <td class="cart__price">${Number(itemTotalPrice).toLocaleString('vi-VN')} VND</td>
                    <td class="cart__close"><i class="fa fa-close" onclick="deleteItem(${item.id})"></i></td>
                </tr>
            `
        }).join(' ');

        cartContainer.innerHTML = cartElm;

        renderCheckout(checkoutTotalPrice);
    }

    const renderCheckout = (checkoutTotalPrice) => {
        const checkoutContainer = document.getElementById('cartCheckout');

        const checkoutElm = `
            <h6>TOTAL PRICE</h6>
            <ul>
                <li>Subtax <span>${checkoutTotalPrice > 0?Number(checkoutTotalPrice - 100000).toLocaleString('vi-VN'):0} VND</span></li>
                <li>Total <span>${Number(checkoutTotalPrice).toLocaleString('vi-VN')} VND</span></li>
            </ul>
            <button type="button" onclick="processCheckout()" class="w-100 primary-btn">Process checkout</button>
        `;

        checkoutContainer.innerHTML = checkoutElm;
    }

    // Actions
    const updateCart = () => {
        let updatedItems = [];
        $('.cart-item-quantity').each(function() {
            var productId = $(this).data('product-id');
            var quantity = $(this).val();
            updatedItems.push({
                id: productId,
                quantity: parseInt(quantity)
            });
        });

        const updatedCartItems = [];
        updatedItems.forEach((item) => {
            cartItems.forEach((cart, index) => {
                if (parseInt(cart.id) === parseInt(item.id)) {
                    cart.quantity = item.quantity;
                    updatedCartItems.push(cart);
                }
            })
        })

        localStorage.setItem("cartItems", JSON.stringify(updatedCartItems));
        showToast("Update cart successfully!", true);

        getAllCart(updatedCartItems);
    }

    const deleteItem = (id) => {
        try {
            const newCartItems = cartItems.filter(item => parseInt(item.id) !== id);

            localStorage.setItem("cartItems", JSON.stringify(newCartItems));
            showToast("Delete product successfully!", true);

            getAllCart(newCartItems);
        } catch (error) {
            showToast("Cannot delete product, please contact admin for more information!", false);
        }
    }

    const getSelectedItems = () => {
        const selectedCheckboxes = document.querySelectorAll('input.item_selected:checked');
        const selectedItems = Array.from(selectedCheckboxes).map(checkbox => parseInt(checkbox.value));
        return selectedItems;
    }

    const processCheckout = () => {
        let checkoutItems = localStorage.getItem("checkoutItems");
        checkoutItems = checkoutItems ? JSON.parse(checkoutItems) : [];

        if (cartItems.length === 0) {
            showToast("You don't have any product to checkout!", false);
            return;
        }

        const selectedItems = getSelectedItems();
        if (selectedItems.length === 0) {
            showToast("You must select at least one product to checkout!", false);
            return;
        }

        selectedItems.forEach(itemId => {
            const selectedItem = cartItems.find(item => parseInt(item.id) === parseInt(itemId));
            if (selectedItem) {
                checkoutItems.push(selectedItem);
            }
        });

        localStorage.setItem("checkoutItems", JSON.stringify(checkoutItems));
        window.location.href = "<?php echo URL_APP; ?>/checkout/process";
    }

    getAllCart(cartItems);
</script>