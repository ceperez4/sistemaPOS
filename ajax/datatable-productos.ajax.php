<?php
include_once '../controller/categorias.controller.php';
include_once '../model/categorias.model.php';
include_once '../controller/productos.controller.php';
include_once '../model/productos.model.php';

class TablaProductos
{

  public function mostrarTablaProductos()
  {
  
    $item = null;
    $valor = null;
    $productos = ControllerProductos::ctrlMostrarProductos($item, $valor);

    $datosJson = '{
		  "data": [';
    for ($i = 0; $i < count($productos); $i++) {

      $imagen = "<img src='".$productos[$i]["imagen"]."' class='img-thumbnail' width='40px'>";
      $botones = "
      <div class='btn-group'><button class='btn btn-warning'><i class='fa fa-pencil'></i></button><button class='btn btn-danger'><i class='fa fa-times'></i></button></div>
      ";

      $datosJson .= '
          [
			      "' . ($i + 1) . '",
			      "' . $imagen . '",
			      "' . $productos[$i]["codigo"] . '",
			      "' . $productos[$i]["descripcion"] . '",
			      "categoria",
			      "' . $productos[$i]["stock"] . '",
			      "' . $productos[$i]["precio_compra"] . '",
			      "' . $productos[$i]["precio_venta"] . '",
			      "' . $productos[$i]["fecha"] . '",
			      "' . $botones . '"
			    ],';
    }
    $datosJson = substr($datosJson, 0,-1);
    $datosJson .= '] 

      }';

      echo $datosJson;


  }
}


/**Activar la tabla de productos */
$activarProductos = new TablaProductos();
$activarProductos->mostrarTablaProductos();
