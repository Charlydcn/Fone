<?php

namespace Controller;

use Model\Connect;

class homeController
{

    function displayHome()
    {
        $basketQtt = $pdo->query(
            "SELECT SUM(qtt)
            FROM commande
            GROUP BY qtt"
            );

        $qtt = $basketQtt->fetch();

        require 'view/home.php';
    }

    function displayContact()
    {

        $basketQtt = $pdo->query(
            "SELECT SUM(qtt)
            FROM commande
            GROUP BY qtt"
            );

        $qtt = $basketQtt->fetch();
        
        require 'view/contact.php';
    }

    function getBasketCount()
    {
        $pdo = Connect::dbConnect();

        $basketQtt = $pdo->query(
        "SELECT SUM(qtt)
        FROM commande
        GROUP BY qtt"
        );
    }
}
