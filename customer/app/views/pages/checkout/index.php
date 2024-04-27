 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-option" style="background: #1a1a1a;">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb__text">
                     <h4 class="text-white">Checkout</h4>
                     <div class="breadcrumb__links">
                         <a href="http://localhost/apple/customer/home" class="text-secondary">Home</a>
                         <a href="http://localhost/apple/customer/shop" class="text-secondary">Shop</a>
                         <span class="text-secondary">Checkout</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Breadcrumb Section End -->

 <!-- Checkout Section Begin -->
 <section class="checkout spad">
     <div class="container">
         <div class="checkout__form">
             <div class="row">
                 <div class="col-lg-8 col-md-6">
                     <h6 class="coupon__code"><span class="icon_tag_alt"></span> you wanna checkout? Please carefully checking your information before checkout!</h6>
                     <h6 class="checkout__title">Billing Details</h6>
                     <div class="row">
                         <div class="col-lg-6">
                             <div class="checkout__input">
                                 <p>Name reveiver<span>*</span></p>
                                 <input type="text" name="name_receiver" required>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="checkout__input">
                                 <p>Phone receiver<span>*</span></p>
                                 <input type="text" name="phone_receiver" required>
                             </div>
                         </div>
                     </div>
                     <div class="checkout__input">
                         <p>Address receiver<span>*</span></p>
                         <input type="text" name="address_receiver" required>
                     </div>
                     <div class="checkout__input">
                         <p>Order notes<span> (optional)</span></p>
                         <input type="text" name="notes" placeholder="Notes about your order, e.g. special notes for delivery.">
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <div class="checkout__order">
                         <h4 class="order__title">Your orders</h4>
                         <div class="checkout__order__products">Product <span>Total price</span></div>
                         <ul class="checkout__total__products" id="checkoutList"></ul>
                         <ul class="checkout__total__all" id="checkoutPrice"></ul>
                         <div class="checkout__input__checkbox">
                             <label for="payment">
                                 convential
                                 <input type="checkbox" id="payment" checked>
                                 <span class="checkmark"></span>
                             </label>
                         </div>
                         <!-- <div class="checkout__input__checkbox">
                                 <label for="paypal">
                                     Paypal
                                     <input type="checkbox" id="paypal">
                                     <span class="checkmark"></span>
                                 </label>
                             </div> -->
                         <button type="button" class="site-btn">PLACE ORDER</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Checkout Section End -->

 <script>
     let checkoutItems = localStorage.getItem("checkoutItems");
     checkoutItems = checkoutItems ? JSON.parse(checkoutItems) : [];
     let totalMoneyCheckout = 0;

     if (checkoutItems.length === 0 || checkoutItems === undefined) {
         window.location.href = "<?php echo URL_APP; ?>/cart";
     }

     //  renders
     const renderListProduct = (checkoutItems) => {
         const checkoutContainer = document.getElementById('checkoutList');
         let checkoutTotalPrice = 0;

         const checkouttElm = checkoutItems.map((item, index) => {
             let itemTotalPrice = item.price * item.quantity;
             checkoutTotalPrice += itemTotalPrice;

             return `
                    <li>${index+1}. <span class="text-truncate" style="width:150px">${item.title}</span><span>${Number(itemTotalPrice).toLocaleString('vi-VN')} VND x ${item.quantity}</span></li>
            `
         }).join(' ');

         checkoutContainer.innerHTML = checkouttElm;

         renderCheckout(checkoutTotalPrice);
     }

     const renderCheckout = (checkoutTotalPrice) => {
         const checkoutContainer = document.getElementById('checkoutPrice');

         const checkoutElm = `
                <li>SubPrice <span>${Number(checkoutTotalPrice - 100000).toLocaleString('vi-VN')} VND</span></li>
                <li>TotalPrice <span id="totalMoney">${Number(checkoutTotalPrice).toLocaleString('vi-VN')} VND</span></li>
            `;

         checkoutContainer.innerHTML = checkoutElm;
         totalMoneyCheckout = checkoutTotalPrice;
     }

     renderListProduct(checkoutItems);

     //  Actions
     const validatePhoneNumber = (phoneNumber) => {
         var regex = /^\d{10}$/;
         return regex.test(phoneNumber);
     }

     $('.site-btn').click(function(e) {
         e.preventDefault();

         $('.error-message').remove();

         var name = $('input[name="name_receiver"]').val().trim();
         var phone = $('input[name="phone_receiver"]').val().trim();
         var address = $('input[name="address_receiver"]').val().trim();
         var notes = $('input[name="notes"]').val().trim();

         var error = false;

         if (name === '') {
             $('<span class="error-message text-danger">Please, enter receiverr name</span>').insertAfter('input[name="name_receiverr"]');
             showToast("Please, enter receiverr name", false);
             error = true;
         }

         if (phone === '') {
             $('<span class="error-message text-danger">Please, enter phone number</span>').insertAfter('input[name="phone_receiverr"]');
             showToast("Please, enter phone number", false);
             error = true;
         } else if (!validatePhoneNumber(phone)) {
             $('<span class="error-message text-danger">Phone number not correct, must have 10 number and no charactor</span>').insertAfter('input[name="phone_receiverr"]');
             showToast("Phone number not correct, must have 10 number and no character", false);
             error = true;
         }

         if (address === '') {
             $('<span class="error-message text-danger">Please, enter address</span>').insertAfter('input[name="address_receiverr"]');
             showToast("Please, enter address", false);
             error = true;
         }

         if (!error) {
             handleOrder(name, phone, address, notes);
         }
     });

     const handleOrder = (name, phone, address, notes) => {
         $.ajax({
             url: `http://localhost/apple/customer/checkout/placeOrder`,
             type: 'POST',
             data: {
                 name_receive: name,
                 phone_receive: phone,
                 address_receive: address,
                 note: notes,
                 total_money: totalMoneyCheckout,
                 listProductDetail: checkoutItems
             },
             success: function(res) {
                 if (res.status === 200) {
                     showToast(res.message, true);
                     localStorage.removeItem("checkoutItems")

                     // delete item out of cart
                     let cartItems = localStorage.getItem("cartItems");
                     cartItems = cartItems ? JSON.parse(cartItems) : [];

                     const newCartItems = cartItems.filter(item => !checkoutItems.some(checkout => parseInt(item.id) === parseInt(checkout.id)));
                     localStorage.setItem("cartItems", JSON.stringify(newCartItems));

                     // add item to checkout success variable
                     const successItems = {
                         name: name,
                         address: address,
                         phone: phone,
                         products: checkoutItems
                     };

                     localStorage.setItem("successCheckoutItems", JSON.stringify(successItems));

                     // Navigate
                     window.location.href = "http://localhost/apple/customer/checkout/success";
                 } else {
                     showToast(res.message, false);
                 }
             },
             error: function(xhr, error) {
                 showToast('Error: ' + 'error', false);
             }
         });
     }
 </script>