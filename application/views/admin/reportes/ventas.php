<!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                REPORTES
                <small>Ventas</small>
                </h1>
            </section>


            <!-- Main content -->
            <section class="content">

                    <!-- Filtro de busqueda de reportes -->
                    <div class="box box-success">
                            
                        <div class="box-header with-border">
                              <div class="text-center"><h3 class="box-title"><span class="label label-success">Filtros de Reportes</h4></h3></div>
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                              </div>
                        </div>
                              <div class="box-body">
                                <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="" class="col-md-1 control-label">Desde:</label>
                                        <div class="col-md-3">
                                            <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechaIni) ? $fechaIni:'';?>">
                                        </div>
                                        <label for="" class="col-md-1 control-label">Hasta:</label>
                                        <div class="col-md-3">
                                            <input type="date" class="form-control" name="fechafin" value="<?php  echo !empty($fechaFin) ? $fechaFin:'';?>">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                            <a href="<?php echo base_url(); ?>reportes/Cventas" class="btn btn-danger">Restablecer</a>
                                        </div>
                                    </div>
                                </form>   

                              </div>

                        

                    </div>
                    <!-- fin Filtros -->
                        
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">

                        <div class="row">


                            <div class="col-md-12">

                                <table id="exampleReport" class="table table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE DEL CLIENTE</th>
                                            <th>TIPO DEL COMPROBANTE</th>
                                            <th>N° DEL COMPROBANTE</th>
                                            <th>FECHA</th>
                                            <th>TOTAL</th>
                                            <th>OPCIONES</th>
                                            
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php if (!empty($ventas)): ?>
                                            <?php foreach ($ventas as $venta): ?>
                                                <tr>
                                                    <td><?php echo $venta->id;  ?></td>
                                                    <td><?php echo  $venta->nombres;?></td>
                                                    <td>
                                                        <?php if ($venta->tipocomprobante == "Boleta"): ?>
                                                            <span class="label label-warning">
                                                            <?php echo $venta->tipocomprobante; ?>
                                                            </span>
                                                            <?php else: ?>
                                                            <span class="label label-danger">
                                                            <?php echo $venta->tipocomprobante; ?>
                                                            </span>    
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo  $venta->num_doc;?></td>
                                                     <td><?php echo  $venta->fecha;?></td>
                                                      <td><?php echo  $venta->total;?></td>
                                                      <td><button type="button"  class="btn btn-info btn-viewV" value="<?php echo $venta->id ?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-eye"></span></button></td>
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
                  <span aria-hidden="true"></span></button>
                <h4 class="modal-title text-center callout callout-warning">Informacion de la Venta</h4>
            </div>

            <div class="modal-body">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button class="btn btn-primary btn-printV"><span class="fa fa-print" ></span> Imprimir</button>
                
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
          <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
