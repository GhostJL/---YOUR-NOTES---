function toggleExpand() {
    const additionalFields = document.querySelector('.additional-fields');
    const arrowIcon = document.querySelector('.arrow');

    if (additionalFields.classList.contains('hidden')) {
        additionalFields.classList.remove('hidden');
        arrowIcon.style.transform = 'rotate(90deg)';
    } else {
        additionalFields.classList.add('hidden');
        arrowIcon.style.transform = 'rotate(0deg)';
    }
}


function toggleDeleteIcon(inputElement) {
    var deleteIcon = inputElement.nextElementSibling;
    if (inputElement.value.trim() !== '') {
        deleteIcon.style.display = 'inline-block';
    } else {
        deleteIcon.style.display = 'none';
    }
}

function clearInput(inputElement) {
    inputElement.value = '';
    inputElement.nextElementSibling.style.display = 'none';
    inputElement.focus();
    buscarRegistros();
}

$(document).ready(function () {
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd',

        beforeShowDay: function (date) {
            // Obtener el día del mes
            var day = date.getDate();
            // Deshabilitar todos los días que no son el primer día del mes
            return [day === 1, ''];
        },
        onSelect: function (selectedDate) {
            // Actualizar la tabla al seleccionar una fecha
            window.location.href = "?selectedDate=" + selectedDate;
            if (selectedDate !== "") {
                $(this).next().show();
            } else {
                $(this).next().hide();
            }
        },
    });


    $("#datepickerInicio, #datepickerFin").datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function () {
            buscarRegistros();
            if ($(this).val() !== "") {
                $(this).next().show();
            } else {
                $(this).next().hide();
            }
        },
        onClose: function (selectedDate) {
            if ($(this).is("#datepickerInicio")) {
                $("#datepickerFin").datepicker("option", "minDate", selectedDate);
            } else if ($(this).is("#datepickerFin")) {
                $("#datepickerInicio").datepicker("option", "maxDate", selectedDate);
            }
        }
    });

    $("#timepickerInicio").change(function () {
        buscarRegistros();
    });

    $("#timepickerFin").change(function () {
        buscarRegistros();
    });
});

function buscarRegistros() {
    var inputUser, inputDateInicio, inputDateFin, inputTimeInicio, inputTimeFin, inputIP, inputAction, table, tr, tdUser, tdDate, tdTime, tdIP, tdAction, i;
    inputUser = document.getElementById("searchUsuario").value.trim().toUpperCase();
    inputDateInicio = $("#datepickerInicio").val();
    inputDateFin = $("#datepickerFin").val();
    inputTimeInicio = $("#timepickerInicio").val();
    inputTimeFin = $("#timepickerFin").val();
    inputIP = document.getElementById("searchIP").value.toUpperCase();
    inputAction = document.getElementById("searchAccion").value.trim().toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        tr[i].style.display = "";
        tdUser = tr[i].getElementsByTagName("td")[0];
        tdDate = tr[i].getElementsByTagName("td")[1];
        tdTime = tr[i].getElementsByTagName("td")[2];
        tdIP = tr[i].getElementsByTagName("td")[3];
        tdAction = tr[i].getElementsByTagName("td")[4];

        if (tdUser && tdDate && tdTime && tdIP && tdAction) {
            var userValue = tdUser.textContent.toUpperCase();
            var dateValue = tdDate.textContent;
            var timeValue = tdTime.textContent;
            var ipValue = tdIP.textContent;
            var actionValue = tdAction.textContent.toUpperCase();

            if (userValue.indexOf(inputUser) === -1 ||
                (inputDateInicio !== "" && dateValue < inputDateInicio) ||
                (inputDateFin !== "" && dateValue > inputDateFin) ||
                (inputTimeInicio !== "" && timeValue < inputTimeInicio) ||
                (inputTimeFin !== "" && timeValue > inputTimeFin) ||
                ipValue.indexOf(inputIP) === -1 ||
                actionValue.indexOf(inputAction) === -1) {
                tr[i].style.display = "none";
            }
        }
    }
}