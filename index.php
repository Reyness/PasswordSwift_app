<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Configuración del documento -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Configuración básica de SEO -->
    <title>Generador de Contraseñas Aleatorias</title>
    <meta name="description" content="Cree contraseñas seguras para proteger sus cuentas de Internet">
    <!-- Enlace a la hoja de estilos -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Enlace a las fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Cambio del tema del navegador -->
    <meta name="theme-color" content="#fafafa">
    <!-- Scripts a cargar antes de la renderización -->
    <script src="preloader.js" defer></script>
    <script src="js/animaciones.js" defer></script>
    <script src="js/password-generator.js" defer></script>
</head>

<body>
    <header>
        <?php session_start(); ?>
        <nav>
            <?php
                // Verificar si el usuario ha iniciado sesión
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo "<a href='dashboard.php' class='welcome-link'><span class='welcome-message'>Bienvenido, " . htmlspecialchars($_SESSION['firstName']) . "!</span></a>";
                    echo "<a href='logout.php' class='logout-btn'>Cerrar Sesión</a>";
                } else {
                    echo "<a href='register.php' class='sign-up'>Registrarse</a>"; // Cambio de "Sign Up" a "Registrarse" para consistencia con el idioma
                    echo "<a href='login.php' class='log-in'>Iniciar Sesión</a>"; // Cambio de "Log In" a "Iniciar Sesión" para consistencia con el idioma
                }
            ?>
        </nav>
    </header>

    <main>
        <div class="snap-center">
            <section class="first-page">
                <!-- Título de la página y subtítulo -->
                <div class="title-web">
                    <h1 class="big-title">Generador de <span>Contraseñas</span> Aleatorias</h1>
                    <h4 class="small-title">Cree contraseñas seguras para proteger sus cuentas de <span>Internet</span>
                    </h4>

                    <!-- Entradas para generar contraseñas -->
                    <div class="password-generator">
                        <input class="numbers" type="number" value="8" min="8" max="30" oninput="generatePassword()">
                        <input class="pass-generate" type="text" readonly>
                        <button class="copy-button" onclick="copyToClipboard()">Copiar</button>
                        <span class="refresh-icon" onclick="generatePassword()">
                            <!-- Puedes cambiar el contenido del span con tu propio ícono SVG -->
                            <img src="svg/refresh-pass.svg" alt="Icono de recarga">
                        </span>
                    </div>

                    <!-- Validación de caracteres permitidos -->
                    <div class="validate-characters">
                        <h4 class="text-characters">Caracteres usados:</h4>
                        <input type="checkbox" id="uppercase" checked onclick="generatePassword()"> <label
                            for="uppercase">A-Z</label>
                        <input type="checkbox" id="lowercase" checked onclick="generatePassword()"> <label
                            for="lowercase">a-z</label>
                        <input type="checkbox" id="numbers" checked onclick="generatePassword()"> <label
                            for="numbers">0-9</label>
                        <input type="checkbox" id="symbols" checked onclick="generatePassword()"> <label
                            for="symbols">!@#$%^&*</label>
                    </div>

                    <p class="content-web">
                        Esta herramienta utiliza Javascript para generar contraseñas de forma segura directamente
                        en tu navegador sin necesidad de enviar información sensible a través de la red. Al ejecutarse
                        localmente en
                        tu dispositivo, garantiza una capa adicional de privacidad y seguridad. La generación de
                        contraseñas se
                        realiza
                        mediante algoritmos robustos, lo que garantiza la creación de claves fuertes y difíciles de
                        predecir.
                    </p>

                    <div class="arrow-bottom">
                        <img src="svg/arrow.svg" alt="">
                    </div>

                    <div class="logo-bottom">
                        <img src="svg/logo.svg" alt="">
                    </div>
                </div>
            </section>
        </div>

        <div class="snap-center">
            <section class="second-page">
                <!-- Sección sobre el generador de contraseñas -->
                <h1 class="title-about">¿Qué es un generador de contraseñas?</h1>
                <p class="text-about">Un generador de contraseñas es una herramienta fundamental en el ámbito de la
                    seguridad informática. Se trata de un software diseñado específicamente para crear contraseñas
                    únicas y complejas que son utilizadas para proteger el acceso a sistemas, aplicaciones, cuentas en
                    línea y otros servicios digitales. Estas contraseñas son generadas de manera aleatoria y suelen
                    incluir una combinación de letras (mayúsculas y minúsculas), números y caracteres especiales. <br>

                    La importancia de un generador de contraseñas radica en su capacidad para generar contraseñas que
                    sean altamente seguras y difíciles de adivinar para los hackers. Al generar contraseñas aleatorias y
                    complejas, se reduce significativamente el riesgo de que sean vulneradas mediante ataques de fuerza
                    bruta o mediante el uso de diccionarios de contraseñas comunes. Esto contribuye a proteger la
                    información personal y sensible de los usuarios, así como la integridad y la seguridad de los
                    sistemas y datos en línea.
                </p>

                <!-- Sección sobre las características de un buen generador de contraseñas -->
                <h1 class="title-about">Lo que debe hacer un generador de contraseñas</h1>
                <p class="text-about">
                    Un generador de contraseñas efectivo debe cumplir con ciertos requisitos y características para
                    garantizar la seguridad y la robustez de las contraseñas generadas. En primer lugar, debe ser capaz
                    de generar contraseñas que cumplan con los estándares de seguridad establecidos, incluyendo una
                    longitud adecuada y la inclusión de una variedad de caracteres (letras, números y símbolos). <br>

                    Además, el generador de contraseñas debe ofrecer opciones de personalización que permitan al usuario
                    ajustar la longitud y la complejidad de las contraseñas generadas según sus necesidades y
                    preferencias específicas. Esto puede incluir la posibilidad de especificar la longitud mínima y
                    máxima de la contraseña, así como la inclusión opcional de ciertos tipos de caracteres (por ejemplo,
                    símbolos especiales). <br>

                    Otra característica importante es la capacidad del generador de contraseñas para generar contraseñas
                    únicas y no repetidas. Esto garantiza que cada contraseña generada sea única y que no haya riesgo de
                    que se repita una contraseña previamente utilizada o generada por el mismo sistema.
                </p>
            </section>
        </div>

        <div class="snap-center">
            <section class="third-page">
                <h1 class="title-targets">
                    Muchos usuarios confían en nosotros y los expertos nos avalan
                </h1>
                <div class="targets">
                    <div class="target-left">
                        <img class="stars-left" src="img/desktop/image 7.png" alt="Estrellas izquierdas">
                        <p class="text-left">"Me gusta que LastPass sea intuitivo y fácil de usar. Se integra
                            adecuadamente en todos
                            los sitios web y me permite mantener un cifrado seguro de todas mis cuentas personales y
                            empresariales. Me
                            permite organizar carpetas y compartir información con otras personas; además, el hecho de
                            tener que
                            memorizar una sola contraseña maestra para todas las cuentas con un cifrado seguro me
                            proporciona
                            tranquilidad".</p>
                        <figure>
                            <img src="img/desktop/figure-1.png" alt="Imagen de Kenny Kolijn">
                            <figcaption>
                                <p class="personal-info">Kenny Kolijn
                                    Asesor profesional independiente</p>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="target-mid">
                        <img class="stars-mid" src="img/desktop/image 7.png" alt="Estrellas del medio">
                        <p class="text-mid">"Me gusta que LastPass sea intuitivo y fácil de usar. Se integra
                            adecuadamente en todos
                            los sitios web y me permite mantener un cifrado seguro de todas mis cuentas personales y
                            empresariales. Me
                            permite organizar carpetas y compartir información con otras personas; además, el hecho de
                            tener que
                            memorizar una sola contraseña maestra para todas las cuentas con un cifrado seguro me
                            proporciona
                            tranquilidad".</p>
                        <figure>
                            <img src="img/desktop/image 5.png" alt="Imagen de Kenny Kolijn">
                            <figcaption>
                                <p>Kenny Kolijn
                                    Asesor profesional independiente</p>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="target-right">
                        <img class="stars-right" src="img/desktop/image 7.png" alt="Estrellas derechas">
                        <p class="text-right">"Me gusta que LastPass sea intuitivo y fácil de usar. Se integra
                            adecuadamente en
                            todos
                            los sitios web y me permite mantener un cifrado seguro de todas mis cuentas personales y
                            empresariales. Me
                            permite organizar carpetas y compartir información con otras personas; además, el hecho de
                            tener que
                            memorizar una sola contraseña maestra para todas las cuentas con un cifrado seguro me
                            proporciona
                            tranquilidad".</p>
                        <figure>
                            <img src="img/desktop/image 6.png" alt="Imagen de Kenny Kolijn">
                            <figcaption>
                                <p>Kenny Kolijn
                                    Asesor profesional independiente</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </section>
        </div>

        <div class="snap-center">
            <section class="fourth-page">
                <h1 class="title-faq">Preguntas Frecuentes</h1>

                <details>
                    <summary>¿Cómo uso el generador de contraseñas?</summary>
                    <p>Para usar el generador de contraseñas, sigue estos pasos:</p>
                    <ul>
                        <li>Ingresa la longitud deseada de la contraseña.</li>
                        <li>Selecciona los tipos de caracteres que deseas incluir.</li>
                    </ul>
                </details>

                <details>
                    <summary>¿Es seguro utilizar contraseñas generadas aquí?</summary>
                    <p>Sí, el generador utiliza algoritmos robustos y se ejecuta localmente en tu navegador sin enviar
                        información
                        a
                        través de la red. Esto garantiza la privacidad y seguridad de tus contraseñas.</p>
                </details>

                <details>
                    <summary>¿Puedo personalizar los tipos de caracteres en la contraseña?</summary>
                    <p>Sí, puedes personalizar la contraseña seleccionando los tipos de caracteres deseados, como letras
                        mayúsculas,
                        minúsculas, números y caracteres especiales.</p>
                </details>

                <details>
                    <summary>¿Qué medidas de seguridad implementa el generador?</summary>
                    <p>El generador utiliza algoritmos seguros para garantizar la creación de contraseñas fuertes y
                        difíciles de
                        predecir. Además, se ejecuta localmente en tu dispositivo, proporcionando una capa adicional de
                        privacidad y
                        seguridad.</p>
                </details>
            </section>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-icons">
                <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-linkedin"></i></a>
                <a href="https://github.com/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-github"></i></a>
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-facebook"></i></a>
            </div>
            <div class="footer-text">
                <p>Esta web ha sido creada por Reyness</p>
            </div>
        </div>
    </footer>
</body>

</html>