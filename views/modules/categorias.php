<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Agregar Categoria

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Agregar Categoria</li>

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
        Agregar Categoria
        </button>


      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th>#</th>
              <th>Categoria</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item = null;
            $valor = null;

            $categorias = ControllerCategorias::ctrMostarCategorias($item, $valor);
            
            foreach ($categorias as $key => $value ){

              echo '    
              <tr>
              <td>'.($key+1).'</td>
              <td>'.$value["categoria"].'</td>
              <td>
                <div class="btn-group">
                
                  <button class="btn btn-warning btnEditarCategoria" idCategoria ='.$value["id"].' data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btnEliminarCategoria" idCategoria ='.$value["id"].'><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>

              ';
            }
            
            ?>

          </tbody>
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
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
      <form role="form" method="post" >

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Categorias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoria" require>
              </div>
            </div>

           
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

        <?php
          $crearCategoria = new ControllerCategorias();
          $crearCategoria-> ctrCrearCategoria();


        ?>


      </form>
    </div>

  </div>

</div>

<!-- Editar Categoria-->
<div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
      <form role="form" method="post" >

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h5 class="modal-title" id="exampleModalLongTitle">Editar Categorias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria">
                <input type="hidden" name="idCategoria" id="idCategoria">
              </div>
            </div>

           
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

        <?php
        
          $editarCategoria = new ControllerCategorias();
          $editarCategoria-> ctrEditarCategoria();


        ?>


      </form>
    </div>

  </div>

</div>
<?php
  $borrarCategoria = new ControllerCategorias();
  $borrarCategoria-> ctrBorrarCategoria();
?>