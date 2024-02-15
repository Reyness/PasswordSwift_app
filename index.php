<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Configuración del documento -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Configuración básica de SEO -->
  <title>Generador de Contraseñas Aleatorias</title>
  <meta name="description" content="Cree contraseñas seguras para proteger sus cuentas de Internet">
  <meta name="keywords" content="">

  <!-- Etiquetas Open Graph y Twitter Card para SEO en Redes Sociales -->
  <meta property="og:title" content="Generador de Contraseñas Aleatorias">
  <meta property="og:description" content="Cree contraseñas seguras para proteger sus cuentas de Internet">
  <meta property="og:image" content="URL de la imagen para redes sociales">
  <meta property="og:url" content="URL de tu página">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Generador de Contraseñas Aleatorias">
  <meta name="twitter:description" content="Cree contraseñas seguras para proteger sus cuentas de Internet">
  <meta name="twitter:image" content="URL de la imagen para Twitter">

  <!-- Configuración de la aplicación web y accesos directos -->
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">

  <!-- Enlace a la hoja de estilos -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Enlace a las fuentes -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Cambio del tema del navegador -->
  <meta name="theme-color" content="#fafafa">

  <!-- Código de las plataformas de análisis -->

  <!-- Scripts a cargar antes de la renderización -->
  <script src="preloader.js"></script>
  <script src="js/animaciones.js"></script>
  <script src="js/password-generator.js"></script>
</head>

<body>

<header>
    <?php session_start(); ?>
    <nav>
      <?php
        // Verificar si el usuario ha iniciado sesión
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
          echo "<a href='dashboard.php' class='welcome-link'><span class='welcome-message'>Bienvenido, " . $_SESSION['firstName'] . "!</span></a>";
          echo "<a href='logout.php' class='logout-btn'>Cerrar Sesión</a>";
        } else {
          echo "<a href='register.php' class='sign-up'>Sign Up</a>";
          echo "<a href='login.php' class='log-in'>Log In</a>";
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
          <h4 class="small-title">Cree contraseñas seguras para proteger sus cuentas de <span>Internet</span></h4>

          <!-- Entradas para generar contraseñas -->
          <div class="password-generator">
            <input class="numbers" type="number" value="8" oninput="generatePassword()">
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
            <input type="checkbox" id="numbers" checked onclick="generatePassword()"> <label for="numbers">0-9</label>
            <input type="checkbox" id="symbols" checked onclick="generatePassword()"> <label
              for="symbols">!@#$%^&*</label>
          </div>

          <p class="content-web">
            Esta herramienta utiliza Javascript para generar contraseñas de forma segura directamente
            en tu navegador sin necesidad de enviar información sensible a través de la red. Al ejecutarse localmente en
            tu dispositivo, garantiza una capa adicional de privacidad y seguridad. La generación de contraseñas se
            realiza
            mediante algoritmos robustos, lo que garantiza la creación de claves fuertes y difíciles de predecir.
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
        <p class="text-about">Lorem ipsum dolor sit amet consectetur. Arcu et amet ipsum nullam pulvinar quis erat
          ac. Sit risus nulla ut nibh enim lacus. Curabitur consequat enim et amet. Sed vitae montes aliquam mi in
          tempor
          sem sed ultrices. Molestie consequat amet est vel laoreet vestibulum quisque proin scelerisque. Nibh placerat
          aenean libero in.
          Neque pellentesque amet sit risus tellus amet.

          Urna quis elementum vitae a interdum tellus. Purus ultricies lacus quisque euismod quis. Blandit aliquam
          aliquam
          ac suspendisse enim. Amet fringilla non tempus vitae amet. Velit id id eget volutpat sed. Varius accumsan enim
          egestas duis faucibus consequat. Cursus pretium dolor est dolor sit posuere elit etiam venenatis. Arcu arcu
          viverra fames bibendum imperdiet mi velit.
          Ultrices in aliquam habitant et. Euismod ornare non laoreet tincidunt
        </p>

        <!-- Sección sobre las características de un buen generador de contraseñas -->
        <h1 class="title-about">Lo que debe hacer un generador de contraseñas</h1>
        <p class="text-about">Lorem ipsum dolor sit amet consectetur. Arcu et amet ipsum nullam pulvinar quis erat
          ac. Sit risus nulla ut nibh enim lacus. Curabitur consequat enim et amet. Sed vitae montes aliquam mi in
          tempor
          sem sed ultrices. Molestie consequat amet est vel laoreet vestibulum quisque proin scelerisque. Nibh placerat
          aenean libero in.
          Neque pellentesque amet sit risus tellus amet.

          Urna quis elementum vitae a interdum tellus. Purus ultricies lacus quisque euismod quis. Blandit aliquam
          aliquam
          ac suspendisse enim. Amet fringilla non tempus vitae amet. Velit id id eget volutpat sed. Varius accumsan enim
          egestas duis faucibus consequat. Cursus pretium dolor est dolor sit posuere elit etiam venenatis. Arcu arcu
          viverra fames bibendum imperdiet mi velit.
          Ultrices in aliquam habitant et. Euismod ornare non laoreet tincidunt
          Lorem ipsum dolor sit amet consectetur. Arcu et amet ipsum nullam pulvinar quis erat ac. Sit risus nulla ut
          nibh
          enim lacus. Curabitur consequat enim et amet. Sed vitae montes aliquam mi in tempor sem sed ultrices. Molestie
          consequat amet est vel laoreet vestibulum quisque proin scelerisque. Nibh placerat aenean libero in.
          Neque pellentesque amet sit risus tellus amet.

          Urna quis elementum vitae a interdum tellus. Purus ultricies lacus quisque euismod quis. Blandit aliquam
          aliquam
          ac suspendisse enim. Amet fringilla non tempus vitae amet. Velit id id eget volutpat sed. Varius accumsan enim
          egestas duis faucibus consequat. Cursus pretium dolor est dolor sit posuere elit etiam venenatis. Arcu arcu
          viverra fames bibendum imperdiet mi velit.
          Ultrices in aliquam habitant et. Euismod ornare non laoreet tincidunt

          Lorem ipsum dolor sit amet consectetur. Arcu et amet ipsum nullam pulvinar quis erat ac. Sit risus nulla ut
          nibh
          enim lacus. Curabitur consequat enim et amet. Sed vitae montes aliquam mi in tempor sem sed ultrices. Molestie
          consequat amet est vel laoreet vestibulum quisque proin scelerisque. Nibh placerat aenean libero in.
          Neque pellentesque amet sit risus tellus amet.

          Urna quis elementum vitae a interdum tellus. Purus ultricies lacus quisque euismod quis. Blandit aliquam
          aliquam
          ac suspendisse enim. Amet fringilla non tempus vitae amet. Velit id id eget volutpat sed. Varius accumsan enim
          egestas duis faucibus consequat. Cursus pretium dolor est dolor sit posuere elit etiam venenatis. Arcu arcu
          viverra fames bibendum imperdiet mi velit.
          Ultrices in aliquam habitant et. Euismod ornare non laoreet tincidunt
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
            <p class="text-left">"Me gusta que LastPass sea intuitivo y fácil de usar. Se integra adecuadamente en todos
              los sitios web y me permite mantener un cifrado seguro de todas mis cuentas personales y empresariales. Me
              permite organizar carpetas y compartir información con otras personas; además, el hecho de tener que
              memorizar una sola contraseña maestra para todas las cuentas con un cifrado seguro me proporciona
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
            <p class="text-mid">"Me gusta que LastPass sea intuitivo y fácil de usar. Se integra adecuadamente en todos
              los sitios web y me permite mantener un cifrado seguro de todas mis cuentas personales y empresariales. Me
              permite organizar carpetas y compartir información con otras personas; además, el hecho de tener que
              memorizar una sola contraseña maestra para todas las cuentas con un cifrado seguro me proporciona
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
            <p class="text-right">"Me gusta que LastPass sea intuitivo y fácil de usar. Se integra adecuadamente en
              todos
              los sitios web y me permite mantener un cifrado seguro de todas mis cuentas personales y empresariales. Me
              permite organizar carpetas y compartir información con otras personas; además, el hecho de tener que
              memorizar una sola contraseña maestra para todas las cuentas con un cifrado seguro me proporciona
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
            <li>Haz clic en el botón "Generar Contraseña".</li>
            <li>La nueva contraseña se mostrará en el campo correspondiente.</li>
          </ul>
        </details>

        <details>
          <summary>¿Es seguro utilizar contraseñas generadas aquí?</summary>
          <p>Sí, el generador utiliza algoritmos robustos y se ejecuta localmente en tu navegador sin enviar información
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
          <p>El generador utiliza algoritmos seguros para garantizar la creación de contraseñas fuertes y difíciles de
            predecir. Además, se ejecuta localmente en tu dispositivo, proporcionando una capa adicional de privacidad y
            seguridad.</p>
        </details>

      </section>
    </div>

  </main>

  <!-- <footer>
    <div class="footer-container">
      <div class="footer-section">
        <h3>Contacto</h3>
        <p>Email: info@example.com</p>
        <p>Teléfono: +123 456 789</p>
      </div>
      <div class="footer-section">
        <h3>Enlaces útiles</h3>
        <ul>
          <li><a href="#">Política de privacidad</a></li>
          <li><a href="#">Términos y condiciones</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Síguenos</h3>
        <div class="social-icons">
          <a href="#" target="_blank"><img src="svg/facebook-icon.svg" alt="Facebook"></a>
          <a href="#" target="_blank"><img src="svg/twitter-icon.svg" alt="Twitter"></a>
          <a href="#" target="_blank"><img src="svg/instagram-icon.svg" alt="Instagram"></a>
        </div>
      </div>
    </div>
  </footer> -->

</body>
</html>