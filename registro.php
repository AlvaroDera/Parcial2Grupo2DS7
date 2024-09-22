<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
<h2>Registro de Aspirantes</h2>
    <form action="registro.php" method="POST" class="form">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

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
