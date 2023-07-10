<?php

ob_start();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

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

            $total = 0;

            foreach ($_SESSION['products'] as $product) {

                $newPrice = $product['price'] * ((1 - ($product['sale']) / 100));
                $newPrice = number_format($newPrice, 2);

                if($product['sale'] > 0 || !empty($product['sale'])) {
                    $total += $newPrice;
                } else {
                    $total += $product['price'];
                }
                
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

                    <td>                        
                        <?php
                        if ($product['sale'] > 0) {
                        ?>

                            <li>
                                <span class="salePrice">$<?= $newPrice ?> </span>
                                <span class='oldPrice'>$<?= $product['price'] ?></span>
                            </li>

                        <?php } else { ?>

                            <li>
                                <h2>$<?= $product['price'] ?></h2>
                            </li>

                        <?php } ?>
                    </td>

                    <td>
                        <div>
                            <input type="button" class="remove" value="-">
                            <p class="qtt">1</p>
                            <input type="button" class="add" value="+">
                        </div>
                    </td>

                    <td>$<?= $newPrice ?></td>

                    <td>
                        <a href="index.php?action=removeProductBasket&id=<?= $id ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>

                </tr>
            <?php } ?>
                <tr>
                    <td>Total</td>
                    <td>$<?= number_format($total, 2); ?></td>
                </tr>
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