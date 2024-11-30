<?php

class City {
    public $id;
    public $cityName;

    // Sélectionner toutes les villes
    public static function selectAllCities($tableName, $conn) {
        $sql = "SELECT id, cityName FROM $tableName";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $table = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $table[] = $row;
            }
            return $table;
        }
        return [];
    }

    // Sélectionner une ville par ID
    public static function selectCityById($tableName, $conn, $id) {
        $sql = "SELECT cityName FROM $tableName WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }

    // Insérer une nouvelle ville
    public static function insertCity($tableName, $conn, $cityName) {
        $sql = "INSERT INTO $tableName (cityName) VALUES ('$cityName')";
        
        if (mysqli_query($conn, $sql)) {
            echo "City '$cityName' inserted successfully.<br>";
        } else {
            echo "Error inserting city: " . mysqli_error($conn) . "<br>";
        }
    }
}
?>

