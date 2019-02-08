<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cart = array();

$cart = $_SESSION['cart'];
//print_r($cart);

if (isset($_POST['delete'])) {
    unset($_SESSION['cart'][$_POST['name']]);
    echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['del'])) {
    if ($_SESSION['cart'][$_POST['name']] > 1) {
        $_SESSION['cart'][$_POST['name']] -= 1;
    } else {
        unset($_SESSION['cart'][$_POST['name']]);
    }
    echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['add'])){
    if (isset($_SESSION['cart'][$_POST['name']])) {
        $_SESSION['cart'][$_POST['name']] += 1;
    } else {
        $_SESSION['cart'][$_POST['name']] = 1;
    }
    echo "<meta http-equiv='refresh' content='0'>";
}


?>
<?php foreach ($cart as $key => $value): ?>
    <div>
        <p><a href="/product/prod.php?cat=<?php echo $value; ?>"><?php echo $key ?>
            </a></p>
        <td>Количество <?php echo $value ?></td>
        <form action="" method="POST">
            <input type="hidden" value="<?php echo $key; ?>" name="name">
            <input type="submit" name="delete">
        </form>
        <form action="" method="POST">
            <input type="hidden" value="<?php echo $key; ?>" name="name">
            <input type="submit" name="del">
        </form>
        <form action="" method="POST">
            <input type="hidden" value="<?php echo $key; ?>" name="name">
            <input type="submit" name="add">
        </form>

    </div>
<?php endforeach; ?>
<div>
    <button><a href="../mainpage.php">Back</a></button>
</div>
