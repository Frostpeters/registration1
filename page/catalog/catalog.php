<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "CatalogController.php";


$categories = array();

$categories = category::getCategory();

$categoryProduct = array();
$categoryProduct = product::getProductListByCategory($_GET['cat']);

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
        <p><a href="/category/<?php echo $categorItem ['id']; ?>">
                <?php echo $categorItem ['name']; ?>
            </a></p>
    </div>
<?php endforeach; ?>
Product
<?php foreach ($categoryProduct as $productItem): ?>
    <div>
        <p><a href="/product/<?php echo $productItem ['id']; ?>">
                <?php echo $productItem ['name']; ?>
                <?php echo $productItem ['price']; ?>
            </a></p>
        <form action="" method="POST">
            <input type="hidden" value="<?php echo $productItem ['id']; ?>" name="id">
            <input type="submit" name="to_basket">
        </form>

    </div>
<?php endforeach; ?>
<div>
    <button><a href="../mainpage.php">Back</a></button>
</div>


