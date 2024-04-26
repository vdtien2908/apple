function showToast(message, isSuccess) {
  Toastify({
    text: message,
    duration: 5000,
    newWindow: true,
    close: true,
    gravity: "top",
    position: "right",
    stopOnFocus: true,
    style: {
      background: isSuccess
        ? "linear-gradient(to right, #00b09b, #96c93d)"
        : "linear-gradient(to right, #ff416c, #ff4b2b)",
    },
    onClick: function () {},
  }).showToast();
}

// function addCart(element) {
//   try {
//     const product = JSON.parse(element.dataset.product);
//     let cartItems = localStorage.getItem("cartItems");
//     cartItems = cartItems ? JSON.parse(cartItems) : [];

//     const existingCartItem = cartItems.find((item) => item.id === product.id);

//     if (existingCartItem) {
//       existingCartItem.quantity += 1;
//     } else {
//       product.quantity = 1;
//       cartItems.push(product);
//     }

//     localStorage.setItem("cartItems", JSON.stringify(cartItems));
//     showToast("Product has been added to cart!", true);
//   } catch (error) {
//     showToast(
//       "Fail to add product to cart, contact to admin for more information!",
//       false
//     );
//   }
// }
