<?php

use Controller\basketController;
use Controller\homeController;
use Controller\orderController;
use Controller\productController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlBasket = new basketController();
$ctrlHome = new homeController();
$ctrlOrder = new orderController();
$ctrlProduct = new productController();

$id = (isset($_GET['id'])) ? $_GET['id'] : null;

if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        case "home":

            $ctrlHome->displayHome();

            break;

        case "allProducts":

            $ctrlProduct->displayAllProducts();

            break;

        case "smartphones":

            $ctrlProduct->displaySmartphones();

            break;

        case "smartwatches":

            $ctrlProduct->displaySmartwatches();

            break;

        case "accessories":

            $ctrlProduct->displayAccessories();

            break;

        case "watchAccessories":

            $ctrlProduct->displayWatchAccessories();

            break;

        case "sales":

            $ctrlProduct->displaySales();

            break;

        case "about":

            $ctrlHome->displayAbout();

            break;

        case "contact":

            $ctrlHome->displayContact();

            break;

        case "productDetails":

            $ctrlProduct->productDetails($id);

            break;
    }
}
