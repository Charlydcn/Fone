<?php

namespace Controller;

use Model\Connect;

class productController
{
    function displayAllProducts()
    {

        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT id_product, product.name AS 'name', price, sale, img, product.id_category, category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category"
        );

        require 'view/allProducts.php';
    }

    function displaySmartphones()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT id_product, product.name AS 'name', price, sale, img, product.id_category, category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category
            WHERE product.id_category = (
                SELECT id_category
                FROM category
                WHERE NAME = 'smartphones'
                )"
        );

        require 'view/smartphones.php';
    }

    function displaySmartwatches()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT id_product, product.name AS 'name', price, sale, img, product.id_category, category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category
            WHERE product.id_category = (
                SELECT id_category
                FROM category
                WHERE NAME = 'smartwatches'
                )"
        );

        require 'view/smartwatches.php';
    }
}
