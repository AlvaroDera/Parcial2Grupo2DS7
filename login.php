<?php
session_start();
include 'conex.php'; // Archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = htmlspecialchars($_POST['usuario']);
    $pass = $_POST['password'];

    // Buscar el usuario en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$user]);
    $userRecord = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario está registrado
    if ($userRecord) {
        // Si existe, verificar la contraseña
        if (password_verify($pass, $userRecord['password'])) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['username'] = $userRecord['username'];
            header("Location: dashboard.php"); // Redirigir al área de usuario
            exit();
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta. Inténtalo de nuevo.";
        }
    } else {
        // Usuario no registrado
        echo "El usuario no está registrado. Por favor, regístrate antes de intentar iniciar sesión.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" href="estilo.css"> 
  <title>Iniciar Sesion</title>
</head>
<body>
  <div class="container">
  <form id="login-form" class="login-form" method="POST">
  <h2>Iniciar Sesión</h2>
  <input type="text" id="usuarios" name="usuario" placeholder="Nombre de usuario" required>
  <input type="password" id="password" name="password" placeholder="Contraseña" required>
  <button type="submit">Ingresar</button>
</form>
    <p>¿No tienes cuenta? <a href="registro.php">Registrarse</a></p>
  </div> 
</body>
</html>