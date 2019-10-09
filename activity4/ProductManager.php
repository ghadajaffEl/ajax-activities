<?php
/**
 * Created by PhpStorm.
 * User: jghada
 * Date: 03/10/2019
 * Time: 14:48
 */

class ProductManager
{
    private $dnsh = "mysql:host=localhost;dbname=workshop_ajax";
    private $user = "root";
    private $pass = "";
    private $db = null;


    public function __construct()
    {
        try {
            $this->db = new PDO($this->dnsh, $this->user, $this->pass);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }


    }

    public function addProduct()
    {

        $products = [];
        $nbProduct = count($this->productList());
        if ($nbProduct === 0) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            for ($i = 0; $i < 1000; $i++) {

                $products[] = ['name' => $characters[rand(0, strlen($characters))],
                    'price' => random_int(1, 900),
                    'description' => $characters[rand(0, strlen($characters))]];
            }
            $req = $this->db->prepare('INSERT INTO product(name, price, description) VALUES(:name, :price, :description)');


            foreach ($products as $product) {
                $req->execute($product);

            }
        }


    }

    public function productList()
    {

        $data = [];
        $response = $this->db->query('SELECT * FROM Product');

        while ($donnees = $response->fetch()) {

            $product = [];
            $product['name'] = $donnees['name'];
            $product['price'] = $donnees['price'];
            $product['id'] = $donnees['id'];
            $data[] = $product;
        }
        $response->closeCursor();

        return $data;
    }

    public function getLimitProduct($offset = 0)
    {
        $limit = 10;

        $data = [];
        $response = $this->db->prepare('SELECT * FROM Product LIMIT :limit OFFSET :offset');
        $response->bindParam(':limit', $limit, PDO::PARAM_INT);
        $response->bindParam(':offset', $offset, PDO::PARAM_INT);
        $response->execute();

        $table = '<div class="card">
    <div class="card-body">
        <p>Arrow Electronics est un fournisseur mondial de produits, services et solutions aux utilisateurs industriels et commerciaux de composants électroniques et solutions informatiques pour entreprises.

            Arrow offre une valeur ajoutée extraordinaire aux clients en les connectant à la bonne technologie, au bon endroit, au bon moment et au bon prix.</p>

    </div>
</div><table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                </tr>
                </thead>
                <tbody>';
        $i = 1;
        while ($donnees = $response->fetch()) {

            $table .= ' <tr>
                        <th scope="row">' . $donnees['id'] . '</th>
                        <td>' . $donnees['name'] . '</td>
                        <td>' . $donnees['price'] . '</td>

                    </tr>';

            $i++;

        }
        $table .= '</tbody></table>';
        echo $table;
        $response->closeCursor();


    }


}

