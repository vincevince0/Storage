<?php
class ItemRepository
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli("localhost", "root", "", "raktar");
        $this->mysqli->set_charset("utf8mb4");
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function getAllStores()
    {
        $stores = [];

        $sql = "SELECT * FROM stores";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $stores[] = $row;
            }
        }

        return $stores;    
    }


    public function getAllColumns()
    {
        $columns = [];

        $sql = "SELECT * FROM columns";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $columns[] = $row;
            }
        }

        return $columns;    
    }

    public function getAllShelves()
    {
        $shelves = [];

        $sql = "SELECT * FROM shelves";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $shelves[] = $row;
            }
        }

        return $shelves;    
    }

    public function getAllProducts()
    {
        $products = [];

        $sql = "SELECT * FROM products";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        return $products;    
    }
    public function getRowsByStoreId($id_store)
    {
        $rows = [];
        
        $sql = "SELECT * FROM sorok WHERE id_store = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id_store);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
            }
        }
        return  $rows;
        
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('s', $id);

        $stmt->execute();
    }

    public function saveProduct($product, $id)
    {
        $sql = "INSERT INTO `products`(`product`) VALUES (?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("si", $product, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateProduct($product, $id)
    {
        $sql = "UPDATE products SET product = $product WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('si', $product, $id);

        $stmt->execute();
    }

    public function closeConnection()
    {
        $this->mysqli->close();
    }
}