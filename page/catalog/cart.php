<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "cartController.php";

$cart = array();

$cart = $_SESSION['cart'];
//print_r($cart);

?>
<?php foreach ($cart as $key => $value): ?>
    <div>
        <p><a href="/product/prod.php?cat=<?php echo $value; ?>"><?php echo $key ?>
            </a></p>
        <td>Количество <?php echo $value ?></td>
        <form action="" method="POST">Delete
            <input type="hidden" value="<?php echo $key; ?>" name="name">
            <input type="submit" name="delete">
            <?php
            $cartDelete = new cartController();
            $cartDelete->cartDelete();
            ?>
        </form>
        <form action="" method="POST">delete 1
            <input type="hidden" value="<?php echo $key; ?>" name="name">
            <input type="submit" name="del">
            <?php
            $cartDeleteOne = new cartController();
            $cartDeleteOne->cartDeleteOne();
            ?>
        </form>
        <form action="" method="POST">Add 1
            <input type="hidden" value="<?php echo $key; ?>" name="name">
            <input type="submit" name="add">
            <?php
            $cartAdd = new cartController();
            $cartAdd->cartAdd();
            ?>
        </form>

    </div>
<?php endforeach; ?>
<div>
    <button><a href="../mainpage.php">Back</a></button>
</div>
