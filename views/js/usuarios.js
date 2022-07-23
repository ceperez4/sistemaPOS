/**Subiendo la foto del usuario */

$(".nuevaFoto").change(function(){
  var imagen = this.files[0];
  
  /**VALIDACION DEL FORMATO DE LA IMAGEN */
  if(imagen["type"]  != "image/jpeg" && imagen["type" ] != "image/png"){
    $(".nuevaFoto").val("");
    swal({
      type: "error",
      title: "Error al subir la imagen",
      text:"¡La imagen debe estar en formato JPG o PNG!",
    
      confirmButtonText: "Cerrar"
     
    });
  }else if(imagen["size"]>2000000){
    $(".nuevaFoto").val("");
    swal({
      type: "error",
      title: "Error al subir la imagen",
      text:"¡La imagen debe no debe pesar mas de 2MB",
    
      confirmButtonText: "Cerrar"
     
    });
  }else{
    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);
    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      $(".previsualizar").attr("src", rutaImagen);
      
    })
  }

})



/**Editar usuario */


$(document).on("click", ".btnEditarUsuario",function(){
  var idUsuario = $(this).attr("idUsuario");
 console.log(idUsuario);
  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({
    url:"ajax/usuarios.ajax.php",
    method:"POST",
    data: datos,
    cache:false,
    contentType:false,
    processData:false,
    dataType:"json",
    success:function(respuesta){
      console.log("respuesta", respuesta);
      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarUsuario").val(respuesta["usuario"]);
      $("#editarPerfil").html(respuesta["perfil"]);
      $("#editarPerfil").val(respuesta["perfil"]);
      $("#fotoActual").val(respuesta["foto"]);
      $("#passwordActual").val(respuesta["password"]);
      
      if(respuesta["foto"] !=""){
        $(".previsualizar").attr("src",respuesta["foto"]);
      }
    }
  })


})


/**Activar usuario */
$(document).on("click",".btnActivar",function(){
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({
    url:"ajax/usuarios.ajax.php",
    method:"POST",
    data: datos,
    cache:false,
    contentType:false,
    processData:false,
    dataType:"json",
    success:function(respuesta){
      if(window.matchMedia("(max-width:767px)").matches){

        swal({
          type: "success",
          title: "El usuario ah sido actualizado",
          confirmButtonText: "Cerrar",
          
        }).then((result)=>{
           if(result.value){
            window.location = "usuarios";
          } 
        });
      }
    }
  })
  if(estadoUsuario ==0){
    $(this).removeClass('btn-success');
    $(this).addClass('btn-danger');
    $(this).html('Desactivado');
    $(this).attr('estadoUsuario',1);
    
    
  }else{
    $(this).removeClass('btn-danger');
    $(this).addClass('btn-success');
    $(this).html('Activado');
    $(this).attr('estadoUsuario',0);
  }
})

/**Revisar usuario repetido */


$("#nuevoUsuario").change(function(){
  $(".alert").remove();
  var usuario = $(this).val();

  var datos = new FormData();

  datos.append("validarUsuario",usuario);
  $.ajax({
    url:"ajax/usuarios.ajax.php",
    method:"POST",
    data: datos,
    cache:false,
    contentType:false,
    processData:false,
    dataType:"json",
    success:function(respuesta){
      if(respuesta){
        $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya exite en la base de datos</div>')
        $("#nuevoUsuario").val("")
      }
    }
  })
})

/**Eliminar Usuario */
$(document).on("click", ".btnEliminarUsuario",function(){

  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    type: "warning",
    title: "Estas seguro de borra el usuario",
    text:"Si no lo estas puedes cancelar la accion",
    showCancelButton: true,
    confirmButtonColor: "#3085d5",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cerrar",
    confirmButtonText: "si Borrar usuario",
    
  }).then((result)=>{
     if(result.value){
      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
    } 
  });




})