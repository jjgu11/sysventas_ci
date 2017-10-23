<!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                CLIENTES
                <small>Listado</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                          <div class="col-md-12 text-center">
                              <a href="<?php echo base_url();?>mantenimiento/Cclientes/addCli" class="btn btn-success btn-flat "><span class="fa fa-plus"></span>Agregar Clientes</a>
                          </div>  
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRES</th>
                                            <th>APELLIDOS</th>
                                            <th>TELEFONO</th>
                                            <th>DIRECCION</th>
                                            <th>RUC</th>
                                            <th>EMPRESA</th>
                                            <th>OPCIONES</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        <?php
                                        /*si no esta vacia paso a recorrerlo*/ 
                                        if(!empty($cliente)): ?>
                                            <?php foreach($cliente as $cat): ?>
                                        <tr>
                                            <td><?php echo $cat->id; ?></td>
                                            <td><?php echo $cat->nombres; ?></td>
                                            <td><?php echo $cat->apellidos; ?></td>
                                            <td><?php echo $cat->telefono; ?></td>
                                            <td><?php echo $cat->direccion; ?></td>
                                            <td><?php echo $cat->ruc; ?></td>
                                            <td><?php echo $cat->empresa; ?></td>

                                            <td>
                                                <div class="btn-group">

                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $cat->id; ?>">
                                                    <span class="fa fa-eye"></span>
                                                    </button>
                                                            
                                                     <a href="<?php echo base_url(); ?>mantenimiento/Cclientes/preUpdate/<?php echo $cat->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                     <a href="<?php echo base_url(); ?>mantenimiento/Cclientes/delete/<?php  echo $cat->id;?>" class="btn btn-danger btn-delete" value="<?php echo $cat->id;?>"><span class="fa fa-remove"></span></a>
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
                <h4 class="modal-title">Informacion de los Clientes</h4>
              </div>
              <div class="modal-body">
                
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
