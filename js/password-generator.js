function generatePassword() {
  const length = parseInt(document.querySelector(".numbers").value);
  const useUppercase = document.getElementById("uppercase").checked;
  const useLowercase = document.getElementById("lowercase").checked;
  const useNumbers = document.getElementById("numbers").checked;
  const useSymbols = document.getElementById("symbols").checked;

  const charset = generateCharset(
    useUppercase,
    useLowercase,
    useNumbers,
    useSymbols
  );

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
    const randomChar = getRandomChar(charset);

    // Evitar solo letras o solo números
    if ((useUppercase || useLowercase) && /^\d+$/.test(randomChar)) {
      i--; // Repetir la iteración si se generó un número y solo se permiten letras
      continue;
    }
    if (useNumbers && /^[a-zA-Z]+$/.test(randomChar)) {
      i--; // Repetir la iteración si se generó una letra y solo se permiten números
      continue;
    }

    // Evitar caracteres repetidos
    if (password.includes(randomChar)) {
      i--; // Repetir la iteración si el carácter generado ya está en la contraseña
      continue;
    }

    // Evitar letras mayúsculas consecutivas
    if (useUppercase && password.slice(-1).toUpperCase() === randomChar) {
      i--; // Repetir la iteración si se generó una letra mayúscula consecutiva
      continue;
    }

    // Evitar letras minúsculas consecutivas
    if (useLowercase && password.slice(-1).toLowerCase() === randomChar) {
      i--; // Repetir la iteración si se generó una letra minúscula consecutiva
      continue;
    }

    // Evitar números consecutivos
    if (useNumbers && /\d/.test(randomChar) && /\d/.test(password.slice(-1))) {
      i--; // Repetir la iteración si se generó un número consecutivo
      continue;
    }

    // Otras condiciones a evitar (sencuencia de letras, secuencia de números) pueden agregarse según sea necesario.

    // Agregar el carácter a la contraseña
    password += randomChar;
  }

  document.querySelector(".pass-generate").value = password;
}

function getRandomChar(charset) {
  const randomIndex = Math.floor(Math.random() * charset.length);
  return charset[randomIndex];
}

function generateCharset(useUppercase, useLowercase, useNumbers, useSymbols) {
  let charset = "";
  if (useUppercase) charset += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  if (useLowercase) charset += "abcdefghijklmnopqrstuvwxyz";
  if (useNumbers) charset += "0123456789";
  if (useSymbols) charset += "!@#$%^&*";
  return charset;
}
