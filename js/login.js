// Ocular Registro
$("#containerRegistro").hide();

// Ocultar Login y Mostrar Registro
$("#btnRegistrarse").on("click", function () {

   $("#containerLogin").hide();
   $("#containerRegistro").show();
});

// Ocultar Registro y Mostrar Login
$("#btnLog").on("click", function () {

   $("#containerRegistro").hide();
   $("#containerLogin").show();
});

// Insertar al hacer click
$("#btnReg").on("click", function () {

   $("#frmRegistro").validate({

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
         remail: {
            required: true,
            email: true
         },
         contrasena: {
            required: true,
            equalTo: "#confPass",
            minlength: 8
         },
         confPass: {
            required: true
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
            required: "Este campo es obligatorio"
         },
         categoria: {
            required: "Este campo es obligatorio"
         }
      },
      errorElement: "span",
      errorClass: "text-danger col-12",
      submitHandler: function () {

         var form = $("#frmRegistro").serialize();

         $.ajax({
            type: "POST",
            url: "php/visitanteController.php",
            data: form,
            success: function (r) {

               var cb = JSON.parse(r);

               if (cb.status == '201') {

                  const msg = "<div class='alert alert-success'><b>Success</b><b> registro con exito</b></div>";
                  $("#mensajer").html(msg);
               } else {

                  const msg = "<div class='alert alert-danger'><b>Error al registrar</b><b> correo ya usado</b></div>";
                  $("#mensajer").html(msg);
               }
            }
         });
      }
   });
});

$("#btnAcceder").on("click", function () {

   $("#frmLogin").validate({

      rules: {
         email: {
            required: true,
            email: true
         },
         contrasena: {
            required: true
         }
      },
      messages: {
         email: {
            required: "Este campo es obligatorio",
            email: "Por favor ingresa un email valido"
         },
         contrasena: {
            required: "Este campo es obligatorio"
         }
      },
      errorElement: "span",
      errorClass: "text-danger col-12",
      submitHandler: function () {

         var form = $("#frmLogin").serialize();

         $.ajax({
            type: "GET",
            url: "php/loginController.php",
            data: form,
            success: function (r) {
               
               var cb = JSON.parse(r);

               if (cb.status == "200" && cb.value == "Administrador") {
                  
                  document.location.href = "admin"
               } else if (cb.status == "200" && cb.value == "General"){

                  document.location.href = "general"
               }else{

                  const msg = "<div class='alert alert-danger'><b>Error al iniciar sesión</b><b> correo o contraseña incorrectos</b></div>";
                  $("#mensajel").html(msg);
               }
            }
         });
      }
   });
});