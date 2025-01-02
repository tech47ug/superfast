// Update cart display and total price
function updateCart() {
    const cartItems = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    let totalPrice = 0;

    cartItems.innerHTML = ''; // Clear existing items

    // Iterate through cart items and to the DOM
    for (const productId in cart) {
        const item = cart[productId];
        const li = document.createElement('li');
        li.classList.add('cart-item');
        li.innerHTML = `${item.name} x ${item.quantity} - $${item.price * item.quantity}`;
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';

        removeButton.addEventListener('click', () => {
            deletecart[productId];
            updateCart();
        });
        li.appendChild(removeButton);
        cartItems.appendChild(li);
        totalPrice += item.price * item.quantity;
    }
    totalPriceElement.textContent = totalPrice.toFixed(2);
}

// Fetch pproduct data from the server
// and populate the 'products' section

// Fetch products
fetch('products.php')
  .then(response => response.json())
  .then(products => {
    // Add product listing to the DOM
    products.forEach(product => {
        // ... (Add product to the 'products' section)
    });
  });

  // Update cart on page load
  updateCart();