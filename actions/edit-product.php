<?php
    include "../classes/Product.php";

    $product = new Product;

    if(isset($_POST['edit'])){

        $product_id = $_GET['product_id'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $product->updateProduct($product_id, $product_name, $price, $quantity);
    }
?>