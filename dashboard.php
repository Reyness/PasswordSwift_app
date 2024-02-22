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
    $pagina_web = $_POST['pagina_web']; // Nuevo campo para la página web
    // Obtener el ID de usuario de la sesión actual
    $usuario_id = $_SESSION['user_id'];

    // Consulta SQL para insertar los datos en la tabla "registros"
    $sql_insert = "INSERT INTO registros (usuario, contrasena, pagina_web, usuario_id) VALUES ('$usuario', '$contrasena', '$pagina_web', '$usuario_id')";

    // Ejecutar la consulta
    if ($conn->query($sql_insert) === TRUE) {
        echo "<p class='success-message'>Los datos se han guardado correctamente.</p>";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

// Consulta SQL para seleccionar todos los registros de la tabla "registros" para el usuario actual
$sql = "SELECT usuario, contrasena, pagina_web FROM registros WHERE usuario_id = " . $_SESSION['user_id'];
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* ESTILOS GENERALES */
        /* Colores */
        :root {
            --primary-color: #91A4CD;
            --secondary-color: #F27E31;
            --accent-color: #F26101;
            --background-color: #304269;
            --text-color: #FFF;
            --form-bg-color: #fff;
            --table-bg-color: #fff;
        }
        /* ROOT */
        * {
            margin: 0;
            padding: 0;
            line-height: 1;
            box-sizing: border-box;
            text-decoration: none;
        }
        body {
            background-color: var(--background-color);
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 30px;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1, h2 {
            text-align: center;
            color: var(--primary-color);
        }
        form {
            background-color: var(--form-bg-color);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            color: black;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: calc(100% - 22px);
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: var(--primary-color);
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        p.success-message {
            color: #27ae60;
            text-align: center;
            margin-top: 10px;
        }
        table {
            width: 100%;
            background-color: var(--table-bg-color);
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: var(--primary-color);
            color: white;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a.logout-link {
            color: #c0392b;
            text-decoration: none;
            margin-top: 20px;
            display: block;
            text-align: center;
        }
        a.logout-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido al dashboard</h1>
        
        <h2>Mis cuentas</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="pagina_web">Página Web:</label>
            <input type="text" id="pagina_web" name="pagina_web" required>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <input type="submit" value="Guardar">
        </form>

        <h2>Registros</h2>
        <table>
            <thead>
                <tr>
                    <th>Página Web</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["pagina_web"] . "</td>";
                        echo "<td>" . $row["usuario"] . "</td>";
                        echo "<td>" . $row["contrasena"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay registros</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="logout.php" class="logout-link">Cerrar sesión</a>
    </div>
</body>
</html>
