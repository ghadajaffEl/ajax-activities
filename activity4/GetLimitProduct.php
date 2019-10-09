<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="addProduct.js"></script>

</head>
<body>


<?php
require 'ProductManager.php';
$productManager = new ProductManager();
$productManager->addProduct();
$page = $_GET['page'];
if($page==1)
{
    $offset=0;
}
else{
    $offset=$page*10;
}
$productManager->getLimitProduct($offset);


?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="GetLimitProduct.php?page=1">1</a></li>
        <li class="page-item"><a class="page-link" href="GetLimitProduct.php?page=2">2</a></li>
        <li class="page-item"><a class="page-link" href="GetLimitProduct.php?page=3">3</a></li>
        <li class="page-item"><a class="page-link" href="GetLimitProduct.php?page=<?php echo $page+1?>">Suivant</a></li>
    </ul>
</nav>

</body>
</html>

