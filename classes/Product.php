<?php
    require_once "Database.php";

    class Product extends Database{

        public function getAllProducts(){
            $sql = "SELECT id, product_name, price, quantity FROM products";

            if($result = $this->conn->query($sql)){
                return $result;
            } else {
                die("Error retrieving all products: " .$this->conn->error);
            }
        }

        // public function getProduct($product_id){
        //     // $id = $_SESSION['id'];

        //     $sql = "SELECT product_name, price, quantity FROM products WHERE id = $product_id";

        //     if($result = $this->conn->query($sql)){
        //         return $result->fetch_assoc();
        //     } else {
        //         die("Error retrieving the specific product: " . $this->conn->error);
        //     }
        // }

        public function addProduct($request){

            $product_name = $request['product_name'];
            $price = $request['price'];
            $quantity = $request['quantity'];

            $sql = "INSERT INTO products (product_name, price, quantity) VALUES ('$product_name', '$price', '$quantity')";

            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            } else {
                die("Error adding the product: " . $this->conn->error);
            }
        }

        public function displaySpecificProduct($product_id){
            $sql = "SELECT * FROM products WHERE id = $product_id";
            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc(); 
            } else {
                die("Error in retreiving the product: " . $conn->error);
            }
        }


        public function updateProduct($product_id, $product_name, $price, $quantity){

            $sql = "UPDATE products SET product_name = '$product_name', price = '$price', quantity = '$quantity' WHERE products.id = $product_id";

            if($this->conn->query($sql)){
            
                header("location: ../views/dashboard.php");
                exit;
            } else {
                die("Error updating the product: " . $this->conn->error);
            }
        }

        public function deleteProduct(){
            session_start();
            $id = $_SESSION['id'];

            $sql = "DELETE FROM products WHERE products.id = $id";
            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            } else {
                die("Error deleting the product: " . $this->conn->error);
            }
        }


    }

?>