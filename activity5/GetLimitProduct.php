<?php
require 'ProductManager.php';
$productManager = new ProductManager();
if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];

    $productManager->getLimitProductAjax($offset);
} else {
    $productManager->getLimitProduct();

}



