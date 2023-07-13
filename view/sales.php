<?php

ob_start();

$products = $sql->fetchAll();

?>

<h1>Sales</h1>

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
            <li>
                <span class="salePrice">$<?= $newPrice ?> </span>
                <span class='oldPrice'>$<?= $product['price'] ?></span>
            </li>
            <p class="salePercentage">-<?= $product['sale'] ?>%</p>
        </ul>

    <?php } ?>

</div>


<?php

$content = ob_get_clean();
$title = "Sales";
$secondTitle = "Sales";
$css = "products.css";
$css2 = "sales.css";
$js = "";
if (isset($qtt) && $qtt != null) {
    $basketQtt = $qtt;
} else {
    $qtt = 0;
}
require 'template.php';

?>