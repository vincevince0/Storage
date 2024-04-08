<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    if (!isset($products)) {
        $products = $itemRepository->getAllProducts();
    }

    if (isset($_POST['delete-btn'])) {
        
        $id= $_POST['product_id'];

        $itemRepository->deleteProduct($id);
    }

    $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
?>

<div class="cim">
    <h1 class="name">
        <span><?php echo $products[$product_id-1]['name'];?></span>
    </h1>
</div>

<table class="custom-table">
    <?php
        
        echo '<tr><td>Id: </td><td>' . $products[$product_id-1]['id'] . '</td></tr>';
        echo '<tr><td>Name: </td><td>' . $products[$product_id-1]['name'] . '</td></tr>';
        echo '<tr><td>Minimum quantity:  </td><td>' . $products[$product_id-1]['min_qty'] . '</td></tr>';
        echo '<tr><td>Quantity </td><td>' . $products[$product_id-1]['quantity'] . '</td></tr>';
        echo '<tr><td>Price </td><td>' . $products[$product_id-1]['price'] . '</td></tr>';
        
    ?>

</table>

<div class="gombok">
    <table class="modification-table">
        <tr>
            <td><a href="modify.php?product_id=' . $product['product_id'] . '"><button class="modify-btn">Termék módosítása</button></td> 
            <td>
                <form method="post" action="store.php">
                <button type="submit" class="delete-btn" id="delete-btn" name="delete-btn">Termék törlése</button>
                <input type="hidden" name="product_id" value="' . $products['id']. '">
                </form></td>
            
                            
        </tr>
    </table>
</div>

    
    


    
</body>
<div class="footerOne">
<footer>&copy; Copyright Protected. All rights reserved. &reg; 2024</footer>
</div>
</html>