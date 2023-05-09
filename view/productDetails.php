<?php

ob_start();

$product = $sql->fetch()

?>

<article>
    <img src="public/img/<?= $product['category'] . "/" . $product['img'] ?>" alt="<?= $product['name'] ?> photo">
    <ul>
        <li><?= $product['name'] ?></li>
        <li>$<?= $product['price'] ?></li>
        <li><?= $product['description'] ?></li>
        <li>Quantity :</li>
        <div>
            <input type="button" id="add" value="-">
            <p id="qtt">0</p>
            <input type="button" id="remove" value="+">
        </div>
        <a href="">
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
$js = "productDetails.js";
require 'template.php';

?>