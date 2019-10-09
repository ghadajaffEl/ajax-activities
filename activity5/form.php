<!DOCTYPE html>
<html>
<head>
    <title>Activité 5</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="listProduct.js"></script>

</head>
<body>


<?php
require 'ProductManager.php';
$productManager = new ProductManager();
$productManager->addProduct();
$list= $productManager->getLimitProduct();
$offset=0;
if(isset($_GET['offset'])){
    $offset = $_GET['offset'];
}
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <p>Arrow Electronics est un fournisseur mondial de produits, services et solutions aux utilisateurs
                industriels et commerciaux de composants électroniques et solutions informatiques pour entreprises.

                Arrow offre une valeur ajoutée extraordinaire aux clients en les connectant à la bonne technologie, au
                bon endroit, au bon moment et au bon prix.</p>

        </div>
    </div>
 <h2>Liste des produits</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($list); $i++) {
            ?>

            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td><?php echo $list[$i]['name'] ?></td>
                <td><?php echo $list[$i]['price'] ?></td>



            </tr>

            <?php
        }

        ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" id="0"><a class="page-link" href="">1</a></li>
            <li class="page-item" id="1"><a class="page-link" href="">2</a></li>
            <li class="page-item" id="2"><a class="page-link" href="">3</a></li>
            <li class="page-item next" id=""><a class="page-link" href="">Suivant</a></li>
        </ul>
    </nav>
</div>

</body>
</html>

