<?php
// test_connection.php

// Verbindung zur MySQL-Datenbank herstellen
$servername = "mysql_container";
$username = "root";
$password = "";
$dbname = "sdm_db"; // Datenbankname -> ./db-init/init-database.sql

// Verbindung erstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
echo "Erfolgreich verbunden zur MySQL-Datenbank";
$conn->close();
?>