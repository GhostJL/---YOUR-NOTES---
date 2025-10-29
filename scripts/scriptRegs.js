const elementos = {
    'b_agregar_nota': {
        descripcion: 'Clic en agregar nota',
        area: 'División de Estudios',
        accion: 'agregado'
    },
    'b_agregar_contacto': {
        descripcion: 'Clic en agregar contacto',
        area: 'Servicios Escolares',
        accion: 'agregado'
    },
    'b_eliminar_nota': {
        descripcion: 'Clic en eliminar nota',
        area: 'División de Estudios',
        accion: 'eliminado'
    },
    'b_eliminar_contacto': {
        descripcion: 'Clic en eliminar contacto',
        area: 'Servicios Escolares',
        accion: 'eliminado'
    },
    'b_actualizar_nota': {
        descripcion: 'Clic en actualizar nota',
        area: 'División de Estudios',
        accion: 'actualizar'
    }
    // Otros elementos
};

function registrarEvento(tipo, contenido, area, accion) {
    let mensaje;

    if (accion) {
        mensaje = `El siguiente registro ha sido ${accion}: ${contenido}`;
    } else {
        mensaje = `El siguiente registro ha sido modificado: ${contenido}`;
    }
    
    const evento = {
        tipo: tipo,
        hora: new Date().toISOString(),
        area: area,
        contenido: mensaje
    };
    
    fetch('./scripts/reglog.php', {
        method: 'POST',
        body: JSON.stringify(evento),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    
    .catch(error => {
        console.error('Error de red:', error);
    });
}


function agregarEventListenerSiExiste(id, tipoEvento, tipoRegistro, area, accion) {
    const elemento = document.getElementById(id);

    if (elemento) {
        elemento.addEventListener(tipoEvento, function () {
            let contenidoEvento;

            switch (accion) {
                case 'agregado':
                    const formulario = new FormData(formNota);
                    const titulo = formulario.get('titulo');
                    const contenido = formulario.get('contenido');

                    switch (id) {
                        case 'b_agregar_nota':
                            contenidoEvento = `${titulo}, ${contenido}`;
                            break;
                        default:
                            console.error('Acción no reconocida:', id);
                            return;
                    }
                    break;

                case 'actualizar':
                    const tituloActualizar = document.querySelector('input[name="titulo"]').value;
                    const contenidoM = document.querySelector('textarea[name="contenido"]').value;
                    const contenidoA = elemento.getAttribute("data-contenido");
                    contenidoEvento = `Anterior: ${contenidoA}, Modificado: ${tituloActualizar}, ${contenidoM}`;
                    break;

                case 'eliminado':
                    const contenido3 = elemento.getAttribute("data-contenido");
                    contenidoEvento = `Contenido Eliminado: ${contenido3}`;
                    break;

                default:
                    console.error('Acción no reconocida:', accion);
                    return;
            }

            registrarEvento(tipoRegistro, contenidoEvento, area, accion);
        });
    }
}



for (const id in elementos) {
    if (typeof elementos[id] === 'string') {
        agregarEventListenerSiExiste(id, 'click', elementos[id]);
    } else if (typeof elementos[id] === 'object') {
        agregarEventListenerSiExiste(id, 'click', elementos[id].descripcion, elementos[id].area, elementos[id].accion);
    }
}
