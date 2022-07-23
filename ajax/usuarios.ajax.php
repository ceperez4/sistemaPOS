<?php

require_once "../controller/usuarios.controller.php";
require_once "../model/usuarios.model.php";

class AjaxUsuarios
{

  /*Editar usuario*/

  public $idUsuario;

  public function ajaxEditarUsuario()
  {
    $item = 'id';
    $valor = $this->idUsuario;
    $respuesta = ControllerUsuarios::ctrlMostrarUsuarios($item,$valor);
    echo json_encode($respuesta);

  }

  /**Activar usuario */
  public $activarId;
  public $activarUsuario;

  public function ajaxActivarUsuario(){

    $tabla="usuarios";
    $item1="estado";
    $valor1=$this->activarUsuario;
    $item2="id";
    $valor2=$this->activarId;

    $respuesta = ModelUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
  }

  /**Validar Usuario */
  public $validarUsuario;
  public function ajaxValidarUsuario(){
    $item = "usuario";
    $valor = $this->validarUsuario;
    $respuesta = ControllerUsuarios::ctrlMostrarUsuarios($item,$valor);

    echo json_encode($respuesta);
  }

}

if (isset($_POST['idUsuario'])) {
  $editar = new AjaxUsuarios();
  $editar->idUsuario = $_POST["idUsuario"];
  $editar->ajaxEditarUsuario();
}

 /**Activar usuario */

 if (isset($_POST['activarUsuario'])) {
  $activarUsuario = new AjaxUsuarios();
  $activarUsuario->activarUsuario = $_POST["activarUsuario"];
  $activarUsuario->activarId = $_POST["activarId"];
  $activarUsuario->ajaxActivarUsuario();
}

 /**Validar Usuario */
 if (isset($_POST['validarUsuario'])) {
  $valUsuario = new AjaxUsuarios();
  $valUsuario->validarUsuario = $_POST["validarUsuario"];

  $valUsuario->ajaxValidarUsuario();
}