<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar productos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar productos</li>

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar Producto
        </button>


      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas tablaProductos" id="tablaProductos">
          <thead>
            <tr>
              
              <th>#</th>
              <th>Imagen</th>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Categoria</th>
              <th>Stock</th>
              <th>Precio de compra</th>
              <th>Precio de venta</th>
              <th>AGREGADO</th>
              <th>Acciones</th>
          
  
            </tr>
          </thead>
          <!--
          <tbody>
            <?php
              /** 
              $item = null;
              $valor = null;
              $productos = ControllerProductos::ctrlMostrarProductos($item,$valor);
              
              foreach($productos as $key => $value){
                echo '
                
                <tr>
                <td>'.($key+1).'</td>
                <td><img src="views/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>
                <td>'.$value["codigo"].'</td>
                <td>'.$value["descripcion"].'</td>';
                $item = "id";
                $valor = $value["id_categoria"];
                $categoria = ControllerCategorias::ctrMostarCategorias($item, $valor);
                echo'
                <td>'.$categoria["categoria"].'</td>
                <td>'.$value["stock"].'</td>
                <td>'.$value["precio_compra"].'</td>
                <td>'.$value["precio_venta"].'</td>
                <td>'.$value["fecha"].'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
                
                
                
                ';

              }

              */
            ?>
            <tr>
              <td>1</td>
              <td><img src="views/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>
              <td>0001</td>
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, blanditiis, quaerat illo harum nam earum nisi consequuntur modi voluptatem, beatae ratione necessitatibus obcaecati! Maxime sint ullam dolor sed laborum vel?</td>

              <td>Lorem ipsum</td>
              <td>20</td>
              <td>$ 5.00</td>
              <td>$ 10.00</td>
              <td>2020-12-11 12:12:21</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>
          </tbody>
          -->
        </table>



      </div>
      <!-- /.box-body -->
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Codigo" require>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripcion" require>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <select class="form-control input-lg" name="nuevaCategoria">
                  <option value="">Seleccionar categoria</option>
                  <option value="taladros">taladros</option>
                  <option value="andamios">andamios</option>
                  <option value="equipos">equipos</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoStock" placeholder="stock" min="0" require>
              </div>
            </div>
            <!------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <div class="col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" placeholder="Precio de compra" min="0" require>
                </div>
              </div>

              <div class="col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                  <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" placeholder="Precio de venta" min="0" require>
                </div>
                <br>
                <div class="col-xs-6">
                  <div class="from-grop">
                    <label>
                      <input type="checkbox" class="minimal porcentaje" checked>
                      Utilizar porcentaje
                    </label>
                  </div>
                </div>
                <div class="col-xs-6" style="padding:0;">
                  <div class="input-group">
                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" name="" required>
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  </div>
                </div>
              </div>

            </div>

            <!------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group">
              <div class="panel">SUBIR Imagen</div>
              <input type="file" id="nuevaImagen" name="nuevaImagen">
              <p class="help-block">Peso maximo de la foto 2 MB</p>
              <img src="views/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">
            </div>


          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>

  </div>

</div>