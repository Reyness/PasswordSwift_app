<?php
// Iniciar la sesión
session_start();

// Establecer la conexión con la base de datos
$servername = "localhost"; // Cambia esto por la dirección del servidor de tu base de datos
$username = "edib"; // Cambia esto por tu nombre de usuario de la base de datos
$password = "edib"; // Cambia esto por tu contraseña de la base de datos
$dbname = "PasswordSwift"; // Cambia esto por el nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $mobileNumber = $_POST['mobileNumber'];

    // Verificar si el correo electrónico ya está en uso
    $sql_check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql_check_email);
    if ($result->num_rows > 0) {
        // El correo electrónico ya está en uso, mostrar un mensaje de error
        echo "El correo electrónico ya está en uso. Por favor, elija otro.";
    } else {
        // Consulta SQL para insertar el nuevo usuario en la tabla "users"
        $sql_insert_user = "INSERT INTO users (firstName, lastName, email, password, country, mobileNumber) VALUES ('$firstName', '$secondName', '$email', '$password', '$country', '$mobileNumber')";

        // Ejecutar la consulta para insertar el nuevo usuario
        if ($conn->query($sql_insert_user) === TRUE) {
            // Obtener el ID de usuario recién insertado
            $usuario_id = $conn->insert_id;

            // Consulta SQL para insertar los datos en la tabla "registros" con el ID de usuario
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            // Agregar un valor predeterminado para la columna "pagina_web"
            $pagina_web = ""; // Esto es solo un ejemplo, cambia el valor según lo necesites
            $sql_insert_registro = "INSERT INTO registros (usuario, contrasena, usuario_id, pagina_web) VALUES ('$usuario', '$contrasena', '$usuario_id', '$pagina_web')";

            // Ejecutar la consulta para insertar los datos en la tabla "registros"
            if ($conn->query($sql_insert_registro) === TRUE) {
                echo "<p class='success-message'>Los datos se han guardado correctamente.</p>";

                // Redirigir al usuario al index.php después de registrar
                header("Location: index.php");
                exit();
            } else {
                echo "Error al insertar datos en registros: " . $conn->error;
            }
        } else {
            echo "Error al insertar usuario: " . $conn->error;
        }
    }
}

// Cerrar la conexión
$conn->close();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - Tu Proyecto</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Ajusta la ruta según tu estructura de archivos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <meta name="theme-color" content="#fafafa">
</head>

<body>
    <div id="container">
        <section class="signup-section" id="signup-section">
            <div class="signup-container">
                <img src="img/desktop/login-wallpaper.png" alt="Signup Image" class="signup-image">
                <div class="title-web">
                    <h1 class="big-title">Sign Up</h1>
                    <form action="register.php" method="post" class="signup-form">
                        <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
                        <input type="text" id="secondName" name="secondName" placeholder="Second Name" required>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <input type="password" id="repeatPassword" name="repeatPassword" placeholder="Repeat Password"
                            required>
                        <input type="text" id="country" name="country" placeholder="Country">
                        <input type="tel" id="mobileNumber" name="mobileNumber" placeholder="Mobile Number">

                        <div class="accept-terms">
                            <input type="checkbox" id="acceptTerms" required>
                            <label for="acceptTerms">I accept all the terms of use</label>
                        </div>

                        <button type="submit" class="register-button">Register</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
