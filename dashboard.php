<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Cerrar sesión y redirigir si el botón ha sido presionado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Destruir todas las variables de sesión
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Has iniciado sesión correctamente.</p>

    <form action="" method="post"> <!-- Formulario apunta a la misma página -->
        <button type="submit">Cerrar Sesión</button>
    </form>
</body>
</html>