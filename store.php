<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Raktár Program</title>
    <link rel="icon" type="image/x-icon" href="icon.ico">
</head>
<body class="body">


<?php 
    require_once('ItemRepository.php');
    $itemRepository = new ItemRepository();
    $stores = $itemRepository->getAllStores();

    $id_store = isset($_GET['id_store']) ? intval($_GET['id_store']) : 0;

    if (!isset($rows)) {
        $rows = $itemRepository->getRowsByStoreId($id_store);
    }

    if (!isset($columns)) {
        $columns = $itemRepository->getAllColumns();
    }

    if (!isset($shelves)) {
        $shelves = $itemRepository->getAllShelves();
    }

    if (!isset($products)) {
        $products = $itemRepository->getAllProducts();
    }

    
?>

<div class="cim">
    <h1 class="name">
        <span><?php echo $stores[$id_store-1]['name'];?></span>
    </h1>
</div>

<?php

foreach ($rows as $row) {
    echo '<div class="storeList">';
    echo '<table class="custom-table">';
    echo '<tr class="boltokHeader">';
    echo '<td style="padding: 5px;">' . $row['name'] . '</td>';
    echo '<td style="padding: 5px;"></td>';
    echo '<td style="padding: 5px;"></td>';
    echo '</tr>';


    echo '<tr>';
    echo '<td style="padding: 5px;"></td>';
    
    foreach ($columns as $column) {
        
        if ($column['id_row'] == $row['id_store']) {
            echo '<td style="padding: 5px;">' . $column['name'] . '</td>';
        }
    }
    echo '</tr>';

   
   
   
    /*
    foreach ($shelves as $shelf) {
        echo '<tr>';
        if ($shelf['id_column']+1 == $column['id_row']) {
            
            echo '<td>' . $shelf['name'] . '</td>';
        }
        foreach ($products as $product) {
       
            if ($product['id_shelf']+2 == $shelf['id_column']) {
                
                echo '<td><a href="products.php?product_id=' . $product['id'] . '"><button class="stores-btn">' . $product['name'] . '</button></td>';
            } 
        }
        echo '</tr>';
    }
    */

    foreach ($shelves as $shelf) {
        echo '<tr>';
        // Output shelf name in a table cell
        echo '<td>' . $shelf['name'] . '</td>';
    
        // Output products in the same row as the shelf
        foreach ($products as $product) {
            if ($product['id_shelf'] == $shelf['id_column']) {
                echo '<td><a href="products.php?product_id=' . $product['id'] . '"><button class="stores-btn">' . $product['name'] . '</button></a></td>';
            }
        }
    
        echo '</tr>';
    }
    
    
    

    echo '</table>';
    echo '</div>';
}

?> 



</body>
<div class="footerOne">
<footer>&copy; Copyright Protected. All rights reserved. &reg; 2024</footer>
</div>
</html>