function generarPassword(){
    $.ajax({
        url: '/inventario_dgtic/controllers/password/generate-password.php',
        type: 'post',

        success: function (response){
            $("#resultadoPassword").val(response);
        }
    });
}