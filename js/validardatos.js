// Obtener referencia al formulario y a los campos de entrada
const form = document.querySelector('.formlogin');
const userNameInput = document.getElementById('UserName');
const passwordInput = document.getElementById('Password');

// Manejar el evento de envío del formulario
form.addEventListener('submit', function(event) {
  event.preventDefault(); // Evitar el envío del formulario por defecto

  // Obtener los valores de los campos de entrada
  const userName = userNameInput.value;
  const password = passwordInput.value;

  // Realizar una solicitud AJAX para validar los datos en el servidor
  const xhr = new XMLHttpRequest();
  xhr.open('POST', './validar.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      if (response.valid) {
        window.location.href = 'home.html'; // Redirigir a home.html si la validación es exitosa
      } else {
        alert('Nombre de usuario o contraseña incorrectos');
      }
    }
  };
  const data = 'userName=' + encodeURIComponent(userName) + '&password=' + encodeURIComponent(password);
  xhr.send(data);
});
