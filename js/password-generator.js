// Función principal para generar una contraseña
function generatePassword() {
  const length = parseInt(document.querySelector(".numbers").value);
  const options = {
    uppercase: document.getElementById("uppercase").checked,
    lowercase: document.getElementById("lowercase").checked,
    numbers: document.getElementById("numbers").checked,
    symbols: document.getElementById("symbols").checked,
  };

  const charset = generateCharset(options);
  let password = "";

  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * charset.length);
    password += charset[randomIndex];
  }

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

window.onload = function () {
  generatePassword();
};

// Función para copiar la contraseña al portapapeles
function copyToClipboard() {
  const passwordInput = document.querySelector(".pass-generate");
  passwordInput.select();
  passwordInput.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
