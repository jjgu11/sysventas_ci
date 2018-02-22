<!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Categoria
                <small>Listado</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">

                        <div class="row text-center">
                            <div class="col-md-4"><?php if ($permisos->insert == 0){ echo '<h4><span class="label label-danger ">No puede Insertar, permiso denegado!!</span></h4>';} ?></div>
                            <div class="col-md-4"><?php if ($permisos->update == 0){ echo '<h4><span class="label label-danger">No puede Actualizar, permiso denegado!!</span></h4>';} ?>
                            </div>
                            <div class="col-md-4"><?php if ($permisos->delete == 0){ echo '<h4><span class="label label-danger">No puede Eliminar, permiso denegado!!</span></h4>';} ?>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 text-center">
                            
                            <!-- VALIDANDO PERMISOS -->
                            
                            <!-- FIN VALIDANDO PERMISOS -->

                            <?php if ($permisos->insert == 1): ?>
                              <a href="<?php echo base_url();?>mantenimiento/Ccategorias/addCat" class="btn btn-success btn-flat"><span class="fa fa-plus"></span>Agregar Categorias</a>
                            <?php endif; ?>
                          </div>  
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE</th>
                                            <th>DESCRIPCION</th>
                                            <th>OPCIONES</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        /*si no esta vacia paso a recorrerlo*/ 
                                        if(!empty($categorias)): ?>
                                            <?php foreach($categorias as $cat): ?>
                                        <tr>
                                            <td><?php echo $cat->id; ?></td>
                                            <td><?php echo $cat->nombre; ?></td>
                                            <td><?php echo $cat->descripcion; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $cat->id; ?>">
                                                    <span class="fa fa-eye"></span>
                                                    </button>

                                                    <?php if ($permisos->update == 1): ?>
                                                         <a href="<?php echo base_url(); ?>mantenimiento/Ccategorias/preUpdate/<?php echo $cat->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif; ?>

                                                    <?php if ($permisos->delete == 1): ?>
                                                         <a href="<?php echo base_url(); ?>mantenimiento/Ccategorias/delete/<?php  echo $cat->id;?>" class="btn btn-danger btn-delete" value="<?php echo $cat->id;?>"><span class="fa fa-remove"></span></a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
<!-- /.content-wrapper -->


     <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Informacion de la Categoria</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

