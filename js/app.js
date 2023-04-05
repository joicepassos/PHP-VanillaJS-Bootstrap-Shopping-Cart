/// Function to add a product to the cart
function addToCart(productId, productName, productPrice, productQuantity) {
    // Get the cart from the localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || {};

    // Check if the product already exists in the cart
    if (cart[productId]) {
        cart[productId]['quantity'] += productQuantity;
    } else {
        cart[productId] = {
            'name': productName,
            'price': productPrice,
            'quantity': productQuantity
        };
    }

    // Save the cart back to the localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Function to remove a product from the cart
function removeFromCart(productId) {
    // Get the cart from the localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || {};

    // Remove the product from the cart
    delete cart[productId];

    // Save the cart back to the localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
}


// Add an onclick event to the "Add to Cart" button
document.getElementById('add-to-cart').onclick = function(e) {
    e.preventDefault();

    // Get the selected product ID, name, price and quantity
    let productId = document.getElementById('product_id').value;
    let productName = document.getElementById('product_id').options[document.getElementById('product_id').selectedIndex].text;
    let productPrice = document.getElementById('product_id').options[document.getElementById('product_id').selectedIndex].dataset.productPrice;
    let productQuantity = document.getElementById('product_quantity').value;

    // Add the product to the cart
    addToCart(productId, productName, productPrice, productQuantity);

    // Refresh the page to update the cart icon and total quantity
    location.reload();
};

// Add an onclick event to the "Remove" button in the cart table
let removeButtons = document.getElementsByClassName('remove-item');
for (let i = 0; i < removeButtons.length; i++) {
    removeButtons[i].onclick = function(e) {
        e.preventDefault();

        // Get the product ID of the item to remove
        let productId = this.dataset.productId;

        // Remove the product from the cart
        removeFromCart(productId);

        // Refresh the page to update the cart icon and total quantity
        location.reload();
    };
}
