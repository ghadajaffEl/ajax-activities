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

    public function productList()
    {

        $data = [];
        $response = $this->db->query('SELECT * FROM Product');

        while ($donnees = $response->fetch()) {

            $product = [];
            $product['name'] = $donnees['name'];
            $product['price'] = $donnees['price'];
            $data[] = $product;
        }
        $response->closeCursor();

        return $data;
    }

    public function addProduct()
    {
        if (isset($_POST['name']) && isset($_POST['price'])) {
            $name = htmlspecialchars($_POST['name']);
            $price = $_POST['price'];
            $req = $this->db->prepare('INSERT INTO product(name, price) VALUES(:name, :price)');
            $req->execute(array(
                'name' => $name,
                'price' => $price,

            ));
            header('location: form.php');
        }

    }


}