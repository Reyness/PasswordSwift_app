<?php
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

// Iniciar sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    die("Error: El usuario no está autenticado.");
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    // Obtener el ID de usuario de la sesión actual
    $usuario_id = $_SESSION['user_id'];

    // Consulta SQL para insertar los datos en la tabla "registros"
    $sql_insert = "INSERT INTO registros (usuario, contrasena, usuario_id) VALUES ('$usuario', '$contrasena', '$usuario_id')";

    // Ejecutar la consulta
    if ($conn->query($sql_insert) === TRUE) {
        echo "<p class='success-message'>Los datos se han guardado correctamente.</p>";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

// Consulta SQL para seleccionar todos los registros de la tabla "registros" para el usuario actual
$sql = "SELECT usuario, contrasena FROM registros WHERE usuario_id = " . $_SESSION['user_id'];
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Estilos generales */
        :root {
            --primary-color: #91A4CD;
            --text-color: #FFF;
            --background-color: #304269;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: "Inter", sans-serif;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            background-color: #516A99;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            color: var(--text-color);
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 300px;
            max-width: 100%;
        }

        input[type="submit"] {
            background-color: var(--primary-color);
            color: var(--text-color);
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #F27E31;
        }

        p.success-message {
            color: #00FF00;
            text-align: center;
            margin-top: 10px;
        }

        a.logout-link {
            color: #F26101;
            text-decoration: none;
            margin-top: 20px;
        }

        a.logout-link:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--primary-color);
            color: var(--text-color);
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="tu_logo.png" alt="Logo">
    </div>

    <h1>Bienvenido al dashboard</h1>
    
    <h2>Mis cuentas</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Guardar">
    </form>

    <h2>Registros</h2>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Contraseña</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verificar si hay registros
            if ($result->num_rows > 0) {
                // Muestra cada registro como una fila en la tabla
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["usuario"] . "</td>";
                    echo "<td>" . $row["contrasena"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No hay registros</td></tr>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </tbody>
    </table>

    <a href="logout.php" class="logout-link">Cerrar sesión</a>
</body>
</html>
