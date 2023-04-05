<?php
// Initialize the Cart class
require_once 'Cart.php';
$cart = new Cart();

// Check if the form was submitted to add or remove an item from the cart
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];
    $cart->addItem($id, $name, $price, $quantity);
} elseif (isset($_POST['action']) && $_POST['action'] == 'remove') {
    $id = $_POST['item_id'];
    $cart->removeItem($id);
}

// Get the list of products from the helper
require_once 'product_helper.php';
$products = get_products();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <!-- Add the Bootstrap CSS file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h1 class="mb-3">Shopping Cart</h1>

    <?php if ($cart->isEmpty()): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart->getItems() as $item): ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td>$<?= number_format($item['price'], 2) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="action" value="remove">
                            <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3" class="text-end">Total:</td>
                <td>$<?= number_format($cart->getTotalPrice(), 2) ?></td>
                <td></td>
            </tr>
            </tfoot>
        </table>

        <p>Number of items in cart: <?= $cart->getTotalQuantity() ?></p>
    <?php endif; ?>

    
<!-- Add the Bootstrap JS file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>