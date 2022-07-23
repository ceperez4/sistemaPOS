<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar usuarios

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar usuarios</li>

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar Usuario
        </button>


      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Ultimo login</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $item = null;
            $valor = null;
            $usuarios = ControllerUsuarios::ctrlMostrarUsuarios($item, $valor);

            foreach ($usuarios as $key => $value) {
              echo '
              
            <tr>
            <td>1</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["usuario"].'</td>
            ';
            if($value["foto"] !=""){
              echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px" alt=""></td>';

            }else{
              echo '<td><img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>';

            }
            echo '
            <td>'.$value["perfil"].'</td>';

            if($value["estado"] != 0){
              echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario='.$value["id"].' estadoUsuario="0">Activado</button></td>';
            }else{
              echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario= '.$value["id"].' estadoUsuario="1">Desactivado</button></td>';
            }
            

            echo'
            <td>'.$value["ultimo_login"].'</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-warning btnEditarUsuario" idUsuario='.$value["id"].' data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btnEliminarUsuario" idUsuario='.$value["id"].' fotoUsuario='.$value["foto"].' usuario='.$value["usuario"].'><i class="fa fa-times"></i></button>
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
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" require>
              </div>
            </div>

            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingresar usuario" require>
              </div>
            </div>
            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" require>
              </div>
            </div>
            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="nuevoperfil">
                  <option value="">Seleccionar perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Especial">Especial</option>
                  <option value="Vendedor">Vendedor</option>

                </select>
              </div>
            </div>

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>
              <input type="file" class="nuevaFoto" name="nuevaFoto">
              <p class="help-block">Peso maximo de la foto 2MB</p>
              <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>


          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

        <?php
        $crearUsuario = new ControllerUsuarios();
        $crearUsuario->ctrCrearUsuario();
        ?>
      </form>
    </div>

  </div>

</div>


<!-- Modal -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre"  value="" require>
              </div>
            </div>

            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" require readonly>
              </div>
            </div>
            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escribir la nueva contraseña">

                <input type=hidden id="passwordActual" name="passwordActual">

              </div>
            </div>
            <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="editarperfil">
                  <option value="" id="editarPerfil"></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Especial">Especial</option>
                  <option value="Vendedor">Vendedor</option>

                </select>
              </div>
            </div>

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>
              <input type="file" class="nuevaFoto" name="editarFoto">
              <p class="help-block">Peso maximo de la foto 2MB</p>
              <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual" >
            </div>


          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

        <?php
        
        $editarUsuario = new ControllerUsuarios();
        $editarUsuario->ctrEditarUsuario();
        ?>

      </form>
    </div>

  </div>

</div>

<?php
  $borrarUsuario = new ControllerUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();
?>