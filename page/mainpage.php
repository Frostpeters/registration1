<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "category.php";
require_once "../login/db.php";
require_once "product.php";

$categories = array();
//$categories = new category();
//$categories->getCategory();
$categories = category::getCategory();
$product = array();
$product = product::getProduct();
//$product = product::getProduct();


?>
Shop
<?php foreach ($categories as $categorItem): ?>
    <div>
        <p><a href="/page/mainpage.php?<?php echo $categorItem['id']; ?>">
                <?php echo $categorItem ['name'];?>
            </a></p>
    </div>
<?php endforeach; print_r($id);?>
Product
<?php foreach ($product as $productItem): ?>
    <div>
        <p><a href="/product/<?php echo $productItem ['id']; ?>">
                <?php echo $productItem ['name'] ; ?>
                <?php echo $productItem ['price']; ?>
            </a></p>
        <button name="to_basket"></button>
    </div>
<?php endforeach; ?>


