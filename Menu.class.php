
<?php
// Utvecklad av Maja Afzelius som en del av kursern Webbutveckling III på webbutvecklingsprogrammet 

class Dish {
    public $id;
    public $dishName;
    public $dishContents;
    public $dishPrice;
    private $conn;
    public function __construct() {
        // $this->conn = new mysqli('localhost', 'root', 'lpslps', 'rest');
        $this->conn = new mysqli('studentmysql.miun.se', 'maaf2200', 'm3WM!VLkq7', 'maaf2200');
    }
    function getDish() { //Hämta kurser från databasen
        $sql = 'SELECT * from menu';
        $result = $this->conn->query($sql);
        return $result;
    }
    function setDish($dishName, $dishContents, $dishPrice) { // lägg in data i databasen
        $sql = "INSERT INTO menu (dishName, dishContents, dishPrice) values ('$dishName', '$dishContents', '$dishPrice')";
        $this->conn->query($sql);
    }
    function getDishById($id) { //hämta maträtt med specifikt id
        $sql = "SELECT * from menu WHERE id=$id";
        $result = $this->conn->query($sql);
        return $result;
    }
    function setDishById($id, $dishName, $dishContents, $dishPrice) {
        $sql = "UPDATE menu SET dishName = '$dishName', dishContents = '$dishContents', dishPrice = '$dishPrice' WHERE id = $id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    function deleteDish($id) { // Ta bort vald kurs från databasen
        $sql = "DELETE FROM menu WHERE id=$id";
        if($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}