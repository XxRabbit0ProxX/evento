let tabla = $("table").DataTable();

$(document).ready(function () {

    // Dibujar dataTable
    $.ajax({
        type: "GET",
        url: "../php/visitanteController.php",
        success: function (r) {

            var datos = $(r);

            tabla.clear().draw();
            tabla.rows.add(datos).draw();
        }
    });
});

function borrar(id) {

    $("#confirmar").on("click", function () {
        
        $.ajax({
            type: "GET",
            url: "../php/visitanteController.php",
            data: "id=" + id + "&delete=delete",
            success: function (r) {

                var cb = JSON.parse(r);

                $.ajax({
                    type: "GET",
                    url: "../php/visitanteController.php",
                    success: function (r) {
            
                        var datos = $(r);
            
                        tabla.clear().draw();
                        tabla.rows.add(datos).draw();
                    }
                });
            }
        });
    });
}

function editar(id) {

    $.ajax({
        type: "GET",
        url: "../php/visitanteController.php",
        data: "id=" + id,
        success: function (r) {
            
            var cb = JSON.parse(r);

            $("#id").attr("value", cb.id)
            $("#nombre").attr("value", cb.nombre);
            $("#apellidos").attr("value", cb.apellidos);
            $("#email").attr("value", cb.email);
            $("#telefono").attr("value", cb.telefono);
            $("#fecha").attr("value", cb.fecha);
            $("#categoria").attr("value", cb.categoria);
            $("#categoria").val(cb.categoria);
            $("#contrasena").attr("value", cb.contrasena);
        }
    });

    $("#btnUpdate").on("click", function () {

        $("#frmUpdate").validate({

            rules: {
                nombre: {
                    required: true
                },
                apellidos: {
                    required: true
                },
                telefono: {
                    required: true,
                    maxlength: 10,
                    minlength: 10
                },
                fecha: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                contrasena: {
                    required: true,
                    minlength: 8
                },
                categoria: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "Este campo es obligatorio",
                },
                apellidos: {
                    required: "Este campo es obligatorio"
                },
                telefono: {
                    required: "Este campo es obligatorio",
                    maxlength: "Se requieren 10 digitos",
                    minlength: "Se requieren 10 digitos"
                },
                fecha: {
                    required: "Este campo es obligatorio"
                },
                remail: {
                    required: "Este campo es obligatorio",
                    email: "Se requiere un email valido"
                },
                contrasena: {
                    required: "Este campo es obligatorio",
                    equalTo: "Las contraseñas no coinciden",
                    minlength: "Minimo 8 caracteres"
                },
                confPass: {
                    required: "Este campo es obligatorio",
                    equalTo: "Las contraseñas no coinciden",
                },
                categoria: {
                    required: "Este campo es obligatorio"
                }
            },
            errorElement: "span",
            errorClass: "text-danger col-12",
            submitHandler: function () {

                var form = $("#frmUpdate").serialize();

                $.ajax({
                    type: "POST",
                    url: "../php/visitanteController.php",
                    data: form,
                    success: function (r) {

                        var cb = JSON.parse(r);

                        if (cb.status == '200') {

                            const msg = "<div class='alert alert-success'><b>Success</b><b> visitante actualizado</b></div>";
                            $("#mensajer").html(msg);

                            $.ajax({
                                type: "GET",
                                url: "../php/visitanteController.php",
                                success: function (r) {
                        
                                    var datos = $(r);
                        
                                    tabla.clear().draw();
                                    tabla.rows.add(datos).draw();
                                }
                            });
                        } else {

                            const msg = "<div class='alert alert-danger'><b>Error al actualizar</b><b> correo ya usado</b></div>";
                            $("#mensajer").html(msg);
                        }
                    }
                });
            }
        });
    });
}