<?php

ob_start();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

$product = $sql->fetch();

?>


<form action="index.php?action=editProduct&id=<?= $product['id_product'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
    <fieldset>

        <legend>
            <h1>Edit a product</h1>
        </legend>
        <div>
            <label>
                Product name :
                <input type="text" name="name" value="<?= $product['name'] ?>" required>
            </label>

            <label>
                Price :
                <input type="number" name="price" value="<?= $product['price'] ?>" step=".01" min="0" required>
            </label>

            <label>
                Category :
                <select name="category" required>
                    <option value="<?= $product['category'] ?>" selected><?= ucfirst($product['category']) ?></option>

                    <?php
                    foreach ($categories as $category) {
                        if ($product['category'] != $category['name']) {
                    ?>

                            <option value="<?= $category['name'] ?>" name="category">
                                <?= ucfirst($category['name']) ?>
                            </option>

                    <?php }
                    } ?>

                </select>
            </label>

            <label>
                Reduction :
                <input type="number" value="<?= $product['sale'] ?>" name="sale" min="0" max="100">
            </label>

            <label>
                Description :
                <textarea name="description" cols="20" rows="5" required><?= $product['description'] ?></textarea>
            </label>

            <label>
                Image :
                <input type="file" name="img">
            </label>

            <div>
                <input type="submit" name="submit" value="Edit product">

                <a href="index.php?action=deleteProduct&id=<?= $product['id_product'] ?>">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>

            <img src="public/img/<?= $product['category'] . "/" . $product['img'] ?>" alt="<?= $product['name'] ?> image">

        </div>


    </fieldset>
</form>

<?php

$content = ob_get_clean();
$title = "Edit product";
$secondTitle = "Edit product";
$css = "admin.css";
$js = "";
if (isset($qtt) && $qtt != null) {
    $basketQtt = $qtt;
} else {
    $qtt = 0;
}
require 'template.php';

?>