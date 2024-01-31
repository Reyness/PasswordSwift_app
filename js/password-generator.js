// Función principal para generar una contraseña
function generatePassword() {
  // Obtener la longitud deseada de la contraseña
  const length = parseInt(document.querySelector(".numbers").value);

  // Obtener las opciones de configuración del usuario
  const useUppercase = document.getElementById("uppercase").checked;
  const useLowercase = document.getElementById("lowercase").checked;
  const useNumbers = document.getElementById("numbers").checked;
  const useSymbols = document.getElementById("symbols").checked;

  // Generar el conjunto de caracteres basado en las opciones del usuario
  const charset = generateCharset(
    useUppercase,
    useLowercase,
    useNumbers,
    useSymbols
  );

  // Inicializar la contraseña y el contador de categorías utilizadas
  let password = "";
  let categoriesCount = 0;

  // Asegurar al menos un carácter de cada categoría seleccionada
  if (useUppercase) {
    password += getRandomChar("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    categoriesCount++;
  }
  if (useLowercase) {
    password += getRandomChar("abcdefghijklmnopqrstuvwxyz");
    categoriesCount++;
  }
  if (useNumbers) {
    password += getRandomChar("0123456789");
    categoriesCount++;
  }
  if (useSymbols) {
    password += getRandomChar("!@#$%^&*");
    categoriesCount++;
  }

  // Completar el resto de la contraseña con caracteres aleatorios del conjunto
  for (let i = categoriesCount; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * charset.length);
    password += charset[randomIndex];
  }

  // Mostrar la contraseña generada en el campo de entrada
  document.querySelector(".pass-generate").value = password;
}

// Función para obtener un carácter aleatorio de un conjunto dado
function getRandomChar(charset) {
  const randomIndex = Math.floor(Math.random() * charset.length);
  return charset[randomIndex];
}

// Función para generar el conjunto de caracteres basado en las opciones del usuario
function generateCharset(useUppercase, useLowercase, useNumbers, useSymbols) {
  let charset = "";
  if (useUppercase) charset += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  if (useLowercase) charset += "abcdefghijklmnopqrstuvwxyz";
  if (useNumbers) charset += "0123456789";
  if (useSymbols) charset += "!@#$%^&*";
  return charset;
}

window.onload = function () {
  // Generar la contraseña al cargar la página
  generatePassword();
};
