// Select all quantity inputs and total price element
const cartItems = Array.from(document.getElementsByClassName("quantity"));
const itemsPrice = Array.from(document.getElementsByClassName("cart-price"));
const cartTotal = document.getElementById("cartTotal");

// Store original item prices (to avoid recalculating from strings)
const originalPrices = itemsPrice.map(priceElement => {
    let stringPrice = priceElement.textContent.replace('$', '').split(' ')[0];
    return parseFloat(stringPrice);
});

// Update total price and individual items dynamically
cartItems.forEach((cartItem, index) => {
    cartItem.addEventListener("change", (event) => {
        const maxStock = parseInt(cartItem.getAttribute("max"));
        const quantity = parseInt(event.target.value);

        if (quantity > maxStock) {
            alert("Requested quantity exceeds available stock.");
            event.target.value = maxStock; // Reset to max stock
        }

        // Update prices
        let totalPrice = 0;
        cartItems.forEach((item, i) => {
            const itemQuantity = parseInt(item.value) || 0;
            const itemTotal = originalPrices[i] * itemQuantity;

            itemsPrice[i].innerText = `$${itemTotal.toFixed(2)} for (${itemQuantity}) items`;
            totalPrice += itemTotal;
        });

        // Update cart total
        cartTotal.innerText = `Total: $${totalPrice.toFixed(2)}`;

        document.querySelectorAll(".remove-button").forEach((button) => {
          button.addEventListener("click", () => {
              setTimeout(() => {
                  location.reload(); // Refresh the page to update the cart
              }, 200); // Wait for the form to submit
          });
      });
      
      document.querySelectorAll("form").forEach((form) => {
          form.addEventListener("submit", () => {
              setTimeout(() => {
                  location.reload(); // Refresh the page after any form submission
              }, 200);
          });
      });
      
    });
});
