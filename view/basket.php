<?php

ob_start();

?>

<?php

if (isset($_SESSION['products'])) {

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

                    <td>
                        <a href="index.php?action=productDetails&id=<?= $product['id_product'] ?>">
                            <span class="product_name"><?= $product['name'] ?></span>
                        </a>
                    </td>

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
                        <a href="index.php?action=removeProductBasket&id=<?= $id ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="index.php?action=clearBasket">Clear basket</a>


<?php } else {
    echo "<h1>There's nothing in your basket ! (yet..)</h1>";
}

?>

<?php

$content = ob_get_clean();
$title = "Basket";
$secondTitle = "Basket";
$css = "basket.css";
$js = "productDetails.js";
require 'template.php';

?>