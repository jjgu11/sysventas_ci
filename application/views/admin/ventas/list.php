<!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                VENTAS
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
                              <a href="<?php echo base_url();?>movimiento/Cventas/addVent" class="btn btn-success btn-flat "><span class="fa fa-plus-square"></span>  Agregar  Ventas</a>
                          </div>  
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-hover">

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
                                                    <td><?php echo $venta->tipocomprobante; ?></td>
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
