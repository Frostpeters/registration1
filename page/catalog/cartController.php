<?php


class cartController
{

    public function cartAdd()
    {
        if (isset($_POST['add'])) {
            if (isset($_SESSION['cart'][$_POST['name']])) {
                $_SESSION['cart'][$_POST['name']] += 1;
            } else {
                $_SESSION['cart'][$_POST['name']] = 1;
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    public function cartDeleteOne()
    {

        if (isset($_POST['del'])) {
            if ($_SESSION['cart'][$_POST['name']] > 1) {
                $_SESSION['cart'][$_POST['name']] -= 1;
            } else {
                unset($_SESSION['cart'][$_POST['name']]);
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    public function cartDelete()
    {
        if (isset($_POST['delete'])) {
            unset($_SESSION['cart'][$_POST['name']]);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }


}