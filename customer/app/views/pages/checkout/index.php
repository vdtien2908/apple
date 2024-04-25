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
             <form action="#">
                 <div class="row">
                     <div class="col-lg-8 col-md-6">
                         <h6 class="coupon__code"><span class="icon_tag_alt"></span> you wanna checkout? Please carefully checking your information before checkout!</h6>
                         <h6 class="checkout__title">Billing Details</h6>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Name reveiver<span>*</span></p>
                                     <input type="text" name="name_receiver">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Phone receiver<span>*</span></p>
                                     <input type="text" name="phone_receiver">
                                 </div>
                             </div>
                         </div>
                         <div class="checkout__input">
                             <p>Address receiver<span>*</span></p>
                             <input type="text" name="address_receiver">
                         </div>
                         <div class="checkout__input">
                             <p>Order notes<span> (optional)</span></p>
                             <input type="text" name="note" placeholder="Notes about your order, e.g. special notes for delivery.">
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
                             <button type="submit" class="site-btn" onclick="handleOrder()">PLACE ORDER</button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <!-- Checkout Section End -->

 <script>
     let checkoutItems = localStorage.getItem("checkoutItems");
     checkoutItems = checkoutItems ? JSON.parse(checkoutItems) : [];

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
                </tr>
            `
         }).join(' ');

         checkoutContainer.innerHTML = checkouttElm;

         renderCheckout(checkoutTotalPrice);
     }

     const renderCheckout = (checkoutTotalPrice) => {
         const checkoutContainer = document.getElementById('checkoutPrice');

         const checkoutElm = `
                <li>Subtax <span>${Number(checkoutTotalPrice - 100000).toLocaleString('vi-VN')} VND</span></li>
                <li>TotalPrice <span id="totalMoney">${Number(checkoutTotalPrice).toLocaleString('vi-VN')} VND</span></li>
            `;

         checkoutContainer.innerHTML = checkoutElm;
     }

     renderListProduct(checkoutItems);

     //  Actions
     const handleOrder = () => {

     }
 </script>