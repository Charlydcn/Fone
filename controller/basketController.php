<?php

namespace Controller;

use Model\Connect;

class basketController
{
    function displayBasket()
    {
        require 'view/basket.php';
    }

    function addToBasket($id)
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->prepare(
            "SELECT id_product, product.name AS 'name', price, sale, DESCRIPTION as 'description', img, product.id_category AS 'id_category', category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category
            WHERE id_product = :id"
        );

        $sql->execute(["id" => $id]);

        $product = $sql->fetch();

        $_SESSION['products'][] = $product;

        if ($product['sale'] > 0) {

            $newPrice = $product['price'] * ((1 - ($product['sale']) / 100));
            $newPrice = number_format($newPrice, 2);
        }

        Header("Location:index.php?action=productDetails&id=$id");
    }

    function deleteProduct($id)
    {
        unset($_SESSION['products'][$id]);
    }

    function clearBasket()
    {
        unset($_SESSION['products']);
    }
}
