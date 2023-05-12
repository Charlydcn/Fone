<?php

ob_start();

$products = $sql->fetchAll();
?>

<h1>All products</h1>
<a href="index.php?action=dashboardCreate">Create product</a>
<div>

    <?php
    foreach ($products as $product) {

        $newPrice = $product['price'] * ((1 - ($product['sale']) / 100));
        $newPrice = number_format($newPrice, 2);

    ?>

        <ul>
            <a href="index.php?action=productDetails&id=<?= $product['id_product'] ?>">
                <img src="public/img/<?= $product['category'] . "/" . $product['img'] ?>" alt="<?= $product['name'] ?> image">
                <li>
                    <h3><?= $product['name'] ?></h3>
            </a>
            </li>

            <?php
            if ($product['sale'] > 0) {
            ?>

                <li>
                    <span class="salePrice">$<?= $newPrice ?> </span>
                    <span class='oldPrice'>$<?= $product['price'] ?></span>
                </li>
                <p>-<?= $product['sale'] ?>%</p>

            <?php } else { ?>

                <li>
                    <h2>$<?= $product['price'] ?></h2>
                </li>

            <?php } ?>
        </ul>

    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = "All products";
$secondTitle = "All products";
$css = "products.css";
$js = "";
require 'template.php';

?>