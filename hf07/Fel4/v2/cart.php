<?php
// Start or resume the PHP session
session_start();

// Initialize the cart in the session as an empty array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['remove_from_cart'])) {
    $toDeleteId = $_POST['product_id'];
    unset($_SESSION['cart'][$toDeleteId]);
}

if (isset($_POST['incrase_quantity'])) {
    $productId = $_POST['product_id'];
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += 1;
    }
}

if (isset($_POST['decrase_quantity'])) {
    $productId = $_POST['product_id'];
    if (isset($_SESSION['cart'][$productId]) && $_SESSION['cart'][$productId]['quantity'] > 1) {
        $_SESSION['cart'][$productId]['quantity'] -= 1;
    }
}

// Calculate the total price of the cart
$sum = 0;
foreach ($_SESSION['cart'] as $item) {
    $sum += $item['quantity'] * $item['price'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
<h1>Shopping Cart</h1>

<ul>
    <?php if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId => $item) { ?>
            <li>
                <form method="post">
                    <?php echo $item['name']; ?> - $<?php echo $item['price']; ?>
                    (Quantity: <?php echo $item['quantity']; ?>)
                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                    <input type="submit" name="remove_from_cart" value="Remove from Cart">
                </form>
            </li>
        <?php }
    } ?>
</ul>


</body>
</html>
