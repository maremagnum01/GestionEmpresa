//Validaciones registro, login y modales
$('#ModalRegister').on('click', function(){
    $('#exampleModalRegistrarse').modal('show');
});

$(function(){
    $('#formRegister').validate({
        rules: {
            user: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        }
    });
});

$('#ModalLogin').on('click', function(){
    $('#exampleModalLogin').modal('show');
});

$(function(){
    $('#formLogin').validate({
        rules: {
            email_login: {
                required: true,
                minlength: 5,
                email: true
            },
            password_login: {
                required: true,
                minlength: 5
            }
        }
    });
});

$(function(){
    $('#switchR').on('click',function(){
            $('#exampleModalRegistrarse').modal('hide');
            $('#exampleModalLogin').modal('show');
    });
});

$(function(){
    $('#switchL').on('click',function(){
            $('#exampleModalLogin').modal('hide');
            $('#exampleModalRegistrarse').modal('show');
    });
});

//Buscador ajax

$(obtener_resultados());

function obtener_resultados(empleados){
    $.ajax({
        url:'Empleados/empleados.php',
        type: 'POST',
        dataType: 'html',
        data: {empleados : empleados}
    }) 
    .done(function(resultado){
        $('#tabla_resultados').html(resultado);
    });
}

$(document).on('keyup', '#buscador', function(){
    var valorBusqueda = $(this).val();
    if(valorBusqueda != ""){
        obtener_resultados(valorBusqueda);
    }else{
        obtener_resultados();
    }
});
