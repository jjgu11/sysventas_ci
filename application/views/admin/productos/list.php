<!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                PRODUCTOS
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
                              <a href="<?php echo base_url();?>mantenimiento/Cproductos/addPro" class="btn btn-success btn-flat "><span class="fa fa-plus"></span>Agregar Productos</a>
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
                                            <th>PRECIO</th>
                                            <th>STOCK</th>
                                            <th>CATEGORIA</th>
                                            <th>OPCIONES</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        <?php
                                        /*si no esta vacia paso a recorrerlo*/ 
                                        if(!empty($productos)): ?>
                                            <?php foreach($productos as $pro): ?>
                                        <tr>
                                            <td><?php echo $pro->id; ?></td>
                                            <td><?php echo $pro->nombre; ?></td>
                                            <td><?php echo $pro->descripcion; ?></td>
                                            <td><?php echo $pro->precio; ?></td>
                                            <td><?php echo $pro->stock; ?></td>
                                            <td><?php echo $pro->categoria; ?></td>
                                        
                                            <td>
                                                <div class="btn-group">

                                                    <button type="button" class="btn btn-info btn-viewc" data-toggle="modal" data-target="#modal-default" value="" data-toggle="tooltip" data-placement="left" title="Ver Informacion" >
                                                    <span class="fa fa-eye"></span>
                                                    </button>
                                                            
                                                     <a data-toggle="tooltip" data-placement="top" title="Editar" href="<?php echo base_url(); ?>mantenimiento/Cproductos/preUpdate/<?php echo $pro->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                     <a data-toggle="tooltip" data-placement="right" title="Remover" href="<?php echo base_url(); ?>mantenimiento/Cproductos/delete/<?php  echo $pro->id;?>" class="btn btn-danger btn-deletec"><span class="fa fa-remove"></span></a>
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
                <h4 class="modal-title">Informacion de los Productos</h4>
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
