<?php

require_once "../category.php";
require_once "../product.php";

class CatalogController{

    public function actionCategory($categoryId){
        $categories = array();

        $categories = category::getCategory();

        $categoryProduct = array();
        $categoryProduct = product::getProductListByCategory($categoryId);


        return true;

    }

}