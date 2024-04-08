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
        <span><?php echo $products[$product_id]['name'];?></span>
    </h1>
</div>




</body>
<div class="footerOne">
<footer>&copy; Copyright Protected. All rights reserved. &reg; 2024</footer>
</div>
</html>