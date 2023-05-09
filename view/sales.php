<?php

ob_start();

$products = $sql->fetchAll();

?>

<div id="sales">
    <h1>Sales</h1>

    <div>

        <?php
        foreach ($products as $product) {

            // $newPrice = $product['price'] * (1 - ($product['sale']));

        ?>

            <ul>
                <a href="">
                    <img src="public/img/<?= $product['category'] . "/" . $product['img'] ?>" alt="<?= $product['name'] ?> image">
                    <li>
                        <h3><?= $product['name'] ?></h3>
                </a>
                </li>
                <li>
                    <h2>$<?= $product['price'] ?></h2>
                </li>
                <li>
                    <?= $newPrice ?>
                </li>
            </ul>

        <?php } ?>

    </div>
</div>


<?php

$content = ob_get_clean();
$title = "Sales";
$secondTitle = "Sales";
$css = "products.css";
$js = "";
require 'template.php';

?>