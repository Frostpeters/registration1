<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "category.php";
require_once __DIR__ . '/../db.php';
require_once "product.php";

$categories = array();
//$categories = new category();
//$categories->getCategory();
$categories = category::getCategory();
$product = array();
$product = product::getProduct();
//$product = product::getProduct();
if (isset($_POST['to_basket'])) {
    if (isset($_SESSION['cart'][$_POST['name']])) {
        $_SESSION['cart'][$_POST['name']] += 1;
    } else {
        $_SESSION['cart'][$_POST['name']] = 1;
    }
}
if (!empty($_SESSION['cart'])) {
    $suma = array_sum($_SESSION['cart']);
}

?>
Shop
<div align="right">
    <p><a href="/page/catalog/cart.php">CART</p>
    <p><?php echo $suma ?></p>
</div>
<?php foreach ($categories as $categorItem): ?>
    <div>
        <p><a href="/page/catalog/catalog.php?cat=<?php echo $categorItem['id']; ?>">
                <?php echo $categorItem ['name']; ?>
            </a></p>
    </div>
<?php endforeach;
print_r($id); ?>
Product
<?php foreach ($product as $productItem): ?>
    <div>
        <p><a href="/product/prod.php?cat=<?php echo $productItem ['id']; ?>">
                <?php echo $productItem ['name']; ?>
                <?php echo $productItem ['price']; ?>
            </a></p>
        <form action="" method="POST">
            <input type="hidden" value="<?php echo $productItem ['id']; ?>" name="id">
            <input type="hidden" value="<?php echo $productItem ['name']; ?>" name="name">
            <input type="submit" name="to_basket">
        </form>

    </div>
<?php endforeach; ?>
<div>
    <button><a href="../logout.php">EXIT</a></button>
</div>


