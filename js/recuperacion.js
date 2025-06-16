    $(document).ready(function() {
        // Verificar si se ha enviado el código
        const urlParams = new URLSearchParams(window.location.search);
        console.log(urlParams.has('codigo_enviado')); // Depuración
        if (urlParams.has('codigo_enviado')) {
            // Mostrar el modal para ingresar el código
            $('#codigoModal').modal('show');
        }

        // Verificación en tiempo real del código
        $('#codigo').on('input', function() {
            var codigo = $(this).val();
            if (codigo.length > 0) {
                $.ajax({
                    url: 'verificar_codigo.php', // Archivo para verificar el código
                    type: 'POST',
                    data: {codigo: codigo},
                    success: function(response) {
                        if (response === 'valid') {
                            // Si el código es válido, mostrar el modal para cambiar la contraseña
                            $('#codigoRecuperacion').val(codigo);
                            $('#codigoModal').modal('hide');
                            $('#cambiarContrasenaModal').modal('show');
                        } else {
                            // Mostrar mensaje de error
                            $('#codigoFeedback').show();
                        }
                    }
                });
            } else {
                $('#codigoFeedback').hide(); // Ocultar mensaje si el campo está vacío
            }
        });

        // Manejar el cambio de contraseña
        $('#cambiarContrasenaForm').on('submit', function(e) {
            e.preventDefault();
            var codigoRecuperacion = $('#codigoRecuperacion').val();
            var nuevaContrasena = $('#nueva_contrasena').val();
            $.ajax({
                url: 'procesar_cambio.php', // Archivo para procesar el cambio de contraseña
                type: 'POST',
                data: {codigo: codigoRecuperacion, nueva_contrasena: nuevaContrasena},
                success: function(response) {
                    alert(response);
                    $('#cambiarContrasenaModal').modal('hide');
                }
            });
        });
    });