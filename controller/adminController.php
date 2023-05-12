<?php

namespace Controller;

use Model\Connect;

class adminController
{
    function displayDashboard()
    {
        $categories = Connect::getCategories();

        require 'view/dashboardCreate.php';
    }

    function createProduct()
    {
        if (isset($_POST['submit'])) {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sale = filter_input(INPUT_POST, 'sale', FILTER_VALIDATE_INT);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (isset($_FILES['img'])) {
                $imgTmpName = $_FILES['img']['tmp_name'];
                $imgName = $_FILES['img']['name'];
                $imgSize = $_FILES['img']['size'];
                $imgError = $_FILES['img']['error'];

                $tabExtension = explode('.', $imgName);
                $extension = strtolower(end($tabExtension));

                //Tableau des extensions que l'on accepte
                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                $maxSize = 5000000;

                if (in_array($extension, $extensions) && $imgSize <= $maxSize && $imgError == 0) {
                    $uniqueName = uniqid('', true); // uniqid génère un ID random (exemple 5f586bf96dcd38.73540086)
                    $img = $uniqueName . '.' . $extension;
                    move_uploaded_file($imgTmpName, "public/img/$category/" . $img);
                }
            } else {
                $img = "missing.png";
            }

            if($name && $price && $category && $description) {

                // CREATION QUERY ************************************************
                $pdo = Connect::dbConnect();
    
                $productQry = $pdo->prepare(
                    "INSERT INTO product (NAME, price, description, img)
                    VALUES (:name, :price, :description, :img)"
                );
    
                $productQry->bindValue(':name', $name);
                $productQry->bindValue(':price', $price);
                $productQry->bindValue(':description', $description);
                $productQry->bindValue(':img', $img);
    
                $productQry->execute();
    
                // CATEGORY QUERY ************************************************
                $categoryQry = $pdo->prepare(
                    "UPDATE product
                    SET id_category = (
                        SELECT id_category
                        FROM category
                        WHERE name = :category
                    )
                    WHERE id_product = LAST_INSERT_ID();
                    "
                );
    
                $categoryQry->bindValue(':category', $category);
    
                $categoryQry->execute();
    
                // SALE QUERY ************************************************
                if ($sale > 0 && $sale <= 100 && $sale) {
                    $saleQry = $pdo->prepare(
                        "UPDATE product
                        SET sale = :sale
                        WHERE id_product = LAST_INSERT_ID();"
                    );
        
                    $saleQry->bindValue(':sale', $sale);
    
                    $saleQry->execute();
    
                }

                $p = ucfirst($category); // UPPERCASE first letter
                $p = rtrim($p, 's'); // Remove 's' (last letter) from string category

                $_SESSION['message'] = "<p class='successMsg'>$p successfully created</p>";

            } else {                
                $_SESSION['message'] = "<p class='errorMsg'>Values error</p>";

            }
        }
    }
}
