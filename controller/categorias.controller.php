<?php
class ControllerCategorias
{

  static public function ctrCrearCategoria()
  {

    if (isset($_POST['nuevaCategoria'])) {

      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])) {

        $tabla = "categorias";
        $datos = $_POST["nuevaCategoria"];

        $respuesta = ModelCategorias::mdlIngresarCategoria($tabla, $datos);

        if ($respuesta == "ok") {


          echo '
          <script>
            swal({
              type: "success",
              title: "La categoria se ha guardado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              closeOnConfirm: false
            }).then((result)=>{
               if(result.value){
                window.location = "categorias";
              } 
            });
          </script>
          ';
        }
      } else {

        echo '
        <script>
          swal({
            type: "error",
            title: "La categoria no puede ir vacion o llevar caracteres especiales",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result)=>{
             if(result.value){
              window.location = "categorias";
            } 
          });
        </script>
        ';
      }
    }
  }

  static public function ctrMostarCategorias($item, $valor){

    $tabla = "categorias";

    $respuesta = ModelCategorias:: mdlMotarCategorias($tabla, $item, $valor);

    return $respuesta;
  }

  static public function ctrEditarCategoria(){

    if (isset($_POST['editarCategoria'])) {

      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])) {

        $tabla = "categorias";
        $datos = array(
          "categoria"=>$_POST["editarCategoria"],
          "id"=>$_POST["idCategoria"]
        );
         

        $respuesta = ModelCategorias::mdlEditarCategoria($tabla, $datos);

        if ($respuesta == "ok") {


          echo '
          <script>
            swal({
              type: "success",
              title: "La categoria se ha editadoo correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              closeOnConfirm: false
            }).then((result)=>{
               if(result.value){
                window.location = "categorias";
              } 
            });
          </script>
          ';
        }
      } else {

        echo '
        <script>
          swal({
            type: "error",
            title: "La categoria no puede ir vacion o llevar caracteres especiales",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result)=>{
             if(result.value){
              window.location = "categorias";
            } 
          });
        </script>
        ';
      }
    }

  }

  static public function ctrBorrarCategoria(){

    if(isset($_GET["idCategoria"])){

      $tabla = "categorias";
      $datos = $_GET["idCategoria"];

      $respuesta = ModelCategorias::mdlBorrarCategoria($tabla,$datos);
      if($respuesta == "ok"){
        echo '
        <script>
          swal({
            type: "success",
            title: "La categoria ha sido borrada correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result)=>{
             if(result.value){
              window.location = "categorias";
            } 
          });
        </script>
        ';
      }
    }

  }


}
