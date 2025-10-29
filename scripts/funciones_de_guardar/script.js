
function registrarEvento(tipo) {
    const evento = {
        tipo: tipo,
        hora: new Date().toISOString()
    };

    fetch('./scripts/guardarEvento.php', {
        method: 'POST',
        body: JSON.stringify(evento),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            console.log('Evento registrado con éxito en el servidor.');
            console.log('Tipo:', evento.tipo);
            console.log('Hora:', evento.hora);
        } else {
            console.error('Error al registrar el evento en el servidor.');
        }
    })
    .catch(error => {
        console.error('Error de red:', error);
    });
}

document.getElementById('a-inicio').addEventListener('click', function() {
    registrarEvento('Clic en botón de inicio');
});

document.getElementById('a-login').addEventListener('click', function() {
    registrarEvento('Clic en botón de login');
});

document.getElementById('a-crear-cuenta').addEventListener('click', function() {
    registrarEvento('Clic en botón de crear cuenta');
});

document.getElementById('inombre').addEventListener('click', function() {
    registrarEvento('Clic en el input nombre');
});

document.getElementById('iapellido').addEventListener('click', function() {
    registrarEvento('Clic en el input apellido');
});

document.getElementById('iemail').addEventListener('click', function() {
    registrarEvento('Clic en el input email');
});

document.getElementById('iusuario').addEventListener('click', function() {
    registrarEvento('Clic en el input usuario');
});

document.getElementById('ipass').addEventListener('click', function() {
    registrarEvento('Clic en el input contraseña');
});

document.getElementById('bregistrar').addEventListener('click', function() {
    registrarEvento('Clic en el input Registro de cuenta');
});

document.getElementById('m-notas').addEventListener('click', function() {
    registrarEvento('Clic en menu nota');
});

document.getElementById('eliminar_nota').addEventListener('click', function() {
    registrarEvento('Clic en eliminar nota');
});

