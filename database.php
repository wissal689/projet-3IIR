<?php

// Inclure le fichier de connexion
include('connection.php');

// Créer une instance de la classe Connection
$connection = new Connection();

// Créer la base de données "wissalpoo" si elle n'existe pas
$connection->createDatabase('wissalpoo');

// Sélectionner la base de données "wissalpoo"
$connection->selectDatabase('wissalpoo');

// Créer la table Cities
$query0 = "
CREATE TABLE IF NOT EXISTS Cities (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cityName VARCHAR(30) NOT NULL
)";

// Créer la table Clients
$query = "
CREATE TABLE IF NOT EXISTS Clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    idCity INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (idCity) REFERENCES Cities(id)
)
";

// Exécuter la création de la table Cities
$connection->createTable($query0);

// Exécuter la création de la table Clients
$connection->createTable($query);

?>
