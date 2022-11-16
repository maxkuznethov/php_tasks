<?php
include('database.php');
class Order{
    public $id;
    public $name;
    public $total_price;

    function __construct($p_name, $p_price,$p_id=0) {
        $this->id =$p_id;
        $this->name = $p_name;
        $this->total_price = $p_price;
    }
}
class OrderRepository{

    public static function create($name, $total_price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("INSERT INTO orders (name, total_price) VALUES ('$name', '$total_price')");
    }
    
    public static function read() {
        $response = [];
        $mysqli = ConnectionDB::getInstance();
        $result = $mysqli->query("SELECT * FROM orders");
        foreach ($result as $row){
            $response[count($response)] = new Order($row['name'], $row['total_price'], $row['ID']);
        }
        return $response;
    }
    
    public static function update($id, $name, $total_price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("UPDATE orders SET name = '$name', total_price = '$total_price' WHERE id = '$id'");
    }
    
    public static function delete($id) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("DELETE FROM orders where id = '$id'");
    }
}
?>