<?php

class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = ""; // Pas d'espace, chaîne vide si pas de mot de passe
    public $conn;

    public function __construct() {
        // Création de la connexion
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);

        // Vérification de la connexion
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function createDatabase($dbName) {
        // Création d'une base de données
        $sql = "CREATE DATABASE $dbName";
        if (mysqli_query($this->conn, $sql)) {
            echo "Database '$dbName' created successfully.<br>";
        } else {
            echo "Error creating database: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function selectDatabase($dbName) {
        // Sélectionner une base de données
        if (mysqli_select_db($this->conn, $dbName)) {
            echo "Database '$dbName' selected successfully.<br>";
        } else {
            echo "Error selecting database: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function createTable($query) {
        // Création d'une table avec une requête
        if (mysqli_query($this->conn, $query)) {
            echo "Table created successfully.<br>";
        } else {
            echo "Error creating table: " . mysqli_error($this->conn) . "<br>";
        }
    }
}

?>
