<?php

ob_start();

?>

<h1>Choose product to edit</h1>
<div>

    <?php
    foreach ($products as $product) {

        $newPrice = $product['price'] * ((1 - ($product['sale']) / 100));
        $newPrice = number_format($newPrice, 2);

    ?>

        <ul>
            <a href="index.php?action=getEditDashboard&id=<?= $product['id_product'] ?>">
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
                <p class="salePercentage">-<?= $product['sale'] ?>%</p>

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
$title = "Choose product to edit";
$secondTitle = "Choose product to edit";
$css = "admin.css";
$css2 = "products.css";
$basketQtt = $qtt;
require 'template.php';

?>