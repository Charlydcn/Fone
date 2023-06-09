<?php

namespace Model;

abstract class Connect {

    const HOST = "localhost";
    const DB = "fone";
    const USER = "root";
    const PASS = "";

    public static function dbConnect() {
        try {
            return new \PDO(
                    "mysql:host=" . self::HOST . ";dbname=" . self::DB . ";charset=utf8", self::USER, self::PASS);
                    
        } catch(\PDOException $ex) {
            return $ex->getMessage();

        }
    }

    public static function getCategories()
    {
        $db = self::dbConnect();

        $sql = $db->query(
            "SELECT id_category, name
            FROM category"
        );

        return $sql->fetchAll();
    }

    public static function getProducts()
    {
        $db = self::dbConnect();

        $sql = $db->query(
            "SELECT id_product, product.name AS 'name', price, sale, description, img, product.id_category AS 'id_category', category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category"
        );

        return $sql->fetchAll();
    }

    

}
