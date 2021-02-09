<?php

/**
 * This file is called by ajax_fetch.js by an AJAX request.
 * 
 * The file builds an query of all the checkboxes and 
 * outputs it in a Bootstrap Card
 */

require_once 'inc/db.inc.php';

if (isset($_POST['action'])) {

    // Select all products where product_id is not empty
    $sql = "SELECT * FROM products WHERE product_id IS NOT NULL ";
}

// Check product_type
if (isset($_POST['type'])) {
    // Convert array of all selected types to a sting
    $type = implode("','", $_POST['type']);
    // expand query. check if selected brand is found in product/row
    $sql .= "AND product_type IN('" . $type . "')";
    // echo "<br />found type<br />";
}


// The same principle for brand

if (isset($_POST['brand'])) {
    // Convert array of all selected types to a sting
    $brand = implode("','", $_POST['brand']);
    // expand query. check if selected brand is found in product/row
    $sql .= "AND product_brand IN('" . $brand . "')";
}

// Same for color

if (isset($_POST['color'])) {

    // Convert array of all selected types to a sting
    $color = implode("','", $_POST['color']);
    // expand query. check if selected brand is found in product/row
    $sql .= "AND product_color IN('" . $color . "')";
}

// Execute the final query
$stmt = $pdo->query($sql);

// Init $output
$output = '';

// Loop rows to add to $output
if ($stmt->rowCount() > 0) {

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        // Display found results in a card, like in index.php and save in $output
        $output .= '
        <div class="card" style="width: 22rem; margin: 2rem; border:none;">
                            <img src="img/' . $row['product_image'] . '" class="card-img-top" height="350px" alt="Baby accessoiry">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['product_brand'] . ' ' . $row['product_type'] . '</h5>
                                <p class="card-text">
                                    <b>Color: ' . $row['product_color'] . '</b><br />
                                    Some quick example text to build on the card title and make up the bulk of the cards content.
                                </p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
        ';
    }
} else { //If nothing found
    $output = '<h3 class="text-danger text-center">No products found</h3>';
}
// Echo $output
echo $output;
