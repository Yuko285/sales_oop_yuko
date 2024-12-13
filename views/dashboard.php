<?php
    session_start();

    require "../classes/Product.php";

    $product = new Product;
    $all_products = $product->getAllProducts();
    //print_r($all_users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CDN CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CDN FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link CSS -->
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Sales OOP</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name'] ?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h2 class="text-center">PRODUTC LIST</h2>

            <div class="col text-end">
                <a href="add-product.php" class="btn btn-success">
                    <i class="fa-solid fa-plus-circle"></i> New Product
                </a>
            </div>

            <table class="table table-hover align-middle">
            <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($product = $all_products->fetch_assoc()){
                            // print_r($user);
                    ?>
                        <tr>
                            <td>
                               
                            </td>
                            <td>
                                <?= $product['id'] ?>
                            </td>
                            <td>
                                <?= $product['product_name'] ?>
                            </td>
                            <td>
                                <?= $product['price'] ?>
                            </td>
                            <td>
                                <?= $product['quantity'] ?>
                            </td>
                            <td>
                                <?php
                                    // if($_SESSION['id'] == $product['id']){
                                ?>
                                    <a href="edit-product.php?product_id=<?= $product['id'] ?>" class="btn
                                    btn-outline-warning" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="delete-product.php" class="btn
                                    btn-outline-danger" title="Delete"><i class="fa-solid fa-trash"></i></a>
                                <?php
                                    // }
                                ?>
                            </td>
                        </tr>

                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>