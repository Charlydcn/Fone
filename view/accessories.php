<?php

ob_start();

$products = $sql->fetchAll();

?>

<h1>Accessories</h1>

<div>

    <?php
    foreach ($products as $product) {
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
        </ul>

    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = "Accessories";
$secondTitle = "Accessories";
$css = "products.css";
$js = "";
require 'template.php';

?>