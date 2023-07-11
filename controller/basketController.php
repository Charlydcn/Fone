<?php

namespace Controller;

use Model\Connect;

class basketController
{
    function displayBasket()
    {

        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "SELECT product.id_product, product.name, price, sale, img, id_commande, category.name AS 'category', qtt
        FROM product
        INNER JOIN commande ON product.id_product = commande.id_product
        INNER JOIN category ON product.id_category = category.id_category
        ORDER BY price DESC"
        );

        $products = $sql->fetchAll();

        // BASKET QTT QUERY

        $basketQtt = $pdo->query(
            "SELECT SUM(qtt)
        FROM commande
        GROUP BY qtt"
        );

        $qtt = $basketQtt->fetch();

        require 'view/basket.php';
    }

    function addToBasket($id)
    {
        $pdo = Connect::dbConnect();

        // CHECK IF THE PRODUCT IS ALREADY IN THE BASKET (bool(false) if not)

        $getProductQry = $pdo->prepare(
            "SELECT id_product
        FROM commande
        WHERE id_product = :id"
        );

        $getProductQry->execute([':id' => $id]);

        $product = $getProductQry->fetch();

        if ($product === false || $product === null) {
            $addProductQry = $pdo->prepare(
                "INSERT INTO commande (qtt, id_product)
            VALUES (1, :id)"
            );

            $addProductQry->execute([':id' => $id]);

            $_SESSION['message'] = "<p class='successMsg'>Product added to basket</p>";

            // IF ALREADY IN THE BASKET :
            // WE GET THE ID_COMMANDE TO ADD +1 TO QTT OF THIS COMMAND 
        } else {
            $getCommandeQry = $pdo->prepare(
                "SELECT id_commande
            FROM commande
            WHERE id_product = :id"
            );

            $getCommandeQry->execute([':id' => $id]);

            $id = $getCommandeQry->fetch();
            $idCommande = $id[0];

            $incrementQry = $pdo->query(
                "UPDATE commande
            SET qtt = qtt + 1
            WHERE id_commande = $idCommande"
            );

            $_SESSION['message'] = "<p class='successMsg'>Product added to basket</p>";
        }
    }

    function deleteProduct($id)
    {

        $pdo = Connect::dbConnect();

        $deleteProductQry = $pdo->prepare(
            "DELETE FROM commande
            WHERE id_product = :id"
        );

        $deleteProductQry->execute([':id' => $id]);
    }

    function clearBasket()
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->query(
            "TRUNCATE commande"
        );

        $_SESSION['message'] = "<p class='successMsg'>Basket cleared</p>";
    }

    function addQtt($id)
    {
        $pdo = Connect::dbConnect();

        $sql = $pdo->prepare(
            "UPDATE commande
        SET qtt = qtt + 1
        WHERE id_product = :id"
        );

        $sql->execute([':id' => $id]);
    }

    function removeQtt($id)
    {
        $pdo = Connect::dbConnect();

        $getQttQry = $pdo->prepare(
            "SELECT qtt
        FROM commande
        WHERE id_product = :id"
        );

        $getQttQry->execute([':id' => $id]);

        $qtt = $getQttQry->fetch();

        if ($qtt[0] < 2) {
            $deleteProductQry = $pdo->prepare(
                "DELETE FROM commande
            WHERE id_product = :id"
            );

            $deleteProductQry->execute([':id' => $id]);
        }

        $removeQttQry = $pdo->prepare(
            "UPDATE commande
        SET qtt = qtt - 1
        WHERE id_product = :id"
        );

        $removeQttQry->execute([':id' => $id]);
    }

    function getBasketCount()
    {
        $pdo = Connect::dbConnect();

        // BASKET QTT QUERY

        $basketQtt = $pdo->query(
            "SELECT SUM(qtt)
        FROM commande
        GROUP BY qtt"
        );
    }
}
