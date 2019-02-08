<?php
require_once "../db.php";

class product
{

    const SH_DEFAULT = 10;

    public function getProduct($count = self::SH_DEFAULT)
    {

        $count = intval($count);

        $productList = array();

        $sql = 'SELECT `id`,`name`, `price`, `text` FROM products' .
            ' LIMIT ' . $count;

        $query = db::connect()->query($sql);

        $i = 0;
        while ($row = $query->fetch()) {

            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['text'] = $row['text'];
            $i++;

        }
        return $productList;

    }

    public function getProductListByCategory($categoryId = false)
    {

        if ($categoryId) {

            $products = array();
            $sql = ("SELECT `id`,`name`, `price`, `text` FROM products  WHERE category_id ='$categoryId'" .
                " LIMIT " . self::SH_DEFAULT);

            $query = db::connect()->query($sql);
            print_r($sql);

            $i = 0;
            while ($row = $query->fetch()) {

                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['text'] = $row['text'];
                $i++;

            }

        }
        return $products;

    }

}