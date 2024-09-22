<?php
session_start();
include 'conex.php'; // Archivo para la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['usuarios']) && isset($_POST['password'])) {
        $username = htmlspecialchars($_POST['usuario']);
        $password = $_POST['password'];
    }
    // Consulta para obtener los datos del usuario
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php"); // Redirigir al área de usuario
        exit();
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
