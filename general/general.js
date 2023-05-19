$(document).ready(function() {

    // Dibujar dataTable
    $.ajax({
        type: "GET",
        url: "../php/visitanteController.php",
        success: function (r) {

            var datos = $(r);

            let tabla = $("table").DataTable();

            tabla.clear().draw();
            tabla.rows.add(datos).draw();
        }
    });
});