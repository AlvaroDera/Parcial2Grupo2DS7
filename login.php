<?php
// Incluir archivo de configuración para la conexión a la base de datos
include('conex.php');

// Procesar los datos cuando el formulario sea enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = htmlspecialchars($_POST['usuario']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptación segura

    // Inserta el nuevo usuario en la base de datos
    $stmt = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
    $stmt->execute([$user, $pass]);

    echo "Registro exitoso.";

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashed_password = $row['password'];

        // Verificar si la contraseña ingresada coincide con la almacenada
        if (password_verify($password, $hashed_password)) {
            echo "Bienvenido, $username!";
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesion</title>
</head>
<body>
  <div class="container">
  <form id="login-form" class="login-form" method="POST">
  <h2>Iniciar Sesion</h2>
  <input type="text" id="username" name="username" placeholder="Nombre de usuario" required>
  <input type="password" id="password" name="password" placeholder="Contraseña" required>
  <button type="submit"> Ingresar </button>
</form>
    <p>¿No tienes cuenta? <a href="registro.php">Registrarse</a></p>
  </div> 
</body>
</html>