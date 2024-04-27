 <style>
     .horizontal-line {
         height: 1px;
         background: #f1f1f1;
         border-bottom: 1px dashed #000;
         width: 100%;
     }

     .order-detail {
         background: rgb(0, 0, 0);
         background: radial-gradient(circle, rgba(0, 0, 0, 1) 0%, rgba(41, 41, 41, 1) 100%, rgba(0, 0, 0, 1) 100%);
         position: relative;
         overflow-y: scroll;
     }
 </style>

 <section class="my-5 mx-auto container" style="max-width: 900px;">
     <div class="row">
         <div class="col-12 col-lg-5">
             <h2 class="font-weight-bold text-dark mb-1">Thank you for your purchase!</h2>
             <p class="text-secondary font-weight-bold">Your order will be process within 24 hours during working days, we will notify you by email once your order have been shipped.</p>
             <div class="mt-4">
                 <h4 class="font-weight-bold mb-3">Billing address</h4>
                 <div class="row" id="billingAdrress">

                 </div>
                 <a class="site-btn mt-4 w-100 text-center" href="http://localhost/apple/customer/shop">Continue shopping</a>
             </div>
         </div>
         <div class="col-12 col-lg-7 p-4 text-white rounded-lg mt-4 mt-lg-0 order-detail">
             <div class="order-top-section">
                 <h4 class="font-weight-bold mb-3">SUMARY</h4>
                 <span class="d-flex justify-content-between align-items-center">
                     <span>Order ID: <span id="orderId"></span></span>
                     <span>Order Date: <span id="orderDate"></span></span>
                 </span>
             </div>
             <div class="horizontal-line my-3"></div>
             <div class="order-item-section">
                 <div class="row mb-2" id="productItems">

                 </div>
             </div>
             <div class="horizontal-line my-3"></div>
             <div class="footer-order-section position-absolute" style="bottom: 5px; left: 15px; right: 15px;">
                 <div class="d-flex justify-content-between">
                     <span class="text-secondary">Order Total:</span>
                     <span class="font-weight-bold" id="orderTotal"></span>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <script>
     let successCheckoutItems = localStorage.getItem("successCheckoutItems");
     successCheckoutItems = successCheckoutItems ? JSON.parse(successCheckoutItems) : [];

     if (successCheckoutItems.length === 0 || successCheckoutItems === undefined) {
         window.location.href = "<?php echo URL_APP; ?>/cart";
     }

     const render = (successCheckoutItems) => {
         const billingContainer = document.getElementById('billingAdrress');

         const billingElm = `
            <div class="col-3 text-dark font-weight-bold mb-1">
                Name
            </div>
            <div class="col-9 mb-1">
                <span id="name-receiver">${successCheckoutItems.name}</span>
            </div>
            <div class="col-3 text-dark font-weight-bold mb-1">
                Address
            </div>
            <div class="col-9 mb-1">
                <span id="address-receiver">${successCheckoutItems.address}</span>
            </div>
            <div class="col-3 text-dark font-weight-bold mb-1">
                Phone
            </div>
            <div class="col-9 mb-1">
                <span id="phone-receiver">${successCheckoutItems.phone}</span>
            </div>
            <div class="col-3 text-dark font-weight-bold mb-1">
                Email
            </div>
            <div class="col-9">
                <span id="email-receiver"><?php echo $_SESSION['auth']['email'] ?></span>
            </div>
         `;

         billingContainer.innerHTML = billingElm;

         renderSumary(successCheckoutItems);
     }

     const renderSumary = (successCheckoutItems) => {
         const productContainer = document.getElementById('productItems');
         let totalMoneyCheckout = 0;

         const productElm = successCheckoutItems.products.map((item, index) => {
             totalMoneyCheckout += item.price * parseInt(item.quantity)
             return `
                <div class="col-2">
                    <img src="<?php echo IMAGES_PATH ?>/${item.img}" class="rounded-lg" style="width: 50px; height: 50px;" alt="product image">
                </div>
                <div class="col-10 d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <span class="text-white font-weight-bold text-truncate" style="max-width: 200px;">
                            ${item.title}
                        </span>
                        <span class="text-secondary">
                            Quantity: ${item.quantity}
                        </span>
                    </div>
                    <div class="text-white front-weight-bold">
                        ${Number(item.price).toLocaleString('vi-VN')} VND
                    </div>
                </div>
                `
         }).join(' ');

         productContainer.innerHTML = productElm;


         const orderTotal = document.getElementById('orderTotal');
         const orderDate = document.getElementById('orderDate');
         const orderId = document.getElementById('orderId');
         orderTotal.innerHTML = `<span>${Number(totalMoneyCheckout).toLocaleString('vi-VN')} VND</span>`;
         orderDate.innerHTML = new Date().toLocaleDateString()
         orderId.innerHTML = ('00000' + Math.floor(Math.random() * 10000000000)).slice(-5);

         localStorage.removeItem("successCheckoutItems");
     }

     render(successCheckoutItems);
 </script>