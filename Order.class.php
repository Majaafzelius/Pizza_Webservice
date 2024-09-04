
<?php

Class Order {
    public $order_id;
    public $name;
    public $phoneNumber;
    public $time;
    public $food;
    private $conn;
    function __construct() {
        // $this->conn = new mysqli('localhost', 'root', 'lpslps', 'rest');
        $this->conn = new mysqli('studentmysql.miun.se', 'maaf2200', 'm3WM!VLkq7', 'maaf2200');
    }

    function getOrders() {
        $sql = 'SELECT * from orders';
        $result = $this->conn->query($sql);
        return $result;
    }
    
    function getOrderById($order_id) {
        $sql = "SELECT * FROM orders WHERE order_id=$order_id";
        $result = $this->conn->query($sql);
        return $result;
    }

    function createOrder($name, $phoneNumber, $time, $food) {
        $sql = "INSERT INTO orders (name, phoneNumber, time, food) VALUES ('$name', '$phoneNumber', '$time', '$food')";
        $this->conn->query($sql);
    }

    function completeOrder($order_id) {
        $sql = "DELETE FROM orders WHERE order_id=$order_id";
        if($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}