<?php

ob_start();

?>
<table>
    <thead>
        <tr>
            <th colspan="2">Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($_SESSION['products'] as $product) {
        ?>
            <tr>
                <td colspan="6" class="line"></td>
            </tr>

            <tr>
                <td><img src="public/img/<?= $product['category'] . "/" . $product['img'] ?>" alt="<?= $product['name'] ?> photo"></td>
                <td><?= $product['name'] ?></td>
                <td>$<?= $product['price'] ?></td>
                <td>
                    <div>
                        <input type="button" class="remove" value="-">
                        <p class="qtt">0</p>
                        <input type="button" class="add" value="+">
                    </div>
                </td>
                <td>$<?= $product['price'] ?></td>
                <td>
                    <a href="">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>

<?php

$content = ob_get_clean();
$title = "Basket";
$secondTitle = "Basket";
$css = "basket.css";
$js = "productDetails.js";
require 'template.php';

?>