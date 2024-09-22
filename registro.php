<?php 

include 'conex.php'; // Incluir el archivo de conexión 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['usuario']);
    $password = $_POST['password']; 
    $nombre = htmlspecialchars($_POST['nombre']); 
    $apellido = htmlspecialchars($_POST['apellido']);
    $estado = htmlspecialchars($_POST['estado_civil']); 
    $Nacimiento = htmlspecialchars($_POST['fecha_nacimiento']); 
    $telefono = htmlspecialchars($_POST['telefono']); 
    $residencia = htmlspecialchars($_POST['residencia']); 
    $nacionalidad = htmlspecialchars($_POST['nacionalidad']); 
    $tipoSangre = htmlspecialchars($_POST['tipo_sangre']);  
    $correo = htmlspecialchars($_POST['correo_electronico']); 
    $genero = htmlspecialchars($_POST['genero']); 
    $cedula_pasaporte = htmlspecialchars($_POST['cedula_pasaporte']); 

    $error = false; // Variable para manejar errores

    // Validación de la contraseña
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        echo "La contraseña debe tener al menos 8 caracteres, incluyendo letras, números y caracteres especiales.<br>";
        $error = true; // Se establece que hay un error
    } 

    // Verificar si el nombre de usuario ya está registrado
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        echo "El nombre de usuario ya está en uso.<br>";
        $error = true; // Se establece que hay un error
    } 
// Si no hay errores, continuar con el registro
    if (!$error) {
        // Cifrar la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertar en la base de datos
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, password, Nombre, Apellido, Estado_Civil, Nacimiento, Telefono, Residencia, Nacionalidad,Sangre,Genero,correo,Cedula_pasaporte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$username, $hashedPassword, $nombre, $apellido, $estado, $Nacimiento, $telefono, $residencia, $nacionalidad, $tipoSangre,$genero,$correo,$cedula_pasaporte])) {
            echo "Registro exitoso.";
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="estilo1.css"> 
    <title>Registro</title>
</head>
<body>
<h2>Registro de Aspirantes</h2>
    <form action="registro.php" method="POST" class="form">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required > 
<br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="cedula_pasaporte">Cédula o Pasaporte:</label><br>
        <input type="text" id="cedula_pasaporte" name="cedula_pasaporte" required><br><br>

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="estado_civil">Estado Civil:</label><br>
        <input type="text" id="estado_civil" name="estado_civil"><br><br>

        <label for="genero">Género:</label><br>
        <select id="genero" name="genero" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
        </select><br><br>

        <label for="tipo_sangre">Tipo de Sangre:</label><br>
        <input type="text" id="tipo_sangre" name="tipo_sangre"><br><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>

        <label for="nacionalidad">Nacionalidad:</label><br>
        <input type="text" id="nacionalidad" name="nacionalidad" required><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="residencia">Residencia:</label><br>
        <input type="text" id="residencia" name="residencia" required><br><br>

        <label for="correo_electronico">Correo Electrónico:</label><br>
        <input type="email" id="correo_electronico" name="correo_electronico" required><br><br>

        <input type="submit" value="Registrar">
    </form>

    <!-- Botón de Iniciar Sesión -->
    <form action="login.php" method="GET">
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
