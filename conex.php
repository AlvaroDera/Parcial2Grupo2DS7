<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";  // Servidor MySQL
$username = "root";         // Nombre de usuario de MySQL
$password = "";             // Contraseña de MySQL
$dbname = "conexbd";    // Nombre de la base de datos

try {
    $pdo = new PDO("mysql:host=localhost;dbname=conexbd", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>