<?php

ob_start();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

?>

<?php

if (!empty($products)) {

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

            $globTotal = 0;

            foreach ($products as $product) {

                $total = 0;


                if ($product['sale'] > 0 || !empty($product['sale'])) {

                    $newPrice = $product['price'] * ((1 - ($product['sale']) / 100));
                    $total += ($newPrice * $product['qtt']);
                    $globTotal += $total;
                } else {
                    $total += ($product['price'] * $product['qtt']);

                    $globTotal += $total;
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

                            <li> <!-- PRIX (solde) -->
                                <span class="salePrice">$<?= number_format($newPrice, 2) ?></span>
                                <span class='oldPrice'>$<?= number_format($product['price'], 2) ?></span>
                            </li>

                        <?php } else { ?>

                            <li> <!-- PRIX (non-solde) -->
                                <span class="price">$<?= number_format($product['price'], 2) ?><span>
                            </li>

                        <?php } ?>
                    </td>

                    <td>
                        <div class="qtt">
                            <a href="index.php?action=removeQtt&id=<?= $product['id_product'] ?>">-</a>
                            <p><?= $product['qtt'] ?></p>
                            <a href="index.php?action=addQtt&id=<?= $product['id_product'] ?>">+</a>
                        </div>
                    </td>
                    <!-- TOTAL PAR PRODUIT -->
                    <td><span class="price">$<?= number_format($total, 2) ?></span></td>

                    <td>
                        <a href="index.php?action=removeProductBasket&id=<?= $product['id_product'] ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>

                </tr>

            <?php } ?>

            <tr>
                <td>Total</td>
                <!-- BIG TOTAL -->
                <td>$<?= number_format($globTotal, 2) ?></td>
            </tr>

        </tbody>
    </table>

    <div>
        <a href="index.php?action=clearBasket">Clear basket</a>
        <a href="index.php?action=">Past orders</a>
        <a href="index.php?action=payOrder&id=<?= $product['id_commande'] ?>">Pay</a>
    </div>


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
if (isset($qtt) && $qtt != null) {
    $basketQtt = $qtt;
} else {
    $qtt = 0;
}
require 'template.php';

?>