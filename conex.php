<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";  // Servidor MySQL
$username = "root";         // Nombre de usuario de MySQL
$password = "";             // Contraseña de MySQL
$dbname = "usuarios_db";    // Nombre de la base de datos

try {
    $pdo = new PDO("mysql:host=localhost;dbname=usuarios_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>