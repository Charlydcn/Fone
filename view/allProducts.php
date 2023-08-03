<?php

ob_start();

?>

<h1>All products</h1>
<div>

    <?php
    foreach ($products as $product) {

        $newPrice = $product['price'] * ((1 - ($product['sale']) / 100));
        $newPrice = number_format($newPrice, 2);

    ?>
        <div>
            <a href="index.php?action=productDetails&id=<?= $product['id_product'] ?>">
                <img src="public/img/<?= $product['category'] . "/" . $product['img'] ?>" alt="<?= $product['name'] ?> image">
            </a>
            <h3><?= $product['name'] ?></h3>

            <?php
            if ($product['sale'] > 0) {
            ?>

                <span class="salePrice">$<?= $newPrice ?> </span>
                <span class='oldPrice'>$<?= $product['price'] ?></span>
                <p class="salePercentage">-<?= $product['sale'] ?>%</p>

            <?php } else { ?>

                <h2>$<?= $product['price'] ?></h2>

            <?php } ?>
        </div>
    <?php } ?>
</div>

<?php

$content = ob_get_clean();
$title = "All products";
$secondTitle = "All products";
$css = "products.css";
$js = "";
if (isset($qtt) && $qtt != null) {
    $basketQtt = $qtt;
} else {
    $qtt = 0;
}
require 'template.php';

?>