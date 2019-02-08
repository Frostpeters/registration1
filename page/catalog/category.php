<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "../category.php";
require_once "../../db.php";
require_once "../product.php";




?>
Shop
<?php foreach ($categories as $categorItem): ?>
    <div>
        <p><a href="/category/<?php echo $categorItem ['id']; ?>">
                <?php echo $categorItem ['name']; ?>
            </a></p>
    </div>
<?php endforeach; ?>
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


