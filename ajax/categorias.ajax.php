<?php

include_once '../controller/categorias.controller.php';
include_once '../model/categorias.model.php';

class AjaxCategorias{


  /**Editar Categorias */
  public $idCategoria;

  public function ajaxEditarCategorias(){

    $item ='id';
    $valor = $this->idCategoria;
    $respuesta = ControllerCategorias:: ctrMostarCategorias($item, $valor);

    echo json_encode($respuesta);
  }


}

if(isset($_POST['idCategoria'])){

  $categoria = new AjaxCategorias();
  $categoria->idCategoria = $_POST['idCategoria'];
  $categoria->ajaxEditarCategorias();

}




