<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        PERMISOS
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
                      <a href="<?php echo base_url();?>admin/Cpermisos/addPer" class="btn btn-success btn-flat "><span class="fa fa-plus-square"></span> Agregar Permisos</a>
                  </div>  
                </div>
                <hr>

                <!-- Mensages de Exitos en las transacciones -->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <?php if($this->session->flashdata("bien")):?>
                            <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                              <p><i class="icon fa fa-thumbs-o-up"></i> <?php echo $this->session->flashdata("bien") ?></p>   
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <!--  --> 

                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MENU</th>
                                    <th>ROL</th>
                                    <th>LEER</th>
                                    <th>INSERTAR</th>
                                    <th>ACTUALIZAR</th>
                                    <th>ELIMINAR</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                <?php
                                /*si no esta vacia paso a recorrerlo*/ 
                                if(!empty($permisos)): ?>
                                    <?php foreach($permisos as $per): ?>
                                <tr>
                                    <td><?php echo $per->id; ?></td>
                                    <td><?php echo $per->menu; ?></td>
                                    <td><?php echo $per->rol; ?></td>
                                    <td>
                                        <?php  if($per->read == 0): ?>
                                            <h5 class="text-center"><span class="label label-danger">Denegado</span></h5>
                                        <?php else: ?>
                                            <h5 class="text-center"><span class="label label-success">Permitido</span></h5>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php  if($per->insert == 0): ?>
                                            <h5 class="text-center"><span class="label label-danger">Denegado</span></h5>
                                        <?php else: ?>
                                            <h5 class="text-center"><span class="label label-success">Permitido</span></h5>
                                        <?php endif; ?>
                                    </td>
                                   <td>
                                        <?php  if($per->update == 0): ?>
                                             <h5 class="text-center"><span class="label label-danger">Denegado</span></h5>
                                        <?php else: ?>
                                            <h5 class="text-center"><span class="label label-success">Permitido</span></h5>
                                        <?php endif; ?>
                                    </td>
                                     <td>
                                        <?php  if($per->delete == 0): ?>
                                             <h5 class="text-center"><span class="label label-danger">Denegado</span></h5>
                                        <?php else: ?>
                                            <h5 class="text-center"><span class="label label-success">Permitido</span></h5>
                                        <?php endif; ?>
                                    </td>
                                    
                                   
                                    <td>
                                        <div class="btn-group">

                                                                                             
                                             <a data-toggle="tooltip" data-placement="top" title="Editar" href="<?php echo base_url(); ?>admin/Cpermisos/preUpdate/<?php echo $per->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                            <!-- Sin ajax  eliminar-->
                                             <a data-toggle="tooltip" data-placement="right" title="Remover" href="<?php echo base_url(); ?>admin/Cpermisos/delete/<?php  echo $per->id;?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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
            <h3 class="modal-title text-center"><span class="label label-default">INFORMACIÓN DE USUARIOS</span></h3>
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