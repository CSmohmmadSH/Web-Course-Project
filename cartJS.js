var cartItems = Array.from(document.getElementsByClassName("quantity")); // Convert to an array
var itemsPrice = Array.from(document.getElementsByClassName("cart-price")); // Convert to an array
var cartTotal = document.getElementById("cartTotal");
// Store the original price of each item
const originalPrices = itemsPrice.map((priceElement) => {
  let stringPrice = priceElement.textContent.replace('$', '').split(' ')[0]; // Extract only the original price
    return parseFloat(stringPrice);
});

cartItems.forEach((cartItem, index) => {
    cartItem.addEventListener("change", (event) => {
    let totalPrice = 0; // Initialize total price for the entire cart

    cartItems.forEach((item, i) => {
      // Get the quantity from the input
      let itemQuantity = parseInt(cartItems[i].value) || 0; // Default to 0 if empty

      // Calculate the total for this item based on the original price
      let itemTotal = originalPrices[i] * itemQuantity;

      // Update the individual item's price display
    itemsPrice[i].innerText = `$${itemTotal.toFixed(2)} for (${itemQuantity}) items`;

      // Add to the cart's total price
    totalPrice += itemTotal;

    });

    // Update the total price for the cart
    cartTotal.innerText = `Total: $${totalPrice.toFixed(2)}`;

});
});
