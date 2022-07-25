<?php
class ControllerProductos
{


  static public function ctrlMostrarProductos($item,$valor){

    $tabla="productos";
    $respuesta = ModelProductos :: mdlMostrarProdcutos($tabla,$item,$valor);
    return $respuesta;
  }
}
