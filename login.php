<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar y ejecutar la consulta SQL para autenticar al usuario
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuario autenticado correctamente
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['firstName'] = $row['firstName']; // Guardar el nombre en la sesión

        // Añade esta línea para establecer $_SESSION['user_id']
        $_SESSION['user_id'] = $row['id']; // Suponiendo que 'id' es el nombre de la columna en la tabla users que contiene el ID del usuario

        // Redirigir al usuario al index.php o al dashboard.php
        header("Location: index.php"); // O reemplaza 'index.php' con la página a la que quieras redirigir al usuario después de iniciar sesión
        exit();
    } else {
        // Autenticación fallida
        $_SESSION['error_message'] = "Inicio de sesión fallido. Por favor, verifique sus credenciales.";
        header("Location: login.php");
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In - Tu Proyecto</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Ajusta la ruta según tu estructura de archivos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <meta name="theme-color" content="#fafafa">
</head>

<body>
    <div id="container">
        <section class="login-section">
            <div class="title-web">
                <h1 class="big-title">Log In</h1>

                <form action="login.php" method="post">
                    <!-- Ajusta la acción y método del formulario según tus necesidades -->
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit" class="login-button">Log In</button>
                </form>

            </div>
        </section>

        <footer>
            <!-- Footer content, similar to the one you provided -->
        </footer>

    </div>
</body>

</html>
