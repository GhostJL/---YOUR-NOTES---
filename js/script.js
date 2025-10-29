function solonumeros(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    numeros = "0123456789";
    especiales = "8-37-38-46"; //array
    taclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            taclado_especial = true;
        }
    }

    if (numeros.indexOf(teclado) == -1 && !taclado_especial) {
        return false;
    }
}

function sololetras(ev) {

    key = ev.keyCode || ev.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz ";
    especiales = "37-38-46-164"; //array
    taclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            taclado_especial = true;
            break;
        }
    }

    if (letras.indexOf(teclado) == -1 && !taclado_especial) {
        return false;
    }

}

function ValidateEmail(email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value)) {
        return (true)
    }
    alert("Es una email invalido!")
    return (false)
}
function ConfirmDelete(contenido) {
    // Mostrar el contenido en la consola antes de la eliminación

    var ok = confirm('¿Desea eliminar el registro?');
    if (ok) {
        alert("Contenido a eliminar:\n" + contenido);

        return true;
    } else {
        alert('Eliminacion cancelada');
        return false;
    }
}

window.onload = function() {
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth() + 1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if (dia < 10)
        dia = '0' + dia; //agrega cero si el menor de 10
    if (mes < 10)
        mes = '0' + mes //agrega cero si el menor de 10
    document.getElementById('fechaActual').value = ano + "-" + mes + "-" + dia;
}