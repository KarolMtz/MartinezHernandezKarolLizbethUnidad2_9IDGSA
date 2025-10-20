  $('#contacto').on('click', function () {
    var name = $('#name').val().trim();
    var email = $('#email').val().trim();
    var asunto = $('#asunto').val().trim();
    var mensaje = $('#mensaje').val().trim();

    // Validación de campos vacíos
    if (!name || !email || !asunto || !mensaje) {
      alert("Por favor completa todos los campos.");
      return;
    }

    // Validación básica del correo electrónico
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert("Por favor ingresa un correo electrónico válido.");
      return;
    }

    // Enviar formulario por AJAX
    $.ajax({
      type: "post",
      url: "enviar_mensaje.php",
      data: {
        name: name,
        email: email,
        asunto: asunto,
        mensaje: mensaje
      },
      dataType: "json",
      success: function (response) {
        if (response.status == 'success') {
          alert("Mensaje enviado correctamente.");
          // Opcional: limpiar el formulario
          $('#name').val('');
          $('#email').val('');
          $('#asunto').val('');
          $('#mensaje').val('');
        } else {
          console.log(response.error);
        }

      },
      error: function (xhr, status, error) {
        alert("Error al enviar el mensaje. Inténtalo de nuevo más tarde.");
        console.error("Error:", status, error);
      }
    });
  });