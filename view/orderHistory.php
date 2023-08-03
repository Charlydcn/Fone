<?php

ob_start();

?>

<h1>Order history</h1>

<table>

    <thead>
        <tr>
            <th colspan="2">Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>

        <?php

        foreach ($orders as $order) {

            $newPrice = $order['price'] * ((1 - ($order['sale']) / 100));
            $newPrice = number_format($newPrice, 2);

            $total = 0;

            if ($order['sale'] > 0 || !empty($order['sale'])) {

                $newPrice = $order['price'] * ((1 - ($order['sale']) / 100));
                $total += ($newPrice * $order['qtt']);
            } else {
                $total += ($order['price'] * $order['qtt']);
            }
        ?>

            <tr>
                <td colspan="6" class="line"></td>
            </tr>

            <tr>
                <td><img src="public/img/<?= $order['category'] . "/" . $order['img'] ?>" alt="<?= $order['name'] ?> photo"></td>

                <td>
                    <a href="index.php?action=productDetails&id=<?= $order['id_product'] ?>">
                        <span class="product_name"><?= $order['name'] ?></span>
                    </a>
                </td>

                <td>
                    <?php
                    if ($order['sale'] > 0) {
                    ?>

                        <li> <!-- PRIX (solde) -->
                            <span class="salePrice">$<?= number_format($newPrice, 2) ?></span>
                            <span class='oldPrice'>$<?= number_format($order['price'], 2) ?></span>
                        </li>

                    <?php } else { ?>

                        <li> <!-- PRIX (non-solde) -->
                            <span class="price">$<?= number_format($order['price'], 2) ?><span>
                        </li>

                    <?php } ?>
                </td>

                <td>
                    <p><?= $order['qtt'] ?></p>
                </td>

                <!-- TOTAL PAR PRODUIT -->
                <td><span class="price">$<?= number_format($total, 2) ?></span></td>

            </tr>

        <?php } ?>

    </tbody>

</table>

<?php

$content = ob_get_clean();
$title = "Order history";
$secondTitle = "Order history";
$css = "basket.css";
$css2 = "history.css";
$js = "";

if (isset($qtt) && $qtt != null) {
    if (isset($qtt) && $qtt != null) {
        $basketQtt = $qtt;
    } else {
        $qtt = 0;
    }
} else {
    $qtt = 0;
}
require 'template.php';

?>