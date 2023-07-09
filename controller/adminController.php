<?php

namespace Controller;

use Model\Connect;

class adminController
{

    function displayMenu()
    {
        require 'view/admin.php';
    }

    function displayDashboardCreate()
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

            if (isset($_FILES['img']) && is_uploaded_file($_FILES['img']['tmp_name'])) {
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

    function displayEditDashboard()
    {
        $products = Connect::getProducts();

        require 'view/dashboardEditChoose.php';
    }

    function getEditDashboard($id)
    {

        $pdo = Connect::dbConnect();

        $sql = $pdo->prepare(
            "SELECT id_product, description, product.name AS 'name', price, sale, img, product.id_category, category.name AS 'category'
            FROM product
            INNER JOIN category ON product.id_category = category.id_category
            WHERE id_product = :id"
        );

        $sql->execute(["id" => $id]);

        $categories = Connect::getCategories();

        require 'view/dashboardEdit.php';
    }

    function editProduct($id)
    {
        if (isset($_POST['submit'])) {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            $category = filter_input(INPUT_POST, 'category', FILTER_VALIDATE_INT);
            $sale = filter_input(INPUT_POST, 'sale', FILTER_VALIDATE_INT);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (isset($_FILES['img']) && is_uploaded_file($_FILES['img']['tmp_name'])) {
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

            // var_dump($name);
            // var_dump($price);
            // var_dump($category);
            // var_dump($sale);
            // var_dump($description);
            // die;

            // UPDATE QUERY ***********************************************
            if ($name && $price && $category && $description) {

                $pdo = Connect::dbConnect();

                $updateQry = $pdo->prepare(
                    "UPDATE product
                    SET name = :name, price = :price, id_category = :category, description = :description
                    WHERE id_product = :id"
                );

                $updateQry->bindValue(':name', $name);
                $updateQry->bindValue(':price', $price);
                $updateQry->bindValue(':category', $category);
                $updateQry->bindValue(':description', $description);
                $updateQry->bindValue(':id', $id);
        
                $updateQry->execute();

                // SALE QUERY ***********************************************

                if ($sale != false && $sale > 0 && $sale <= 100) {

                    $saleQry = $pdo->prepare(
                        "UPDATE product
                        SET sale = :sale
                        WHERE id_product = :id"
                    );

                    $saleQry->bindValue(':sale', $sale);
                    $saleQry->bindValue(':id', $id);

                    $saleQry->execute();
                }

                // PORTRAIT QUERY ***********************************************

                if ($img != 'missing.png' && $img != null && isset($img))
                {
                    $imgQry = $pdo->prepare(
                        "UPDATE product
                        SET img = :img
                        WHERE id_product = :id"
                    );

                    $imgQry->bindValue(':img', $img);
                    $imgQry->bindValue('id', $id);

                    $imgQry->execute();
                }

                $_SESSION['message'] = "<p class='successMsg'>Product successfully modified</p>";

            } else {
                $_SESSION['message'] = "<p class='errorMsg'>Values error</p>";

            }
        }
    }
}
