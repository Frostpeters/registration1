<?php

require_once "../db.php";
require_once "product.php";


class category{

    public function getCategory(){

        $cattegoryList = array();

        $sql = "SELECT `id`,`name` FROM category";
        $query = db::connect()->query($sql);

        $i = 0;
        while ($row = $query->fetch()){
            $cattegoryList[$i]['id'] = $row['id'];
            $cattegoryList[$i]['name'] = $row['name'];
            $i++;
        }
//        print_r($cattegoryList);


        return $cattegoryList;
    }

}