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
    <!-- color palette -->
    <!-- https://coolors.co/090809-f40000-f44e3f-f4796b -->

    <div class="cim">
    <h1 class="name">
        <!-- <img src="raktarheader.png" alt=""> -->
        <span>Nyilvántartó program</span>
    </h1>
    </div>

    
    <form method="post" action="index.php">
    <div class="telepites">
        <h2>Adatbázis telepítése: <button type="submit" name="btn-install" class="btn-install" id="btn-install" >Telepítés</button>
        <input class="btn-install" type="text">
       <!-- <button type="file" name="btn-import" class="btn-import" id="btn-import" >Import</button> -->
        <input type="file" name="fileToImport" id="fileToImport" class="input-file" style="display: none;">
        <label for="fileToImport" class="btn-import">Import</label>
        <!-- <button type="submit" name="btn-export" class="btn-export" id="btn-export" >Export</button> -->
      <a href="path_to_your_file" download="stores.csv" class="btn-export">Export</a>
    </h2>

    </div>
    </form>

    <?php

    require_once('ItemRepository.php');
    $itemRepository = new ItemRepository();
    
    
    if (isset($_POST['btn-install'])) {
        $stores = $itemRepository->getAllStores();
        
        echo '<div class="storeList">';
        echo '<table class="custom-table">';
        echo '<tr class="boltokHeader">';
        echo '<td style="padding: 5px;">id</td>';
        echo '<td style="padding: 5px;">Név</td>';
        echo '<td style="padding: 5px;">Utca</td>';
        echo '</tr>';
    
        for ($i = 0; $i < count($stores); $i++) {
            echo '<tr>'; 
            echo '<td>' . $stores[$i]['id'] . '</td>';
            echo '<td><a href="store.php?id_store=' . $stores[$i]['id'] . '"><button class="stores-btn">' . $stores[$i]['name'] . '</button></td>';
            echo '<td>' . $stores[$i]['address'] . '</td>';
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