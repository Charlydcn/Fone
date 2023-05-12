<?php

ob_start();

$product = $sql->fetch();

$newPrice = $product['price'] * ((1 - ($product['sale']) / 100));
$newPrice = number_format($newPrice, 2);

?>

<article>
    <img src="public/img/<?= $product['category'] . "/" . $product['img'] ?>" alt="<?= $product['name'] ?> photo">

    <?php
    if ($product['sale'] > 0) {
    ?>
    
        <p class="salePercentage">-<?= $product['sale'] ?>%</p>

    <?php } ?>

    <ul>
        <li><?= $product['name'] ?></li>

        <?php
        if ($product['sale'] > 0) {
        ?>
            <li>
                <span class="oldPrice">$<?= $product['price'] . "</span><h2>$" . $newPrice ?></h2>
            </li>


        <?php
        } else {
        ?>

            <li class="price">$<?= $product['price'] ?></li>

        <?php } ?>

        <li><?= $product['description'] ?></li>
        <li>Quantity :</li>
        <div>
            <input type="button" class="remove" value="-">
            <p class="qtt">0</p>
            <input type="button" class="add" value="+">
        </div>
        <a href="index.php?action=addToBasket&id=<?= $product['id_product'] ?>">
            <i class="fa-solid fa-bag-shopping"></i>
            ADD TO CART
        </a>
        <a href="">
            <i class="fa-regular fa-heart"></i>
            ADD TO WISHLIST
        </a>
    </ul>

</article>
<?php

$content = ob_get_clean();
$title = "Product details";
$secondTitle = "Product details";
$css = "productDetails.css";
$css2 = "products.css";
$js = "productDetails.js";
require 'template.php';

?>