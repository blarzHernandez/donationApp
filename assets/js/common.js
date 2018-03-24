//Succesfull message
function mensajeOk(nomDiv,mensaje,animar)
{
    var animar;
    
    var caja='';
     $("#"+nomDiv).html("<div class='alert alert-dismissable alert-success'><button type='button' class='close' data-dismiss='alert'>×</button>"+mensaje+"</div>");
    if(animar==='S'){
        $("#"+nomDiv).fadeOut(5000, function(){ $(this).remove();});//Ocultamos
    }
    
}
// error
function mensajeError(nomDiv,mensaje)
{
    var caja='';
     $("#"+nomDiv).html("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>"+mensaje+"</div>");
      
}
