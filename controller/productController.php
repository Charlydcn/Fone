<?php

namespace Controller;

use Model\Connect;

class productController
{
    function displayAllProducts()
    {

        $products = Connect::getProducts();

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

    function displayAccessories()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT id_product, product.name AS 'name', price, sale, img, product.id_category, category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category
            WHERE product.id_category = (
                SELECT id_category
                FROM category
                WHERE NAME = 'accessories'
                )"
        );

        require 'view/accessories.php';
    }

    function displayWatchAccessories()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT id_product, product.name AS 'name', price, sale, img, product.id_category, category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category
            WHERE product.id_category = (
                SELECT id_category
                FROM category
                WHERE NAME = 'watchAccessories'
                )"
        );

        require 'view/watchAccessories.php';
    }

    function displaySales()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT id_product, product.name AS 'name', price, sale, img, product.id_category, category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category
            WHERE sale IS NOT NULL"
        );

        require 'view/sales.php';
    }

    function productDetails($id)
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->prepare(
            "SELECT id_product, description, product.name AS 'name', price, sale, img, product.id_category, category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category
            WHERE id_product = :id"
        );

        $sql->execute(["id" => $id]);

        $basketQtt = $pdo->query(
        "SELECT SUM(qtt)
        FROM commande
        GROUP BY qtt"
        );

        $qtt = $basketQtt->fetch();

        require 'view/productDetails.php';
    }
}
