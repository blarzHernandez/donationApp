
//Mensaje exitoso
function mensajeOk(nomDiv, mensaje, animar)
{
    var animar;

    var caja = '';
    $("#" + nomDiv).html("<div class='alert alert-dismissable alert-success'><button type='button' class='close' data-dismiss='alert'>×</button>" + mensaje + "</div>");
    if (animar === 'S') {
        $("#" + nomDiv).fadeOut(5000, function () {
            $(this).remove();
        });
    }
    
}
//Mensaje error
function mensajeError(nomDiv, mensaje)
{
    var caja = '';
    $("#" + nomDiv).html("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>" + mensaje + "</div>");
    // setTimeout(function() { $("#"+nomDiv).hide('slow',function(){ $("#"+nomDiv).html('');}); }, 5000);

}





/*Retorna codigo y mensaje de error--------
 * return string
 */
function catchError(errorStatus, exception) {
    if (errorStatus != '') {
        if (errorStatus === 0) {
            return "Sin acceso a la red, verifique su conexion.[0], intente nuevamente!. \n En caso de persistir reportar al administrador de la aplicacion.";
        } else if (errorStatus == 404) {
            return "La pagina a la que desea acceder no esta disponible o no existe.[404], intente nuevamente!. \n En caso de persistir reportar al administrador de la aplicacion.";
        } else if (errorStatus == 505) {
            return "Error interno de servidor.[505], intente nuevamente!. \n En caso de persistir reportar al administrador de la aplicacion.";
        } else if (exception === 'parsererror') {
            return "Solicitud de analisis (parseo) fallo";
        } else if (exception === 'timeout') {
            return "Tiempo de espera agotado, error, intente nuevamente!. \n";
        } else if (exception === 'abort') {
            return "Solicitud ajax abortada!";
        } else {

            return "Error desconocido: " + errorStatus;
        }


    }//end if
}// end function 

