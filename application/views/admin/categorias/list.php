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
                        <div class="row">
                          <div class="col-md-12">
                              <a href="<?php echo base_url();?>mantenimiento/Ccategorias/addCat" class="btn btn-success btn-flat"><span class="fa fa-plus"></span>Agregar Categorias</a>
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
                                                     <a href="" class="btn btn-info"><span class="fa fa-eye"></span></a>
                                                     <a href="<?php echo base_url(); ?>mantenimiento/Ccategorias/preUpdate/<?php echo $cat->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                     <a href="" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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
