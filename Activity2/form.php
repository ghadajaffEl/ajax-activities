<!DOCTYPE html>
<html>
<head>
    <title>Ceci est une page de test avec des balises PHP</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="addProduct.js"></script>

</head>
<body>


<?php
require 'ProductManager.php';
$productManager = new ProductManager();
$list = $productManager->productList();

?>
<div class="cotainer mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter un produit</div>
                <div class="card-body">
                    <form action="" method="POST" id="formProduct">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Prix</label>
                            <div class="col-md-6">
                                <input type="number" id="price" class="form-control" name="price" required>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-4">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                Ajouter
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>


        <div class="container mt-5">
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
        </div>
    </div>

</body>
</html>

