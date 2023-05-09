<?php

ob_start();

$products = $sql->fetchAll();
?>

<h1>All products</h1>

<div>

    <?php
    foreach ($products as $product) {
    ?>

        <ul>
            <img src="public/img/<?= $product['category'] . "/" . $product['img'] ?>" alt="<?= $product['name'] ?> image">
            <li><?= $product['name'] ?></li>
            <li>$<?= $product['price'] ?></li>
        </ul>

    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = "All products";
$secondTitle = "All products";
$css = "allProducts.css";
$js = "";
require 'template.php';

?>