<?php
session_start();
include 'conex.php'; // Archivo de conexión a la base de datos

$mensaje = ""; // Inicializar el mensaje como vacío

// Inicializar el contador de intentos fallidos y el tiempo de bloqueo si no existen
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['lock_time'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si el usuario está bloqueado
    if ($_SESSION['login_attempts'] >= 3) {
        $lock_duration = 50; // segundos de bloqueo
        $remaining_time = time() - $_SESSION['lock_time'];

        if ($remaining_time < $lock_duration) {
            $mensaje = "Demasiados intentos fallidos. Por favor, espera " . ($lock_duration - $remaining_time) . " segundos para volver a intentarlo.";
        } else {
            // Resetear intentos fallidos y tiempo de bloqueo después de que termine el tiempo de bloqueo
            $_SESSION['login_attempts'] = 0;
            $_SESSION['lock_time'] = 0;
        }
    }

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
            $_SESSION['login_attempts'] = 0; // Reiniciar intentos fallidos
            header("Location: dashboard.php"); // Redirigir al área de usuario
            exit();
        } else {
            // Contraseña incorrecta
            $_SESSION['login_attempts']++; // Incrementar el número de intentos fallidos
            if ($_SESSION['login_attempts'] >= 3) {
                $_SESSION['lock_time'] = time(); // Establecer tiempo de bloqueo
                $mensaje = "Demasiados intentos fallidos. Bloqueo activado por 50 segundos.";
            } else {
                $mensaje = "Contraseña incorrecta. Inténtalo de nuevo.";
            }
        }
    } else {
        // Usuario no registrado
        $mensaje = "El usuario no está registrado. Por favor, regístrate antes de intentar iniciar sesión.";
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
  <input type="text" id="usuarios" name="usuario" placeholder="Nombre de usuario" required maxlength="10">
  <input type="password" id="password" name="password" placeholder="Contraseña" required maxlength="15">
  <button type="submit">Ingresar</button> 
</form> 
  <!-- Aquí se muestra el mensaje -->
  <?php if ($mensaje): ?>
        <p class="error-message"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <p>¿No tienes cuenta? <a href="registro.php">Registrarse</a></p>
  </div> 
</body>
</html>