<?php
class Connection {
    public $conn;

    public function __construct() {
        // Connexion à la base de données MySQL
        $this->conn = new mysqli("localhost", "root", "", "");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Méthode pour créer une base de données si elle n'existe pas déjà
    public function createDatabase($dbName) {
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        if ($this->conn->query($sql) === TRUE) {
            echo "Database created successfully or already exists.<br>";
        } else {
            echo "Error creating database: " . $this->conn->error . "<br>";
        }
    }

    // Méthode pour sélectionner une base de données
    public function selectDatabase($dbName) {
        $this->conn->select_db($dbName);
    }

    // Méthode pour créer une table si elle n'existe pas déjà
    public function createTable($query) {
        if ($this->conn->query($query) === TRUE) {
            echo "Table created successfully or already exists.<br>";
        } else {
            echo "Error creating table: " . $this->conn->error . "<br>";
        }
    }
}
?>
