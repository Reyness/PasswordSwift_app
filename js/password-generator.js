// Función principal para generar una contraseña
function generatePassword() {
  // Obtener la longitud de la contraseña ingresada por el usuario
  const length = parseInt(document.querySelector(".numbers").value);
  // Obtener las opciones seleccionadas por el usuario (mayúsculas, minúsculas, números, símbolos)
  const options = {
    uppercase: document.getElementById("uppercase").checked,
    lowercase: document.getElementById("lowercase").checked,
    numbers: document.getElementById("numbers").checked,
    symbols: document.getElementById("symbols").checked,
  };

  // Generar el conjunto de caracteres basado en las opciones del usuario
  const charset = generateCharset(options);
  let password = "";

  // Generar la contraseña aleatoria utilizando el conjunto de caracteres generado
  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * charset.length);
    password += charset[randomIndex];
  }

  // Mostrar la contraseña generada en el campo de entrada
  document.querySelector(".pass-generate").value = password;
}

// Función para generar el conjunto de caracteres basado en las opciones del usuario
function generateCharset(options) {
  let charset = "";
  if (options.uppercase) charset += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  if (options.lowercase) charset += "abcdefghijklmnopqrstuvwxyz";
  if (options.numbers) charset += "0123456789";
  if (options.symbols) charset += "!@#$%^&*";
  return charset;
}

// Función para copiar la contraseña al portapapeles
function copyToClipboard() {
  const passwordInput = document.querySelector(".pass-generate");
  // Seleccionar el texto en el campo de entrada
  passwordInput.select();
  // Establecer el rango de selección en todo el texto
  passwordInput.setSelectionRange(0, 99999);
  // Copiar el texto seleccionado al portapapeles
  document.execCommand("copy");
}

// Función que se ejecuta cuando la ventana se ha cargado completamente
window.onload = function () {
  // Generar una contraseña al cargar la página
  generatePassword();
};
