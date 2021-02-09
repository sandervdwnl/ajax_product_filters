<?php

/**
 * Index.phpis used to show all the products, when the page is loaded for the first time.
 * 
 * The sidebar contains all the filters, which are added to the database.
 * 
 * The main section uses Bootstrap cards to display all the products.
 */

// Database connection
require_once 'inc/db.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CDN CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <!-- Bootstrap 5 CDN JS Bundle -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <!-- Jquery 3.5.1 CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>AJAX Product Filters</title>
</head>

<body>
    <h1 class="text-center text-secondary bg-info p-2">AJAX Product Filters</h1>

    <div class="container-fluid">
        <div class="row">
            <!-- Side menu with filters -->

            <div class="col-md-2 border-right border-dark mt-2">
                <h3>Filter products</h3>
                <hr>
                <!-- Product Type -->

                <h5>Product Type:</h5>
                <ul>
                    <?php
                    // Select all existing product_types
                    $sql = "SELECT DISTINCT product_type FROM products ORDER BY product_type";
                    $stmt = $pdo->query($sql);
                    // Echo with a while loop in checboxes
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                        <div class="form-check">
                            <!-- Classname product_chechbox is used for AJAX in ajax_fetch.js -->
                            <!-- uc words capitalizes each first letter of each word -->
                            <input type="checkbox" class="product_checkbox form-check-input product_type" value="<?php echo $row['product_type']; ?>"><?php echo ucwords($row['product_type']); ?>
                        </div>

                    <?php } ?>
                </ul>
                <hr>

                <!-- Product Brand -->

                <h5>Brand:</h5>
                <ul>
                    <?php
                    $sql = "SELECT DISTINCT product_brand FROM products ORDER BY product_brand";
                    $stmt = $pdo->query($sql);

                    // Echo results with while loop in a unordered list.
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                        <div class="form-check">
                            <!-- Classname product_chechbox is used for AJAX in ajax_fetch.js -->
                            <!-- uc words capitalizes each first letter of each word -->
                            <input type="checkbox" class="product_checkbox form-check-input product_brand" value="<?php echo $row['product_brand']; ?>"><?php echo ucwords($row['product_brand']); ?>
                        </div>

                    <?php } ?>
                </ul>
                <hr>

                <!-- Product Colors -->

                <h5>Colors:</h5>
                <ul>
                    <?php
                    // Echo results with while loop in a unordered list.
                    $sql = "SELECT DISTINCT product_color FROM products ORDER BY product_color";
                    $stmt = $pdo->query($sql);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                        <!-- Classname product_chechbox is used for AJAX in ajax_fetch.js -->
                        <!-- uc words capitalizes each first letter of each word -->
                        <div class="form-check">
                            <input type="checkbox" class="product_checkbox form-check-input product_color" value="<?php echo $row['product_color']; ?>"><?php echo ucwords($row['product_color']); ?>
                        </div>

                    <?php } ?>
                </ul>

            </div>

            <!-- Main section -->

            <!-- Products -->
            <div class="col-md-10">
                <img src="img/preloader.gif" alt="" id="preloader" width="150px" style="margin-left:45%;margin-top:10%;display:none;">
                <!-- Id results is used in ajax_fetch.js to echo results and preloader -->
                <div class="row" id="results">
                    <?php
                    // Select all products
                    $sql = "SELECT * FROM products";
                    $stmt = $pdo->query($sql);

                    // Echo results in Bootstrap cards with a while loop
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                        <div class="card" style="width: 22rem; margin: 2rem; border:none">
                            <img src="img/<?php echo $row['product_image']; ?>" class="card-img-top" alt="Baby accessoiry" height="350px">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['product_brand'] . ' ' . $row['product_type']; ?></h5>
                                <p class="card-text">
                                    <b>Color: <?php echo $row['product_color']; ?></b><br />
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Local file for AJAX script -->
    <script src="ajax_fetch.js" async></script>
</body>

</html>