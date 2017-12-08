<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Clientes
                <small>Agregar</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                        <div class="col-md-3"></div>
                            <div class="col-md-6">

                                

                                <!-- Formulario Agregar -->
                                <form action="<?php echo base_url();?>mantenimiento/Cclientes/insertar" method="POST">

                                    <div class="form-group <?php echo !empty(form_error("nombres"))? 'has-error': ''; ?>">
                                        <label for="nombre">Nombres:</label>
                                        <input type="text" class="form-control" name="nombres" value="<?php echo set_value("nombres") ?>">
                                        <?php echo form_error("nombres","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group <?php echo !empty(form_error("tipo_cliente"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Tipo Cliente:</label>

                                        <select name="tipo_cliente" id="" class="form-control">
                                            <option value="">Seleccione...</option> 
                                            <?php foreach ($tipoClientes as $tipoCliente):?>
                                                <option value="<?php echo $tipoCliente->id; ?>" <?php echo set_select("tipo_cliente",$tipoCliente->id) ?>>
                                                    <?php echo $tipoCliente->nombre; ?>
                                                </option>
                                             <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error("tipo_cliente","<span class='help-block'>","</span>" ); ?>

                                    </div>
                                    <div class="form-group <?php echo !empty(form_error("tipo_documento"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Tipo Documento:</label>

                                        <select name="tipo_documento" id="" class="form-control">
                                            <option value="">Seleccione...</option>  
                                            <?php foreach ($tipoDocumentos as $tipoDocumento):?>
                                                <option value="<?php echo $tipoDocumento->id; ?>"
                                                <?php echo set_select("tipo_documento",$tipoDocumento->id) ?>>
                                                    <?php echo $tipoDocumento->nombre; ?>
                                                </option>
                                             <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error("tipo_documento","<span class='help-block'>","</span>" ); ?>

                                    </div>
                                    
                                    <div class="form-group <?php echo !empty(form_error("num_documento"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Num Documento:</label>
                                        <input type="text" class="form-control" name="num_documento" value="<?php echo set_value("num_documento") ?>">
                                        <?php echo form_error("num_documento","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group <?php echo !empty(form_error("telefono"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Telefono:</label>
                                        <input type="text" class="form-control" name="telefono" value="<?php echo set_value("telefono") ?>">
                                        <?php echo form_error("telefono","<span class='help-block'>","</span>" ); ?>
                                    </div>
                                    <div class="form-group <?php echo !empty(form_error("direccion"))? 'has-error': ''; ?>">
                                        <label for="descripcion">Direccion:</label>
                                        <input type="text" class="form-control" name="direccion" value="<?php echo set_value("direccion") ?>">
                                        <?php echo form_error("direccion","<span class='help-block'>","</span>" ); ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-download"></span> Guardar</button>
                                        <a href="<?php echo base_url();?>mantenimiento/Cclientes" class="btn btn-danger btn-flat pull-right"> <span class="fa fa-reply"></span> Regresar</a>
                                    </div>
                                </form>
                               <!-- Formulario Agregar -->

                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
</div>
<!-- /.content-wrapper -->